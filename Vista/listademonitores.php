<?php
require_once "../Modelo/ListaDeMonitores.php";
?>
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body pb-0">
          <div class="row d-flex align-items-stretch">

          <?php
          $i = 0;
            while ($i < $countM):
              echo '

            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
              <div class="card bg-light">
                <div class="card-header text-muted border-bottom-0">
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-7">
                      <p class="text-muted text-sm"><b>Nombre: </b> <br/>'.$Monitores[$i]['users_nombre'].' </p>
                      <p class="text-muted text-sm"><b>Correo: </b> '.$Monitores[$i]['users_email'].' </p>
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Portales: "Ver Mas"</li>
                      </ul>
                    </div>
                    <div class="col-5 text-center">
                      <img src="'.$Monitores[$i]['users_foto'].'" alt="user-avatar" class="fotocuadrada">
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="text-right">
                    <a href="#" id="'.$i.'" class="btn btn-sm bg-danger borrarMonitor">
                     <i class="fas fa-trash"></i>
                    </a>
                    <a href="#" class="btn btn-sm btn-success">
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
    