<?php
require_once "../Modelo/ListaDeMonitores.php";
require_once "../Modelo/ListaMonitoresPortal.php";
?>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
  var IdPortalEscogido;

  $(".aggmonitor").click(function() {
    // console.log($(this).attr('id'));
    var Identificador = $(this).attr('id');

    console.log(Identificador);
    var PortalEnJavaScript = <?php echo json_encode($Portales); ?>;
    var Id = PortalEnJavaScript[Identificador]['devices_id'];
    IdPortalEscogido = Id;

    var alias = PortalEnJavaScript[Identificador]['devices_alias'];
    document.querySelector('#Label1').innerText = alias;
  });




  $(".agg_monitor").click(function() {
    //  console.log($(this).attr('id'));
    var Identificador = $(this).attr('id');
    // console.log(Identificador);
    var MonitorEnJavaScript = <?php echo json_encode($Monitores); ?>;

    var IdMonitor = MonitorEnJavaScript[Identificador]['users_id'];

    console.log(IdMonitor);
    console.log(IdPortalEscogido);
    // $("#IdMonitor").val(IdMonitor);
    // $("#IdPortal").val(IdPortal);

    var parametros = {
      "IdMonitor": IdMonitor,
      "IdPortal": IdPortalEscogido
    };
    $.ajax({
      data: parametros, //datos que se envian a traves de ajax
      url: '../Modelo/AsignarPortalAMonitor.php', //archivo que recibe la peticion
      type: 'post', //método de envio
      success: function(response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
        // $("#resultado").html(response);
        console.log(response);
        var jsonData = JSON.parse(response);
        console.log(jsonData);
        if (jsonData.success == "1") {

          Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Portal Asignado Con Exito',
            showConfirmButton: false,
            timer: 2500
          })
          // window.location="../Vista/panel.php";
          // location.href ="../Vista/panel.php";
          // setTimeout(window.location="../Vista/panel.php",3000);
        }
        if (jsonData.success == "2") {
          Swal.fire({
            icon: 'error',
            title: 'Parece que estas asignando un portal a un usuario que ya estaba',
            text: 'No Se ha guardado tu registro, e intenta con otro Monitor',
            // footer: '<a href>Si olvidaste la contraseña contacta con el administrador</a>'
          })
          // location.href ="../Vista/panel.php";
        }
        if (jsonData.success == "3") {
          Swal.fire({
            icon: 'error',
            title: 'Parece que de una forma fraudelenta no estas poniendo los datos',
            text: 'Para poder crear un portal, ingrese los datos correctamente',
            // footer: '<a href>Si olvidaste la contraseña contacta con el administrador</a>'
          })
          // location.href ="../Vista/panel.php";
        }
      }
    });

  });



  $(".vermonitorportal").click(function() {

    // var identificadordefila=$(".claseid").attr('id');
    // var alias= PortalEnJavaScript[identificadordefila]['devices_alias'];
    // document.querySelector('#Label2').innerText = alias;

    var nFilas = $("#tablawarning tr").length;

    for (i = 0; i <= nFilas; i++) {
      $('#row' + i + '').remove();
    }

    //  console.log($(this).attr('id'));
    var Identificador = $(this).attr('id');
    var PortalEnJavaScript = <?php echo json_encode($Portales); ?>;
    var MonitorEnJavaScript = <?php echo json_encode($Monitores); ?>;
    var IdPortal = PortalEnJavaScript[Identificador]['devices_id'];
    console.log(IdPortal);
    // $("#IdMonitor").val(IdMonitor);
    var alias = PortalEnJavaScript[Identificador]['devices_alias'];
    document.querySelector('#Label2').innerText = alias;
    // $("#IdPortal").val(IdPortal);
    var MonitoresDePortalEnJs = <?php echo json_encode($MonitoresPortales); ?>;

    for (let item in MonitoresDePortalEnJs) {
      // console.log(MonitoresDePortalEnJs[item]['mp_id_portal']);
      if (MonitoresDePortalEnJs[item]['mp_id_portal'] == IdPortal) {
        console.log(MonitoresDePortalEnJs[item]['mp_id_monitors']);

        for (let x in MonitorEnJavaScript) {
          if (MonitoresDePortalEnJs[item]['mp_id_monitors'] == MonitorEnJavaScript[x]['users_id']) {
            MonitorEnJavaScript[x]['users_nombre'];
            MonitorEnJavaScript[x]['users_email'];

            var fila = '<tr id="row' + x + '" class="claseid" ><td>' + MonitorEnJavaScript[x]['users_nombre'] + '</td><td>' + MonitorEnJavaScript[x]['users_email'] + '</td><td> <a href="#" id="' + MonitoresDePortalEnJs[item]['mp_id_mp'] + '" class="dltmonpor btn btn-sm bg-danger" name="Id"> <i class="fas fa-trash"></i> </a> </td> </tr>'; //esto seria lo que contendria la fila
            // <td style="display:none;" >' + MonitoresDePortalEnJs[item]['mp_id_mp'] + '</td>

            $('#tablawarning tr:first').after(fila);

          }
        }
      }
    }

  });

  $(document).on('click', '.dltmonpor', function() {
    var Identificador = $(this).attr('id');

    var parametros = {
      "IdMonitorAsignado": Identificador
    };
    $.ajax({
      data: parametros, //datos que se envian a traves de ajax
      url: '../Modelo/EliminarMonitorDelPortal.php', //archivo que recibe la peticion
      type: 'post', //método de envio
      success: function(response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
        // $("#resultado").html(response);
        console.log(response);
        var jsonData = JSON.parse(response);
        console.log(jsonData);


        if (jsonData.success == "1") {
          Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Monitor Retirado Del Portal Con Exito',
            showConfirmButton: false,
            timer: 2500
          })
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
        if (jsonData.success == "3") {
          Swal.fire({
            icon: 'error',
            title: 'Parece que de una forma fraudelenta no estas poniendo los datos',
            text: 'Para poder crear un portal, ingrese los datos correctamente',
            // footer: '<a href>Si olvidaste la contraseña contacta con el administrador</a>'
          })
          // location.href ="../Vista/panel.php";
        }
      }
    });

  });


  $(".borrarportal").click(function() {

    var Identificador = $(this).attr('id');
    var PortalEnJavaScript = <?php echo json_encode($Portales); ?>;
    var IdPortal = PortalEnJavaScript[Identificador]['devices_id'];
    // var cualeliminar=$(this).attr('id');
    console.log(IdPortal);
    Swal.fire({
      title: 'Seguro Quieres Borrar Este Portal?',
      text: "No podas revertir la accion",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#d33',
      cancelButtonColor: '#3085d6',
      confirmButtonText: '¡Si, Borrar!'
    }).then((result) => {
      if (result.isConfirmed) {

        var parametros = {
          "IdPortal": IdPortal
        };
        $.ajax({
          data: parametros, //datos que se envian a traves de ajax
          url: '../Modelo/EliminarPortal.php', //archivo que recibe la peticion
          type: 'post', //método de envio
          success: function(response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
            // $("#resultado").html(response);
            var jsonData = JSON.parse(response);

            if (jsonData.success == "1") {
              Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Monitor Retirado Del Portal Con Exito',
                showConfirmButton: false,
                timer: 2500
              })
              ubicacion('listadeportales');
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
</script>