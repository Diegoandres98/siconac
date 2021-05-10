<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="../../dist/css/adminlte.min.css">

<script>
  document.querySelector('#Label9').innerText = "Cuerpo Mensaje";
  document.querySelector('#Label8').innerText = "Mensajes / Cuerpo Mensaje";
</script>
<script>
    $("#Asunto").html('Asunto: ' + datosdelmensaje[0]['chat_asunto']);
    $("#remitente").html('De: ' + datosdelmensaje[0]['Expr_1']);
    $("#receptor").html('Para: ' + datosdelmensaje[0]['users_nombre']);
    $("#fecha").html('Fecha: ' + datosdelmensaje[0]['chat_horaenvio']);
    $("#contenidoxd").html(datosdelmensaje[0]['chat_cuerpomensaje']);
    
</script>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">Leer Mensaje</h3>

                        <div class="card-tools">
                            <a href="#" class="btn btn-tool" title="Previous"><i class="fas fa-chevron-left"></i></a>
                            <a href="#" class="btn btn-tool" title="Next"><i class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <div class="mailbox-read-info">
                            <span id="fecha" class="mailbox-read-time float-right">15 Feb. 2015 11:03 PM</span>
                            <h5 id="Asunto">
                                <h5>
                                    <h6 id="remitente"> </h6>
                                    <h6 id="receptor"> </h6>

                        </div>
                        <!-- /.mailbox-read-info -->
                        <!-- <div class="mailbox-controls with-border text-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-sm" data-container="body" title="Delete">
                                    <i class="far fa-trash-alt"></i>
                                </button>
                                <button type="button" class="btn btn-default btn-sm" data-container="body" title="Reply">
                                    <i class="fas fa-reply"></i>
                                </button>
                                <button type="button" class="btn btn-default btn-sm" data-container="body" title="Forward">
                                    <i class="fas fa-share"></i>
                                </button>
                            </div>
          
                            <button type="button" class="btn btn-default btn-sm" title="Print">
                                <i class="fas fa-print"></i>
                            </button>
                        </div> -->
                        <!-- /.mailbox-controls -->
                        <div id="contenidoxd" class="mailbox-read-message">

                        </div>
                        <!-- /.mailbox-read-message -->
                    </div>
                    <!-- /.card-body -->
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
</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->

<!-- 
<script src="../../plugins/jquery/jquery.min.js"></script>

<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="../../dist/js/adminlte.min.js"></script>

<script src="../../dist/js/demo.js"></script> -->