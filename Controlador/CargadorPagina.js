function ubicacion(donde){
  $.ajax({
      type: "GET",
      url: "../Vista/"+donde+".php",
      success: function(datos) {
      $("#contenido").html(datos);
      }
  })
}
