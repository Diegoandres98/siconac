<script>
    document.querySelector('#Label9').innerText = "Listado De Usuarios Registrados";
    document.querySelector('#Label8').innerText = "Listado De Usuarios Registrados";
</script>

<?php
require_once "../Modelo/ListadoDeClientesRegistrados.php";
?>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Listado De Usuarios</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Identificacion</th>
                                    <th>Nombre</th>
                                    <th>Tarjeta</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                while ($i < $countC) :

                                    if ($ListadoDeClientes[$i]['client_card_id'] != 0) {
                                        $asignado = "Asignada";
                                    } else {
                                        $asignado = "NO Establecida";
                                    }

                                    if ($ListadoDeClientes[$i]['client_status'] == 1) {
                                        $status = "Activo";
                                    } else {
                                        $status = "Suspendido";
                                    }
                                    echo '
                                <tr>
                                    <td>' . $ListadoDeClientes[$i]['client_identificacion'] . '</td>
                                    <td>' . $ListadoDeClientes[$i]['client_name'] . '</td>
                                    <td>' . $asignado . '</td>
                                    <td>' . $status . '</td>
                                    <td>
                                        <a href="#" id="' .$i. '" class="btn btn-sm btn-primary BtnActiModal" data-toggle="modal" data-target="#modal-default34">
                                        <i class="fas fa-edit"></i> 
                                        </a>
                                        <a href="#" id="' . $ListadoDeClientes[$i]['client_id'] . '" class="btn btn-sm bg-danger borrarportal">
                                        <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>';
                                    $i++;
                                endwhile;
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Identificacion</th>
                                    <th>Nombre</th>
                                    <th>Tarjeta</th>
                                    <th>Status</th>
                                    <th>Action</th>
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
<!-- /.content -->


<div class="modal fade" id="modal-default34">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Editar Datos Del Usuario</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Editar Datos Del Usuario</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form class="form-horizontal" method="post" id="editarcliente">
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">Nombre Usuario</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="nombreP" name="nombreP"  value="" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-3 col-form-label">Numero Identficacion</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" id="numS" name="numS"  value="" required>
                                    <input type="hidden" id="Id" value="" name="Id">
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-info">Guardar Cambios</button>
                        </div>
                        <!-- /.card-footer -->
                    </form>
                </div>
                <!-- /.card -->
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<!-- <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script> -->
<!-- DataTables  & Plugins -->
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

<!-- <script src="../dist/js/adminlte.min.js"></script> -->

<!-- <script src="../dist/js/demo.js"></script> -->

<script src="../Funciones/EditarDatosDelCliente.js"></script>

<script >
$(".BtnActiModal").click(function(){
  // console.log($(this).attr('id'));
  var Identificador=$(this).attr('id');

  var ClientesEnJavaScript = <?php echo json_encode($ListadoDeClientes); ?>;
  var Id= ClientesEnJavaScript[Identificador]['client_id'];
  var alias= ClientesEnJavaScript[Identificador]['client_name'];
  var serie= ClientesEnJavaScript[Identificador]['client_identificacion'];

  $("#Id").val(Id);
  $("#nombreP").val(alias);
  $("#numS").val(serie);

});
</script>


<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>