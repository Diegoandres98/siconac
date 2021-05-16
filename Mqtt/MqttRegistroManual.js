
$("#formularioenviodata").submit(function (e) {

    e.preventDefault();
  
    var IdClient = $("#Inpocultoid").val();
  
    client.publish(IdPortalSeleccionado + "/acceso_manual/"+IdAdmiDelMonit, IdClient+","+IdMonit, (error) => {
      console.log(error || 'Solicitud Enviada')
    });
  
  });