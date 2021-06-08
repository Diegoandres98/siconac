<?php
require_once "../../Modelo/ValidadorDeSession.php";
require_once "../../Modelo/M/ListaTraficoPortal.php";
?>

<script>
    document.querySelector('#Label9').innerText = "Ver Trafico Portal Seleccionado";
    document.querySelector('#Label8').innerText = "Ver Trafico Portal Seleccionado";
    document.querySelector('#TitlePortal').innerText = "Listado De Trafico Del "+x;
</script>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">
                        <h3 id="TitlePortal" class="card-title">Listado De Trafico</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="listamonitordeestudiantes" class="table table-bordered table-striped">
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
                                // $i = 0;
                                // while ($i <$countTP) :
                                //     echo '
                                // <tr>
                                //     <td>'.$TraficoPortal[$i]['client_identificacion'].'</td>
                                //     <td>'.$TraficoPortal[$i]['client_name'].'</td>
                                //     <td>'.$TraficoPortal[$i]['traffic_date'].'</td>
                                //     <td>'.$TraficoPortal[$i]['devices_alias'].'</td>
                                // </tr>
                                // ';
                                //     $i++;
                                // endwhile;
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
<script>

    for (let i = 0; i < datosRegistrados[0].length; i++) {
        if (datosRegistrados[0][i]['traffic_responsable']==0) {
            console.log(datosRegistrados[0][i]['traffic_responsable']);
            var fila = '<tr id="row' + i + '" class="claseid" ><td>' + datosRegistrados[0][i]['client_identificacion'] + '</td><td>' + datosRegistrados[0][i]['client_name'] + '</td><td>' + datosRegistrados[0][i]['traffic_date'] + '</td> <td>' + datosRegistrados[0][i]['devices_alias'] + '</td> <td> Automatico </td>  </tr>'; //esto seria lo que contendria la fila
            $("#listamonitordeestudiantes>tbody").prepend(fila);
        }
        else
        {
            var fila = '<tr id="row' + i + '" class="claseid" ><td>' + datosRegistrados[0][i]['client_identificacion'] + '</td><td>' + datosRegistrados[0][i]['client_name'] + '</td><td>' + datosRegistrados[0][i]['traffic_date'] + '</td> <td>' + datosRegistrados[0][i]['devices_alias'] + '</td> <td> Admitido por monitor: ' + datosRegistrados[0][i]['traffic_responsable'] + '</td>  </tr>'; //esto seria lo que contendria la fila
            $("#listamonitordeestudiantes>tbody").prepend(fila);
        }

        // $('#listamonitordeestudiantes tr:first').after(fila);
    }
</script>

<!-- <script src="../../plugins/jquery/jquery.min.js"></script> -->
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../../plugins/jszip/jszip.min.js"></script>
<script src="../../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<!-- <script src="../dist/js/adminlte.min.js"></script> -->
<!-- AdminLTE for demo purposes -->
<!-- <script src="../dist/js/demo.js"></script>s -->


<script>
    $(function() {
        $("#listamonitordeestudiantes").DataTable({
            "responsive": true,
            "ordering": false,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print"]
        }).buttons().container().appendTo('#listamonitordeestudiantes_wrapper .col-md-6:eq(0)');
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

