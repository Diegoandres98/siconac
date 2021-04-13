  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../plugins/select2/css/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">

  <script>
      document.querySelector('#Label9').innerText = "Reactivar Usuario";
      document.querySelector('#Label8').innerText = "Reactivar Usuario";
  </script>

  <!-- Main content -->
  <section class="content">
      <div class="container-fluid">
          <div class="row">
              <div class="col-md-4"></div>
              <div class="col-md-4">
                  <div class="row">
                      <div class="col-md-12">
                          <div class="form-group">
                              <label>Escribe numero de cedula:</label>
                              <select id="miSelect" class="select2" style="width: 100%;">
                                  <option selected>Elige Un Estudiante De Aqui</option>
                              </select>
                          </div>
                      </div>
                      <div class="col-md-12">
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
                                      &nbsp; &nbsp; &nbsp; &nbsp;
                                      &nbsp; &nbsp; &nbsp; &nbsp;
                                      &nbsp; &nbsp; &nbsp; &nbsp;
                                      &nbsp; &nbsp; &nbsp; &nbsp;
                                      &nbsp; &nbsp; &nbsp; &nbsp;
                                      &nbsp; &nbsp; &nbsp; &nbsp;
                                      &nbsp; &nbsp; &nbsp; &nbsp;
                                      &nbsp; &nbsp; &nbsp; &nbsp;
                                      &nbsp; &nbsp; &nbsp;
                                      <button type="submit" class="btn btn-primary">Registrar</button>

                                  </div>
                              </form>
                          </div>
                      </div>
                  </div>
              </div>


          </div>
  </section>
  <!-- jQuery -->
  <script src="../plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Select2 -->
  <script src="../plugins/select2/js/select2.full.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="../dist/js/demo.js"></script>
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