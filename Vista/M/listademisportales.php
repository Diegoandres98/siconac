<?php
require_once "../../Modelo/ValidadorDeSession.php";
require_once "../../Modelo/M/ListaDeMisPortales.php";
require_once "../../Modelo/M/IdDeLosPortalesDelMonitor.php";
?>

<script>
  document.querySelector('#Label9').innerText = "Lista De Portales A Cargo";
  document.querySelector('#Label8').innerText = "Lista De Portales A Cargo";
</script>
<link rel="stylesheet" href="parpadeo.css">
<link rel="stylesheet" href="led.css">
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <?php
      $i = 0;
      while ($i < $countP) :
        echo '
                <div class="col-12 col-sm-6 col-md-6">
                  <div class="info-box" style="position:relative !important;box-sizing: border-box !important;">
                    <div class="led-box">
                      <div id="led'.$Portales[$i]['devices_id'].'" class="led-red"></div>
                    </div>
                    <span id="bombillo'. $Portales[$i]['devices_id'] .'" class="info-box-icon bg-info elevation-1"><i class="fas fa-door-open"></i></span>
    
                    <div class="info-box-content">
                      <span id="portal' . $Portales[$i]['devices_id'] . '" class="info-box-text">Portal: ' . $Portales[$i]['devices_alias'] . '</span>
                      <span id="display_new_access'.$Portales[$i]['devices_id'].'" class="info-box-number">Trafico En Vivo: </span>

                      <div class="text-right">
                      <a href="#" id="' . $Portales[$i]['devices_id'] . '" class="btn btn-sm bg-warning vertraficoportal">
                      <i class="fas fa-info-circle"></i> Trafico
                      </a>

                      <a href="#" id="' . $Portales[$i]['devices_id'] . '" class="btn btn-sm btn-success accesomanual" data-toggle="modal" data-target="#modal-default3">
                      <i class="fas fa-hands-helping"></i>Acceso Manual
                      </a>
                     </div>


                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                ';
        $i++;
      endwhile;
      ?>
    </div>
  </div>

</section>

<!-- /.modal -->
<div class="modal fade" id="modal-default3">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Generar un acceso manualmente</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="card card-info">
          <div class="card-header">
            <h3 id="cardtitle" class="card-title">En el Portal</h3>
          </div>

          <?php require_once "../M/accesomanual.php"; ?>

        </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <!-- <button type="button" class="btn btn-primary">Guardar</button> -->
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script src="../../Controlador/CargadorTraficoDEPORTAL.js"></script>


<script>
  var x;
  var IdPortalSeleccionado;
  $(".vertraficoportal").click(function() {
    // console.log($(this).attr('id'));
    var Identificador = $(this).attr('id');
    x = $('#portal' + Identificador).text();
    Cargartrafico(Identificador);
  });

  $(".accesomanual").click(function() {
    // console.log($(this).attr('id'));
    var Identificador = $(this).attr('id');
    IdPortalSeleccionado = Identificador;
    // Cargartrafico(Identificador);
    $("#InpCc").val('');
    $("#InpNom").val('');
    $("#Inpocultoid").val('');
    $("#botonenviar").prop('disabled', true);

  });
</script>

<script>
  PortalesDelMonit = <?php echo json_encode($IDPortales); ?>;
  IdAdmiDelMonit = <?php echo $_SESSION['users_propietario']; ?>;
  IdMonit = <?php echo $_SESSION['users_id']; ?>;
</script>
<script src="../../Mqtt/FuncionesYConexion.js"></script>
  <script src="../../Mqtt/MqttRegistroManual.js"></script>