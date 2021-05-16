  <!-- Google Font: Source Sans Pro -->
  <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"> -->
  <!-- Font Awesome -->
  <!-- <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css"> -->
  <!-- Select2 -->
  <link rel="stylesheet" href="../plugins/select2/css/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">

  <!-- <link rel="stylesheet" href="../Vista/vistadecarga.css"> -->

  <script>
      document.querySelector('#Label9').innerText = "Asignar Tarjeta";
      document.querySelector('#Label8').innerText = "Asignar Tarjeta";
  </script>

  <!-- Main content -->
  <section class="content">
      <div class="container-fluid">
          <div class="row">
              <div class="col-md-2"> </div>
              <div class="col-md-4">
                  <div class="form-group">
                      <div class="form-group">
                          <label for="exampleInputPassword1">Escribe el Numero Tarjeta</label>
                          <input type="text" class="form-control" id="myInput" oninput="myFunction()" maxlength="25" requerid>
                      </div>
                  </div>
              </div>

              <div class="col-md-4">
                  <div class="form-group">
                      <label>Escribe numero de cedula:</label>
                      <select id="miSelect" class="select2" style="width: 100%;">
                          <option selected>Elige Un Estudiante De Aqui</option>
                      </select>
                  </div>
              </div>
          </div>

          <div class="row">
              <div class="col-md-2"> </div>
              <!-- left column -->
              <div class="col-md-4">
                  <div class="contenedorImg">
                      <div class="card">
                          <img src="../img/Siconac.png" alt="">
                          <div class="datos">
                              <label id="datosLabel" for="">Nombre:</label>
                              <label id="TxtNom" for="">Ej: Pepito Alejandro Esparragoza Quintero</label>
                              <label id="datosLabel" for="">No. Identificación</label>
                              <label id="TxtCc" for="">Ej: 1234567890</label>
                          </div>
                          <label class="ViewDato" id="viewDato" for="">0000 0000 0000 0000</label>
                      </div>
                  </div>
              </div>

              <div class="col-md-4">
                  <!-- general form elements -->
                  <br>
                  <div class="card card-primary">
                      <div class="card-header">
                          <h3 class="card-title">Estudiante Escogido</h3>
                      </div>
                      <!-- /.card-header -->
                      <!-- form start -->
                      <form id="formularioenviodata">
                          <div class="card-body">
                              <div class="form-group">
                                  <label for="exampleInputEmail1">Nombre</label>
                                  <input type="text" id="InpNom" class="form-control" id="exampleInputEmail1" disabled>
                              </div>
                              <div class="form-group">
                                  <label for="exampleInputPassword1">Cedula</label>
                                  <input type="text" id="InpCc" class="form-control" id="exampleInputPassword1" disabled>
                              </div>
                          </div>
                          <div class="card-footer">
                              <button type="submit" class="btn btn-primary float-right">Registrar</button>
                          </div>
                      </form>
                  </div>

              </div>
          </div>
  </section>

  <!-- jQuery -->
  <!-- <script src="../plugins/jquery/jquery.min.js"></script> -->
  <!-- Bootstrap 4 -->
  <!-- <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script> -->
  <!-- Select2 -->
  <script src="../plugins/select2/js/select2.full.min.js"></script>
  <!-- AdminLTE App -->
  <!-- <script src="../dist/js/adminlte.min.js"></script> -->
  <!-- AdminLTE for demo purposes -->
  <!-- <script src="../dist/js/demo.js"></script> -->
  <script>
      $(function() {
          $('.select2').select2()
      });
  </script>
  <script>
      function myFunction() {
          var x = document.getElementById("myInput").value;
          document.getElementById("viewDato").innerHTML = x;
      }
  </script>
  <script src="../Funciones/Asignaciondetarjetas.js"></script>