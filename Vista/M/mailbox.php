<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
<!-- icheck bootstrap -->
<link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="../../dist/css/adminlte.min.css">
<script>
  document.querySelector('#Label9').innerText = "Mensajes";
  document.querySelector('#Label8').innerText = "Mensajes";
</script>
<!-- Main content -->
<section class="content">

  <div class="row">

    <div class="col-md-2">
      <div class="card">
        <div class="card-header">
          <a href="#">
            <i class="fas fa-inbox"></i> Todos
            <span id="todos" class="badge bg-secondary float-right"></span>
          </a>
        </div>
      </div>
    </div>
    <div class="col-md-2">
      <div class="card">
        <div class="card-header">
          <a href="#">
            <i class="far fa-envelope text-gray-dark"></i> Sin Leer
            <span id="sinleer" class="badge bg-gray-dark float-right"> </span>
          </a>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card">
        <div class="card-header">
          <a href="#">
            <i class="fas fa-star text-warning"></i> Importante
            <span id="importante" class="badge bg-warning float-right"> </span>
          </a>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card">
        <div class="card-header">
          <a href="#">
            <i class="fas fa-question-circle text-info"></i> Informativo
            <span id="informativo" class="badge bg-info float-right"> </span>
          </a>
        </div>
      </div>
    </div>
    <div class="col-md-2">
      <div class="card">
        <div class="card-header">
          <a href="#">
            <i class="fas fa-envelope-open-text text-gray-dark"></i> Leidos
          </a>
        </div>
      </div>
    </div>
  </div>


  <div class="row">
    <!-- /.col -->
    <div class="col-md-12">
      <div class="card card-primary card-outline">
        <div class="card-header">
          <h3 class="card-title">Mensajes</h3>

          <div class="card-tools">
            <div class="input-group input-group-sm">
              <input type="text" class="form-control" placeholder="Search Mail">
              <div class="input-group-append">
                <div class="btn btn-primary">
                  <i class="fas fa-search"></i>
                </div>
              </div>
            </div>
          </div>
          <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">

          <div class="table-responsive mailbox-messages">
            <table id="Mensajes" class="table table-hover table-striped">
              <thead>
                <tr>
                  <th>Indice</th>
                  <th>Tag</th>
                  <th>Leido /no</th>
                  <th>Remitente</th>
                  <th>Asunto</th>
                  <th>Fecha De Envio</th>
                </tr>
              </thead>
              <tbody>
                <!-- <tr>
                  <td>
                    <div class="icheck-primary">
                      <input type="checkbox" value="" id="check14">
                      <label for="check14"></label>
                    </div>
                  </td>
                  <td class="mailbox-star"><a href="#"><i class="fas fa-star text-warning"></i></a></td>
                  <td class="mailbox-name"><a href="read-mail.html">Alexander Pierce</a></td>
                  <td class="mailbox-subject"><b>Asuntol</b> - Trying to find a solution to this problem...
                  </td>
                  <td class="mailbox-attachment"><i class="fas fa-paperclip"></i></td>
                  <td class="mailbox-date">14 days ago</td>
                </tr> -->
              </tbody>
            </table>
            <!-- /.table -->
          </div>
          <!-- /.mail-box-messages -->
        </div>
        <!-- /.card-body -->
        <div class="card-footer p-0">

        </div>
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>

<!-- ./wrapper -->

<!-- jQuery -->
<!-- Bootstrap 4 -->
<!-- <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script> -->
<!-- AdminLTE App -->
<!-- <script src="../../dist/js/adminlte.min.js"></script> -->
<!-- AdminLTE for demo purposes -->
<!-- <script src="../../dist/js/demo.js"></script> -->
<!-- Page specific script -->
<script>
  $(function() {
    //Enable check and uncheck all functionality
    $('.checkbox-toggle').click(function() {
      var clicks = $(this).data('clicks')
      if (clicks) {
        //Uncheck all checkboxes
        $('.mailbox-messages input[type=\'checkbox\']').prop('checked', false)
        $('.checkbox-toggle .far.fa-check-square').removeClass('fa-check-square').addClass('fa-square')
      } else {
        //Check all checkboxes
        $('.mailbox-messages input[type=\'checkbox\']').prop('checked', true)
        $('.checkbox-toggle .far.fa-square').removeClass('fa-square').addClass('fa-check-square')
      }
      $(this).data('clicks', !clicks)
    })

    //Handle starring for font awesome
    $('.mailbox-star').click(function(e) {
      e.preventDefault()
      //detect type
      var $this = $(this).find('a > i')
      var fa = $this.hasClass('fa')

      //Switch states
      if (fa) {
        $this.toggleClass('fa-star')
        $this.toggleClass('fa-star-o')
      }
    })
  })
