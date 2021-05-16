
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

var audio = new Audio('../../audio.mp3');
function process_msg(topic, message){
  var msg = message.toString();
  var splitted_topic = topic.split("/");
  var serial_number = splitted_topic[0];
  var query = splitted_topic[1];

  if (query == "temp"){
    $("#display_temp1").html(msg);
  }

  if (query == "access_query"){
    $("#display_new_access").html("Nuevo acceso: " + msg);
    audio.play();

    setTimeout(function(){
      $("#display_new_access").html("");
    }, 3000);

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
  // process_msg(topic, message);
  if (message.toString()=="abiertoManual") {
    Swal.fire({
      position: 'top-end',
      icon: 'success',
      title: 'Acceso Correcto',
      showConfirmButton: false,
      timer: 2500
    })
  }
  else
  {
    Swal.fire({
      icon: 'error',
      title: 'Acceso Negado',
      text: 'No cumple con los requisitos',
      // footer: '<a href>Si olvidaste la contraseña contacta con el administrador</a>'
      })
  }
})

client.on('reconnect', (error) => {
    console.log('Error al reconectar', error)
})

client.on('error', (error) => {
    console.log('Error de conexión:', error)
})








