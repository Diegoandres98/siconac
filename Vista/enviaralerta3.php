<?php
require_once "../Modelo/ValidadorDeSession.php";
require_once "../Modelo/ListaDeMonitores.php";
?>

<script>
  document.querySelector('#Label9').innerText = "Enviar Mensaje";
  document.querySelector('#Label8').innerText = "Enviar Mensaje";
  $("#seleccion").val('3');
</script>

<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="../dist/css/adminlte.min.css">
<!-- summernote -->
<link rel="stylesheet" href="../plugins/summernote/summernote-bs4.min.css">


<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
<!-- Select2 -->
<link rel="stylesheet" href="../plugins/select2/css/select2.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="../dist/css/adminlte.min.css">

<link rel="stylesheet" href="../Vista/vistadecarga.css">

<!-- Main content -->
<section class="content">
  <div class="container-fluid">

    <!-- /.card -->
    <div class="card">
      <!-- <div class="card-header">
                <h3 class="card-title">Etiqueta</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div> -->
      <!-- /.card-header -->
      <div class="card-body p-0">
        <br>
        <div class="row">
          <div class="col-md-2">
            <a class="nav-link"><i class="fab fa-optin-monster text-success"></i> Etiquetas: </a>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <select id="seleccion" class="select2" style="width: 100%;">
                <option value="1">Importante</option>
                <option value="2">Tener En Cuenta</option>
                <option value="3">Informacion</option>
              </select>
            </div>
          </div>
        </div>
      </div>
      <!-- /.card-body -->
    </div>

    <div class="row">
      <div class="col-md-4">

        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Destinatarios</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body p-0">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="tabladedestinatarios" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <td class="ocultaresto"></td>
                      <th><input type="checkbox" id="cbox1" onClick="toggle(this)" value="first_checkbox"></th>
                      <th>Nombre</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $i = 0;
                    while ($i < $countM) :
                      echo '
                  <tr>
                    <td class="ocultaresto">' . $Monitores[$i]['users_id'] . '</td>
                    <td ><input type="checkbox" id="' . $i . '" name="dinamico" value="first_checkbox"></td>
                    <td>' . $Monitores[$i]['users_nombre'] . '</td>
                  </tr> ';
                      $i++;
                    endwhile;
                    ?>
                  </tbody>

                </table>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.card-body -->
        </div>

        <!-- /.card -->
      </div>
      <!-- /.col -->
      <div class="col-md-8">
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title">Escribir Nuevo Mensaje</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="form-group">
              <input id="AsuntoMensaje" class="form-control" placeholder="Asunto:">
            </div>
            <div class="form-group">
              <textarea id="compose-textarea" class="form-control" style="height: 300px" placeholder="Si necesita, escriba aquí sus observaciones">

                    </textarea>
            </div>

          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <div class="float-right">
              <button type="submit" id="EnviarMensaje" class="btn btn-primary"><i class="far fa-envelope"></i> Enviar</button>
            </div>
            <button type="reset" class="btn btn-default"><i class="fas fa-times"></i> Descartar</button>
          </div>
          <!-- /.card-footer -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
<!-- </div> -->
<!-- /.content-wrapper -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- Summernote -->
<script src="../plugins/summernote/summernote-bs4.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- Page specific script -->

<!-- Select2 -->
<script src="../plugins/select2/js/select2.full.min.js"></script>
<script src="../Funciones/enviarmensajechat.js"></script>
<script>
  function toggle(source) {
    checkboxes = document.getElementsByName('dinamico');

    for (var i = 0, n = checkboxes.length; i < n; i++) {
      checkboxes[i].checked = source.checked;
    }

  }
</script>

<script>
  $(function() {
    //Add text editor
    $('#compose-textarea').summernote()
  })
</script>
<script>
  $(function() {
    $('.select2').select2()
  });
</script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../plugins/jszip/jszip.min.js"></script>
<script src="../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script>
  $(function() {
    $("#tabladedestinatarios").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false
      // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>
</body>

</html>