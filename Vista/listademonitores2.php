<?php
    require_once "../Modelo/ValidadorDeSession.php";
    require_once "../Modelo/ListaDeMonitores.php";
?>

  <!-- Google Font: Source Sans Pro -->
  <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"> -->
  <!-- Font Awesome -->
  <!-- <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css"> -->
  <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">

<body class="hold-transition sidebar-mini">

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">

            <div class="card">

              <!-- /.card-header -->
              <div class="card-body">

                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Agregar</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  $i = 0;
                   while ($i < $countM):
                    echo '
                  <tr>
                    <td>'.$Monitores[$i]['users_nombre'].'</td>
                    <td>'.$Monitores[$i]['users_email'].'</td>
                    <td>  
                      <a href="#" id="'.$i.'" class="btn btn-sm bg-success agg_monitor" name="Id">
                      <i class="fas fa-user-plus"></i>
                     </a>
                    </td>
                  </tr> ';
                  $i++;
                  endwhile;
                  ?>
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

<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false
      // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>
<!-- <form id="formayudanteinvisble" method="post" name="formayudanteinvisble">
<input type="hidden" name="IdMonitor" id="IdMonitor" value="">
<input type="hidden" name="IdPortal" id="IdPortal" value="">
</form> -->
<?php require_once "../Funciones/funcionesjsconphp.php"; ?>

</body>
