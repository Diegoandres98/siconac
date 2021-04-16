var cursos = $("#miSelect91");
$(document).ready(function () {
  $.ajax({
    type: "POST",
    url: "../Modelo/ListaQueSePuedeReactivar.php",
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

$("#formularioenviodata4").submit(function (e) {
  var seleccion = $("#miSelect91").val();

  var datos = {
    "Seleccion": seleccion,
  };

  e.preventDefault();
  $.ajax({
    type: "POST",
    url: "../Modelo/ReactivarCliente.php",
    data: datos,
    success: function (response) {
      console.log(response);

      var jsonData = JSON.parse(response);
      if (jsonData.success == "1") {
        Swal.fire({
          position: "top-end",
          icon: "success",
          title: "Reactivado Correctamente",
          showConfirmButton: false,
          timer: 2500,
        });

         ubicacion('reactivarcliente');
      }

      if (jsonData.success == "2") {
        Swal.fire({
          icon: "error",
          title: "No Pudo Reactivar el usuario",
          text: "Hubo Un Problema Al Reactivar",
          // footer: '<a href>Si olvidaste la contraseña contacta con el administrador</a>'
        });
        // location.href ="../Vista/panel.php";
      }
    },
  });
});

$(document).on("change", "#miSelect91", function (event) {
  var separa = $("#miSelect91 option:selected").text().split("_");
  $("#InpCc").val(separa[0]);
  $("#InpNom").val(separa[1]);
  $("#TxtNom").text(separa[1]);
  $("#TxtCc").text(separa[0]);
});
