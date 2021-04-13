
var cursos = $("#miSelect");
$(document).ready(function() {
    $.ajax({
            type: "POST",
            url: "../Modelo/TraerClientesSinAsignar.php",
            success: function(response)
            {
              var jsonData = JSON.parse(response);
              cursos.find('option').remove();
              $(jsonData).each(function(i, v){ // indice, valor
                cursos.append('<option value="' + v.client_id + '">' + v.client_identificacion +"_"+v.client_name+ '</option>');
            })
            }
            })
});

$('#formularioenviodata').submit(function (e) 
{
  var seleccion= $('#miSelect').val();
  var numTarget= $('#myInput').val();

  var datos = {
    "Seleccion" : seleccion,
    "NumTarget" : numTarget
  };

  e.preventDefault();
  $.ajax({
    type: "POST",
    url: "../Modelo/AsignarTarget.php",
    data:datos,
    success: function(response)
    {
     console.log(response);

     var jsonData = JSON.parse(response);
          if(jsonData.success == "1"){
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Se Asigno Con Exito La Tarjeta',
                showConfirmButton: false,
                timer: 2500
              })

              ubicacion('asignartarget');
          }

          if(jsonData.success == "2")
              {
                Swal.fire({
                icon: 'error',
                title: 'No Pudo asignar la tarjeta',
                text: 'Hubo Un Problema Al Registrar Intenta de Nuevo',
                // footer: '<a href>Si olvidaste la contraseña contacta con el administrador</a>'
                })
                // location.href ="../Vista/panel.php";
              }

              if(jsonData.success == "3")
              {
                Swal.fire({
                icon: 'error',
                title: 'Esta tarjeta ya existe',
                text: 'no puedes registrar 2 veces las misma tarjeta',
                // footer: '<a href>Si olvidaste la contraseña contacta con el administrador</a>'
                })
                // location.href ="../Vista/panel.php";
              }
    }
    })
});


$(document).on('change', '#miSelect', function(event) {

  var separa = $("#miSelect option:selected").text().split("_"); 
  $('#InpCc').val(separa[0]);
  $('#InpNom').val(separa[1]);
  $('#TxtNom').text(separa[1]);
  $('#TxtCc').text(separa[0]);
});
