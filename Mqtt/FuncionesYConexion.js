
/*
******************************
****** PROCESOS  *************
******************************
*/

// function haceraccesomanual(action){
//   var Idportal = $( "#device_id" ).val();
//   if(action == "abrir"){
//     client.publish(Idportal + "/acceso_manual/"+IdAdmiDelMonit, IdClient+"/"+IdMonit, (error) => {
//       console.log(error || 'Solicitud Enviada')
//     });
//   }
// }
var controladora = false;
var audio = new Audio('../../audio.mp3');
function process_msg(topic, message){
  var msg = message.toString();
  var splitted_topic = topic.split("/");
  var serial_number = splitted_topic[0];
  var query = splitted_topic[1];

  if (query == "temp"){
    $("#led"+serial_number).removeClass("led-red");
    $("#led"+serial_number).addClass("led-green");
  }

  if (query=="offline") {
    $("#led"+serial_number).removeClass("led-green");
    $("#led"+serial_number).addClass("led-red");
  }

  if (query == "user_name"){
    $("#display_new_access"+serial_number).html("Nuevo acceso: " + msg);

    setTimeout(function(){
      $("#display_new_access"+serial_number).html("Trafico En Vivo:");
    }, 3000);
  }

  if (query=="command") {
    if (message.toString()=="abiertoManual") {
      // var audio = new Audio('../../audio.mp3');
      audio.play();
      
      Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'Acceso Correcto',
        showConfirmButton: false,
        timer: 2500
      })
    }
    if (message.toString()=="abiertoAutomatico"){
      audio.play();


        $("#bombillo"+serial_number).removeClass("bg-info");
        $("#bombillo"+serial_number).addClass("bg-success");
        $("#bombillo"+serial_number).addClass("animacion");

        setTimeout(function(){
          $("#bombillo"+serial_number).addClass("bg-info");
          $("#bombillo"+serial_number).removeClass("bg-success");
          $("#bombillo"+serial_number).removeClass("animacion");
        }, 2000);

    }
  }

}

/*
******************************
****** CONEXION  *************
******************************
*/

// connect options
const options = {
      connectTimeout: 4000,
      // Authentication
      clientId: 'iotsiconac',
      username: 'web_client',
      password: '121212',
      keepalive: 60,
      clean: true,
}

var connected = false;

// WebSocket connect url
const WebSocket_URL = 'wss://siconac.ga:8094/mqtt'

const client = mqtt.connect(WebSocket_URL, options)


client.on('connect', () => {
    console.log('Mqtt conectado por WS! Exito!')

    PortalesDelMonit.forEach(element => {

      client.subscribe(element['devices_id']+"/command", { qos: 0 }, (error) => {})
      client.subscribe(element['devices_id']+"/user_name", { qos: 0 }, (error) => {})
      client.subscribe(element['devices_id']+"/offline", { qos: 0 }, (error) => {})
      client.subscribe(element['devices_id']+"/temp", { qos: 0 }, (error) => {})
    });

   
    // <?php foreach ($devices as $device) { ?>
    //   client.subscribe('<?php echo $device['devices_serie'] ?>/access_automatico/<?php echo $SESIOn['idproperty'] ?>', { qos: 0 }, (error) => {})
    //   client.subscribe('<?php echo $device['devices_serie'] ?>/temp', { qos: 0 }, (error) => {})
    // <?php } ?>

    // publish(topic, payload, options/callback)
    // client.publish('Exito', 'Conectado Monitor', (error) => {
    //   console.log(error || 'Mensaje enviado!!!');
    // })
})

client.on('message', (topic, message) => {
  console.log('Mensaje recibido bajo tópico: ', topic, ' -> ', message.toString());
  process_msg(topic, message);

})

client.on('reconnect', (error) => {
    console.log('Error al reconectar', error)
})

client.on('error', (error) => {
    console.log('Error de conexión:', error)
})