</script>

<script>
  var importantes = 0;
  var informativos = 0;
  var sinleer = 0;
  for (let i = 0; i < Chats.length; i++) {

    if (Chats[i]['chat_tag'] == 1) {
      if (Chats[i]['chat_leido'] == 0) { //cambair el sobre
        var fila = '<tr id="row' + i + '" ><td>' + (i + 1) + ' </td> <td class="mailbox-star"><a href="#"><i class="fas fa-star text-warning"></i></a> </td> <td> <i class="far fa-envelope"> </td> </i> <td class="mailbox-name" id="' + Chats[i]['chat_id_mensaje'] + '"><a href="#" >' + Chats[i]['Expr_1'] + '</a></td> <td class="mailbox-subject"><b>' + Chats[i]['chat_asunto'] + '</b> </td><td class="mailbox-date">' + Chats[i]['chat_horaenvio'] + '</td> </tr>'; //esto seria lo que contendria la fila
        $("#Mensajes>tbody").prepend(fila);
        importantes++;
        sinleer++;
      } else {
        var fila = '<tr id="row' + i + '"  ><td>' + (i + 1) + ' </td> <td class="mailbox-star"><a href="#"><i class="fas fa-star text-warning"></i></a> </td> <td> <i class="fas fa-envelope-open-text"> </td> </i> <td class="mailbox-name" id="' + Chats[i]['chat_id_mensaje'] + '"><a href="#"  >' + Chats[i]['Expr_1'] + '</a></td> <td class="mailbox-subject"><b>' + Chats[i]['chat_asunto'] + '</b> </td><td class="mailbox-date">' + Chats[i]['chat_horaenvio'] + '</td> </tr>'; //esto seria lo que contendria la fila
        $("#Mensajes>tbody").prepend(fila);

      }
    } else {

      if (Chats[i]['chat_leido'] == 0) { //cambair el sobre
        var fila = '<tr id="row' + i + '"  ><td>' + (i + 1) + ' </td> <td class="mailbox-star"><a href="#"><i class="fas fa-question-circle text-info"></i></a> </td> <td> <i class="far fa-envelope"> </td> </i> <td class="mailbox-name" id="' + Chats[i]['chat_id_mensaje'] + '"><a href="#"  >' + Chats[i]['Expr_1'] + '</a></td> <td class="mailbox-subject"><b>' + Chats[i]['chat_asunto'] + '</b> </td><td class="mailbox-date">' + Chats[i]['chat_horaenvio'] + '</td> </tr>'; //esto seria lo que contendria la fila
        $("#Mensajes>tbody").prepend(fila);
        informativos++;
        sinleer++;
      } else {
        var fila = '<tr id="row' + i + '"  ><td>' + (i + 1) + ' </td> <td class="mailbox-star"><a href="#"><i class="fas fa-question-circle text-info"></i></a> </td> <td> <i class="fas fa-envelope-open-text"> </td> </i> <td class="mailbox-name" id="' + Chats[i]['chat_id_mensaje'] + '"><a href="#"  >' + Chats[i]['Expr_1'] + '</a></td> <td class="mailbox-subject"><b>' + Chats[i]['chat_asunto'] + '</b> </td><td class="mailbox-date">' + Chats[i]['chat_horaenvio'] + '</td> </tr>'; //esto seria lo que contendria la fila
        $("#Mensajes>tbody").prepend(fila);
      }
    }
  }
  $("#todos").html(Chats.length);
  $("#informativo").html(informativos);
  $("#importante").html(importantes);
  $("#sinleer").html(sinleer);
</script>

<script src="../../Controlador/CargarMensajeSeleccionadoMonitor.js"></script>
<script>
  $(".mailbox-name").click(function() {
    // console.log($(this).attr('id'));
    var Identificador = $(this).attr('id');
    // x= $('#portal'+Identificador).text();
    // Cargartrafico(Identificador);
    // console.log(Identificador);
    CargarMensaje(Identificador);
  });
</script>