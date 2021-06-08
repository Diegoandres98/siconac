<?php
    require_once "../Modelo/ValidadorDeSession.php";
    require_once "../Modelo/VerTrafico.php";
    ?>

<script>
  document.querySelector('#Label9').innerText = "Ver Todo El Trafico";
  document.querySelector('#Label8').innerText = "Ver Todo El Trafico";
</script>

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
                                    <th>Fecha</th>
                                    <th>Portal</th>
                                    <th>Modo De Acceso</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                while ($i <$countT) :
                                    if ($Trafico[$i]['traffic_responsable']==0) {
                                        echo '
                                        <tr>
                                            <td>'.$Trafico[$i]['client_identificacion'].'</td>
                                            <td>'.$Trafico[$i]['client_name'].'</td>
                                            <td>'.$Trafico[$i]['traffic_date'].'</td>
                                            <td>'.$Trafico[$i]['devices_alias'].'</td>
                                            <td> Automatico </td>
                                        </tr>
                                        ';
                                    }
                                    else {
                                        echo '
                                        <tr>
                                            <td>'.$Trafico[$i]['client_identificacion'].'</td>
                                            <td>'.$Trafico[$i]['client_name'].'</td>
                                            <td>'.$Trafico[$i]['traffic_date'].'</td>
                                            <td>'.$Trafico[$i]['devices_alias'].'</td>
                                            <td>  Admitido por monitor: '.$Trafico[$i]['traffic_responsable'].'</td>
                                        </tr>
                                        ';
                                    }

                                    $i++;
                                endwhile;
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Identificacion</th>
                                    <th>Nombre</th>
                                    <th>Fecha</th>
                                    <th>Portal</th>
                                    <th>Modo De Acceso</th>
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
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
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
<!-- AdminLTE App -->
<!-- <script src="../dist/js/adminlte.min.js"></script> -->
<!-- AdminLTE for demo purposes -->
<!-- <script src="../dist/js/demo.js"></script>s -->

<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "ordering": false,
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