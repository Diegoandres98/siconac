// window.onload = ubicacion('ActualizarData');
var Chats;
function cargarchats() {

  $.ajax({
    type: "POST",
    url: "../../Modelo/M/MensajesDelMon.php",
    // data: Datin,

    beforeSend: function () {
      // setting a timeout
      $("#contenido").html(
        '<div class="row"><div class="col-md-12"><div class="contenedorCargador"><div class="loader-container"><img class="fotico" src="../../img/Siconac.ico" /><div class="loader"></div><div class="loader2"></div></div></div></div></div>'
      );
      //  $("#contenido").html('<div class="row"><div class="col-md-12"><div class="preloader"></div></div></div>');
      // $("#contenido").addClass('loading');
      // i++;
    },

    success: function (datos) {
      // var alias= PortalEnJavaScript[Identificador]['devices_alias'];
      // $("#contenido").html(datos);
      Chats = JSON.parse(datos); 
      console.log(Chats);
      $("#contenido").load("../../Vista/M/mailbox.php");
      // console.log("traje los datos pau");
      // var nFilas = $("#listamonitordeestudiantes tr").length;
      // for (i = 0; i <= nFilas; i++) {
      //   $('#row' + i + '').remove();
      // }
    },
  });
}