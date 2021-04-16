<?php
    require_once "../Modelo/ValidadorDeSession.php";
    require_once "../Modelo/ListaDeMonitores.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">

            <div class="card">

              <!-- /.card-header -->
              <div class="card-body">

                <table id="tablawarning" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Agregar</th>
                  </tr>
                  </thead>
                  <tbody>

                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Nombre</th>
                      <th>Correo</th>
                      <th>Agregar</th>
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
      </div>
      <!-- /.container-fluid -->
    </section>
<!-- jQuery -->

<!-- <form id="formayudanteinvisble" method="post" name="formayudanteinvisble">
<input type="hidden" name="IdMonitor" id="IdMonitor" value="">
<input type="hidden" name="IdPortal" id="IdPortal" value="">
</form> -->

</body>
</html>
