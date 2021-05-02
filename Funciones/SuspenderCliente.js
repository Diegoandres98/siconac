var cursos = $("#miSelect90");
$(document).ready(function () {
  $.ajax({
    type: "POST",
    url: "../Modelo/ListaQueSePuedeSuspender.php",
    success: function (response) {
      var jsonData = JSON.parse(response);
      cursos.find("option").remove();
      $(jsonData).each(function (i, v) {
        // indice, valor
        cursos.append(
          '<option value="' +
            v.client_id +
            '">' +
            v.client_identificacion +
            "_" +
            v.client_name +
            "</option>"
        );
      });
    },
  });
});

$("#formularioenviodata3").submit(function (e) {
  var seleccion = $("#miSelect90").val();

  var datos = {
    "Seleccion": seleccion,
  };

  e.preventDefault();
  $.ajax({
    type: "POST",
    url: "../Modelo/SuspenderCliente.php",
    data: datos,
    success: function (response) {
      // console.log(response);

      var jsonData = JSON.parse(response);
      if (jsonData.success == "1") {
        Swal.fire({
          position: "top-end",
          icon: "success",
          title: "Suspendido Correctamente",
          showConfirmButton: false,
          timer: 2500,
        });

         ubicacion('suspendercliente');
      }

      if (jsonData.success == "2") {
        Swal.fire({
          icon: "error",
          title: "No Pudo Suspender Al Usuario",
          text: "Hubo Un Problema Al Suspender Intenta de Nuevo",
          // footer: '<a href>Si olvidaste la contraseña contacta con el administrador</a>'
        });
        // location.href ="../Vista/panel.php";
      }

    },
  });
});

$(document).on("change", "#miSelect90", function (event) {
  var separa = $("#miSelect90 option:selected").text().split("_");
  $("#InpCc").val(separa[0]);
  $("#InpNom").val(separa[1]);
  $("#TxtNom").text(separa[1]);
  $("#TxtCc").text(separa[0]);
});
