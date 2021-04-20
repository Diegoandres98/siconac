// window.onload = ubicacion('ActualizarData');
function ubicacion(donde) {
  $.ajax({
    type: "GET",
    url: "../Vista/" + donde + ".php",

    beforeSend: function () {
      // setting a timeout
       $("#contenido").html('<div class="row"><div class="col-md-12"><div class="contenedorCargador"><div class="loader-container"><img class="fotico" src="../img/Siconac.ico" /><div class="loader"></div><div class="loader2"></div></div></div></div></div>');
    //  $("#contenido").html('<div class="row"><div class="col-md-12"><div class="preloader"></div></div></div>');
      // $("#contenido").addClass('loading');
      // i++;
    },

    success: function (datos) {
      $("#contenido").html(datos);
      // var alias= PortalEnJavaScript[Identificador]['devices_alias'];
      // $("#contenido").html(datos);
    },
  });
}
