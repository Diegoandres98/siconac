<?php
require_once "../Modelo/ListaDePortales.php";
require_once "../Modelo/ListaMonitoresPortal.php";
require_once "../Modelo/PortalesAsociadosAMonitores.php";
?>
<script>
  $(".borrarMonitor").click(function() {
    console.log("hola funciono pero no se que pvats");
    var Identificador = $(this).attr('id');
    var MonitorEnJavaScript = <?php echo json_encode($Monitores); ?>;
    var IdMonitor = MonitorEnJavaScript[Identificador]['users_id'];
    // var cualeliminar=$(this).attr('id');
    Swal.fire({
      title: 'Seguro Quieres Borrar Este Monitor?',
      text: "No podas revertir la accion",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#d33',
      cancelButtonColor: '#3085d6',
      confirmButtonText: '¡Si, Borrar!'
    }).then((result) => {
      if (result.isConfirmed) {

        var parametros = {
          "IdMonitor": IdMonitor
        };
        $.ajax({
          data: parametros, //datos que se envian a traves de ajax
          url: '../Modelo/EliminarMonitor.php', //archivo que recibe la peticion
          type: 'post', //método de envio
          success: function(response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
            // $("#resultado").html(response);
            var jsonData = JSON.parse(response);

            if (jsonData.success == "1") {
              Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Monitor Borrado Con Exito',
                showConfirmButton: false,
                timer: 2500
              })
              ubicacion('listademonitores');
              // window.location="../Vista/panel.php";
              // location.href ="../Vista/panel.php";
              // setTimeout(window.location="../Vista/panel.php",3000);
            }
            if (jsonData.success == "2") {
              Swal.fire({
                icon: 'error',
                title: 'Parece Que este monitor ya estaba retirado',
                text: 'Prueba Refrescando Esta Pagina',
                // footer: '<a href>Si olvidaste la contraseña contacta con el administrador</a>'
              })
              // location.href ="../Vista/panel.php";
            }
          }
        });
      }
    })
  });

  $(".verPortalesAsociados").click(function() {

    var nFilas = $("#ListPortalMonitor tr").length;

    for (i = 0; i <= nFilas; i++) {
      $('#row' + i + '').remove();
    }

    //  console.log($(this).attr('id'));
    var Identificador = $(this).attr('id');

    var PortalesDeLosMonitoresENJS = <?php echo json_encode($PortalesDeLosMonitores); ?>;
    var connt=0;
    for (let item in PortalesDeLosMonitoresENJS) {
      // console.log(MonitoresDePortalEnJs[item]['mp_id_portal']);
      if (PortalesDeLosMonitoresENJS[item]['users_id'] == Identificador) {
        var fila = '<tr id="row' + connt + '" class="claseid" ><td>' + PortalesDeLosMonitoresENJS[item]['devices_id'] + '</td><td>' + PortalesDeLosMonitoresENJS[item]['devices_alias'] + '</td><td>' + PortalesDeLosMonitoresENJS[item]['devices_serie'] + ' </td> </tr>'; //esto seria lo que contendria la fila
        // <td style="display:none;" >' + MonitoresDePortalEnJs[item]['mp_id_mp'] + '</td>
        $('#ListPortalMonitor tr:first').after(fila);
        connt++;
      }
    }
  });
</script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>