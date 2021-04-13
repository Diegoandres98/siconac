<link rel="stylesheet" href="../Vista/vistadecarga.css">

<script>
  document.querySelector('#Label9').innerText = "Agregar Usuario";
  document.querySelector('#Label8').innerText = "Agregar Usuario";
</script>

<div class="row">
    <!-- left column -->
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <div class="card card-primary">
            <div class="card-header">
            <h3 class="card-title">Registro De Usuario(s)</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <!-- <form method="post" action="../Modelo/CrearMonitor.php" enctype="multipart/form-data">  -->
            <!-- <form action="../Modelo/uploads.php" method="post" enctype="multipart/form-data"> -->
            <form method="post" id="FormRegistroUsuarios" enctype="multipart/form-data"> 
            <div class="card-body">

                <div class="form-group">
                <label for="exampleInputFile">Archivo CSV</label> (Puedes Subir Multiples Usuarios Con Un Archivo csv)
                <br>
                <label for="exampleInputFile">Nota: </label> Debe Archivo Debe Tener Este Formato: "Numero Identificacion; Nombre"
                <div class="input-group">
                    <div class="custom-file">
                    <input type="file" class="custom-file-input" name="fileContacts" accept=".csv">
                    <label class="custom-file-label" for="exampleInputFile">Escoger Archivo Csv</label>
                    </div>

                </div>
                </div>

                <div class="form-group">
                <label for="exampleInputEmail1">Numero Identificacion</label>
                <input type="number" class="form-control" name="NID" placeholder="Escriba Numero Identificacion" >
                </div>
                <div class="form-group">
                <label for="exampleInputEmail1">Nombre</label>
                <input type="text" class="form-control" name="Nombre" placeholder="Escriba Nombre" >
                </div>

                <div class="form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
                <label class="form-check-label" for="exampleCheck1">Acepto Terminos y Condiciones</label>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-primary" id="import" name="import">Enviar</button>
            </div>
            </form>
        </div>
    </div>
</div>
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>

<div class="modal fade" id="modal-danger">
        <div class="modal-dialog">
          <div class="modal-content bg-danger">
            <div class="modal-header">
              <h4 class="modal-title">Listado De Usuarios Que Ya Estaban Registrados</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

            <!-- <div class="container-fluid"> -->
            <section class="content">
                <div class="container-fluid">
                <div class="row">
                <div class="col-md-12">

                    <div class="cardPropio">

                    <!-- /.card-header -->
                    <div class="card-body">

                        <table id="ListDeRechazados" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                        <tfoot>
                            <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            </tr>
                        </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                </div>
                <!-- /.row -->
            <!-- </div> -->
            </div>
      <!-- /.container-fluid -->
    </section>

            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cerrar</button>
              <button type="button" class="btn btn-outline-light">Descargar</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

<script src="../Funciones/CrearUsuarios.js" ></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>