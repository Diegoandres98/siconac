<div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
<!-- Horizontal Form -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Creacion Nuevo Portal</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" method="post" id="formularionuevoportal">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Nombre Portal</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="Nombre" placeholder="Nombre Portal" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-3 col-form-label">Numero Serie</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="Serie" placeholder="Numero Serie" required>
                    </div>
                  </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info">Agregar</button>
                  <button type="submit" class="btn btn-default float-right">Cancelar</button>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
            <!-- /.card -->

          </div>
          </div>
          </div>

<script src="../Funciones/NuevoPortal.js" ></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>