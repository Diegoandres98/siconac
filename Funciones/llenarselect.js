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
  $("#Inpocultoid").val($(this).val());
  $("#botonenviar").prop('disabled', false);
  
});
