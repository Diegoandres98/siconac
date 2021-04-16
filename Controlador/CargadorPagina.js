// window.onload = ubicacion('ActualizarData');
function ubicacion(donde) {
  $.ajax({
    type: "GET",
    url: "../Vista/" + donde + ".php",

    beforeSend: function () {
      // setting a timeout
      $("#contenido").html(
        '<div class="loader-container"><img class="foto" src="../img/Siconac.ico"><div class="loader"></div><div class="loader2"></div></div>'
      );
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

