    <?php
    require_once "../Modelo/ValidadorDeSession.php";
    require_once "../Modelo/ListaDePortales.php";
    ?>
    <!-- Main content -->
    <section class="content">

    <div class="container-fluid">
     <div class="row">
          <?php
          $i = 0;
            while ($i < $countM):
              echo '
                <div class="col-12 col-sm-6 col-md-3">
                  <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-door-open"></i></span>
    
                    <div class="info-box-content">
                      <span class="info-box-text">Portal: '.$users[$i]['devices_alias'].'</span>
                      <span class="info-box-number">ID: '.$users[$i]['devices_id'].' <small>°</small> </span>
                      <span class="info-box-text">Serial: '.$users[$i]['devices_serie'].'</span>

                      <div class="text-right">
                      <a href="#" id="'.$i.'" class="btn btn-sm bg-warning" data-toggle="modal" data-target="#modal-default">
                      <i class="fas fa-info-circle"></i>
                      </a>
                      <a href="#" id="'.$i.'" class="btn btn-sm bg-success" data-toggle="modal" data-target="#modal-default2">
                      <i class="fas fa-user-plus"></i>
                     </a>
                      <a href="#" id="'.$i.'" class="btn btn-sm bg-danger">
                       <i class="fas fa-trash"></i>
                      </a>
                      <a href="#" id="'.$i.'" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-default3">
                      <i class="fas fa-edit"></i> 
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

    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Ver Monitores a Cargo De Este Portal</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>One fine body&hellip;</p>
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

      <div class="modal fade" id="modal-default2">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Agregar Monitor De La Lista </h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>One fine body&hellip;</p>
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
      <div class="modal fade" id="modal-default3">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Editar Datos Del Portal</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Editar Portal Existente</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" method="post" id="editarportal">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Nombre Portal</label>
                    <div class="col-sm-9">
                    <input type="text" class="form-control" id="nombreP" name="nombreP" 
                    placeholder="Nombre Portal" value="" required> 
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-3 col-form-label">Numero Serie</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="numS" name="numS" 
                     placeholder="Numero Serie" value="" required> 
                     <input type="hidden" id="Id" value="" name="Id"> 
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info">Guardar</button>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
            <!-- /.card -->



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
<script src="../Funciones/EditarPortal.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
  $(".btn-primary").click(function(){
  // console.log($(this).attr('id'));
  var Identificador=$(this).attr('id');

  console.log(Identificador);
  var userEnJavaScript = <?php echo json_encode($users); ?>;
  var Id= userEnJavaScript[Identificador]['devices_id'];
  var alias= userEnJavaScript[Identificador]['devices_alias'];
  var serie= userEnJavaScript[Identificador]['devices_serie'];

  $("#Id").val(Id);
  $("#nombreP").val(alias);
  $("#numS").val(serie);

});
</script>