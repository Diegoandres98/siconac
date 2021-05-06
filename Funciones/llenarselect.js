var cursos = $("#miSelect");
$(document).ready(function () {
  $.ajax({
    type: "POST",
    url: "../../Modelo/M/TraerClientesDisponibles.php",
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

$(document).on("change", "#miSelect", function (event) {
  var separa = $("#miSelect option:selected").text().split("_");
  $("#InpCc").val(separa[0]);
  $("#InpNom").val(separa[1]);
  $("#Inpocultoid").val(idpublic);
  // $("#TxtNom").text(separa[1]);
  // $("#TxtCc").text(separa[0]);
});


$("#formularioenviodata").submit(function (e) {

  e.preventDefault();
  var nombre = $("#InpNom").val();
  var numiden = $("#InpCc").val();
  var idoculto = $("#Inpocultoid").val();

  var datos = {
    InpNom: nombre,
    InpCc: numiden,
    Inpocultoid: idoculto
  };
// console.log(datos);
  $.ajax({
    type: "POST",
    url: "../../Modelo/M/AccesoManual.php",
    data: datos,
    success: function (response) {
      // console.log(response);

      var jsonData = JSON.parse(response);
      if (jsonData.success == "1") {
        Swal.fire({
          position: "top-end",
          icon: "success",
          title: "Se ingreso Correctamente",
          showConfirmButton: false,
          timer: 2500,
        });
        $("#formularioenviodata")[0].reset();
        // ubicacion("asignartarget");
      }

      if (jsonData.success == "2") {
        Swal.fire({
          icon: "error",
          title: "No Pudo abrir",
          text: "los datos son inexistentes",
          // footer: '<a href>Si olvidaste la contraseña contacta con el administrador</a>'
        });
        // location.href ="../Vista/panel.php";
      }

      if (jsonData.success == "3") {
        Swal.fire({
          icon: "error",
          title: "Este usuario no existe",
          text: "Estas tratando de ingresar a alguien que no existe",
          // footer: '<a href>Si olvidaste la contraseña contacta con el administrador</a>'
        });
        // location.href ="../Vista/panel.php";
      }
    },
  });
});