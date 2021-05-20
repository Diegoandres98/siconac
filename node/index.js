var mysql = require('mysql');
var mqtt = require('mqtt');

//CREDENCIALES MYSQL
var con = mysql.createConnection({
  host: "siconac.ga",
  user: "Diego_siconac",
  password: "@Siconac2021",
  database: "Diego_siconac"
});

//CREDENCIALES MQTT
var options = {
  port: 1883,
  host: 'siconac.ga',
  clientId: 'acces_control_server_' + Math.round(Math.random() * (0- 10000) * -1) ,
  username: 'web_client',
  password: '121212',
  keepalive: 60,
  reconnectPeriod: 1000,
  protocolId: 'MQIsdp',
  protocolVersion: 3,
  clean: true,
  encoding: 'utf8'
};

var client = mqtt.connect("mqtt://siconac.ga", options);

//SE REALIZA LA CONEXION
client.on('connect', function () {
  console.log("Conexión  MQTT Exitosa!");
  client.subscribe('+/#', function (err) {
    console.log("Subscripción exitosa!")
  });
})

//CUANDO SE RECIBE MENSAJE
client.on('message', function (topic, message) {

  console.log("Mensaje recibido desde -> " + topic + " Mensaje -> " + message.toString());

  var topic_splitted = topic.split("/");
  var iD_Portal = topic_splitted[0];
  var query = topic_splitted[1];
  var propietarioPortal = topic_splitted[2];

  if(query=="acceso_automatico"){
    var rfid_number = message.toString();

    //hacemos la consulta
    var query = "SELECT * FROM ClientesConTargetasActiva WHERE cards_number = '" + rfid_number
    + "' AND client_card_id != '0' AND cards_assigned = '1' AND client_status = '1' AND cards_id_admi_property = '"
    + propietarioPortal + "'";
    con.query(query, function (err, result, fields) {
      if (err) throw err;

      //consultamos rfid y devolvemos mensaje
      if(result.length==1){
        //GRANTED
        client.publish(iD_Portal + "/user_name",result[0].client_name);
        client.publish(iD_Portal + "/command","abiertoAutomatico");
        console.log("Acceso permitido a..." + result[0].client_name);

        var query = "INSERT INTO `traffic` (`traffic_client_id`,`traffic_devices_id`,`traffic_devices_user_id`) "
        +" VALUES (" + result[0].client_id + "," + iD_Portal + "," + propietarioPortal + ");";
        con.query(query, function (err, result, fields) {
          if (err) throw err;
          console.log("Ingreso Automatico registrado en 'TRAFFICo' ");
        });

      }else{
        //REFUSED
        client.publish(iD_Portal + "/command","rechazado");
      }

    });

  }

  if (query=="acceso_manual") {
    var datos = message.toString();

    var datos_cortados = datos.split(",");
    var iD_Cliente = datos_cortados[0];
    var iD_Monit = datos_cortados[1];
    //hacemos la consulta
    var query = "SELECT * FROM ClientesConTargetasActiva WHERE client_id = '" + iD_Cliente
    + "' AND client_card_id != '0' AND cards_assigned = '1' AND client_status = '1' AND cards_id_admi_property = '"
    + propietarioPortal + "'";
    con.query(query, function (err, result, fields) {
      if (err) throw err;

      //consultamos rfid y devolvemos mensaje
      if(result.length==1){
        //GRANTED
        client.publish(iD_Portal + "/user_name",result[0].client_name);
        client.publish(iD_Portal + "/command","abiertoManual");
        console.log("Acceso permitido a..." + result[0].client_name);

        var query = "INSERT INTO `traffic` (`traffic_client_id`,`traffic_devices_id`,`traffic_devices_user_id`,`traffic_responsable`) "
        +" VALUES (" + result[0].client_id + "," + iD_Portal + "," + propietarioPortal + "," + iD_Monit + ");";
        con.query(query, function (err, result, fields) {
          if (err) throw err;
          console.log("Ingreso Manual registrado en 'TRAFFICo' ");
        });

      }else{
        //REFUSED
        client.publish(iD_Portal + "/command","rechazado");
      }
});
}
})
  // if (topic == "values"){
  //   var msg = message.toString();
  //   var sp = msg.split(",");
  //   var temp1 = sp[0];
  //   var temp2 = sp[1];
  //   var volts = sp[2];
  //
  //   //hacemos la consulta para insertar....
  //   var query = "INSERT INTO `Diego_siconac`.`data` (`data_temp1`, `data_temp2`, `data_volts`) VALUES (" + temp1 + ", " + temp2 + ", " + volts + ");";
  //   con.query(query, function (err, result, fields) {
  //     if (err) throw err;
  //     console.log("Fila insertada correctamente");
  //   });
  // }





//nos conectamos
con.connect(function(err){
  if (err) throw err;

  //una vez conectados, podemos hacer consultas.
  console.log("Conexión a MYSQL exitosa!!!")

  //hacemos la consulta

  // var query = "SELECT * FROM devices WHERE 1";
  // con.query(query, function (err, result, fields) {
  //   if (err) throw err;
  //   if(result.length>0){
  //     console.log(result);
  //   }
  // });

});



//para mantener la sesión con mysql abierta
setInterval(function () {
  var query ='SELECT 1 + 1 as result';

  con.query(query, function (err, result, fields) {
    if (err) throw err;
  });

}, 5000);
