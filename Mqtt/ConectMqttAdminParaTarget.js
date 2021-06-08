function process_msg(topic, message){
    var msg = message.toString();
    var splitted_topic = topic.split("/");
    var serial_number = splitted_topic[0];
    var query = splitted_topic[1];
  

    if (query=="registro") {
        $('#myInput').val(msg);
        myFunction()
        var audio = new Audio('../pop.mp3');
        audio.play();
        
        // Swal.fire({
        //   position: 'top-end',
        //   icon: 'success',
        //   title: 'Acceso Correcto',
        //   showConfirmButton: false,
        //   timer: 2500
        // })


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

    client.subscribe(IdAdmix+"/registro", { qos: 0 }, (error) => {})

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



