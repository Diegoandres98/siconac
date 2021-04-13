<?php
require_once "../Modelo/ListaDeMonitores.php";
?>
<script>
  document.querySelector('#Label9').innerText = "Lista De Monitores";
  document.querySelector('#Label8').innerText = "Lista De Monitores";
</script>
<!-- Main content -->
<section class="content">

  <!-- Default box -->
  <div class="card card-solid">
    <div class="card-body pb-0">
      <div class="row d-flex align-items-stretch">

        <?php
        $i = 0;
        while ($i < $countM) :
          echo '

            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
              <div class="card bg-light">
                <div class="card-header text-muted border-bottom-0">
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-7">
                      <p class="text-muted text-sm"><b>Nombre: </b> <br/>' . $Monitores[$i]['users_nombre'] . ' </p>
                      <p class="text-muted text-sm"><b>Correo: </b> ' . $Monitores[$i]['users_email'] . ' </p>

                    </div>
                    <div class="col-5 text-center">
                      <img src="' . $Monitores[$i]['users_foto'] . '" alt="user-avatar" class="fotocuadrada">
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="text-right">
                    <a href="#" id="' . $i . '" class="btn btn-sm bg-danger borrarMonitor">
                     <i class="fas fa-trash"></i>
                    </a>
                    <a href="#" id="' . $i . '" class="btn btn-sm btn-success verPortalesAsociados" data-toggle="modal" data-target="#modal-listPort" >
                     <i class="fas fa-eye"></i> Ver Mas
                    </a>
                  </div>
                </div>
              </div>
            </div>
            ';
          $i++;
        endwhile;
        ?>
      </div>
    </div>

    <div class="modal fade" id="modal-listPort">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h7 class="modal-title">Portales Asignados a:&nbsp;</h7>
            <h6 class="modal-title info-box-number" id="Label5"> </h6>

            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

            <?php require_once "../Vista/listadeportalesdelmonitor.php"; ?>

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


    <!-- /.card-body -->
    <div class="card-footer">
      <nav aria-label="Contacts Page Navigation">
        <ul class="pagination justify-content-center m-0">
          <li class="page-item active"><a class="page-link" href="#">1</a></li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item"><a class="page-link" href="#">4</a></li>
          <li class="page-item"><a class="page-link" href="#">5</a></li>
          <li class="page-item"><a class="page-link" href="#">6</a></li>
          <li class="page-item"><a class="page-link" href="#">7</a></li>
          <li class="page-item"><a class="page-link" href="#">8</a></li>
        </ul>
      </nav>
    </div>
    <!-- /.card-footer -->
  </div>
  <!-- /.card -->

</section>
<?php require_once "../Funciones/EliminarMonitorFSJS.php"; ?>