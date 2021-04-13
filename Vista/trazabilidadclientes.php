  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../plugins/select2/css/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <style>
      .contenidoxx {
          width: 400px;
          max-height: 406px;
          /* background: #eee; */
          margin: auto;
          overflow-y: scroll;
      }

      ::-webkit-scrollbar {
          width: 12px;
      }

      ::-webkit-scrollbar-track {
          -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
          border-radius: 10px;
      }

      ::-webkit-scrollbar-thumb {
          border-radius: 10px;
          -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.5);
      }
  </style>
  <script>
      document.querySelector('#Label9').innerText = "Trazabilidad De Usuarios Por Portales";
      document.querySelector('#Label8').innerText = "Trazabilidad De Usuarios Por Portales";
  </script>

  <!-- Main content -->
  <section class="content">
      <div class="container-fluid">
          <div class="row">
              <div class="col-md-2"></div>
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
                                      <button type="submit" class="btn btn-primary">Revisar</button>

                                  </div>
                              </form>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-md-4">
                  <div class="card contenidoxx">
                      <div class="card-header">
                          <h3 class="card-title">Registro De Este Usuario Por Portales</h3>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body p-0">
                          <table class="table table-sm">
                              <thead>
                                  <tr>
                                      <th style="width: 10px">#</th>
                                      <th>Fecha</th>
                                      <th>Portal</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <tr>
                                      <td>1.</td>
                                      <td>Update software</td>
                                      <td>Sala De Redes</td>
                                  </tr>
                                  <tr>
                                      <td>2.</td>
                                      <td>Clean database</td>
                                      <td>Sala De Redes</td>
                                  </tr>
                                  <tr>
                                      <td>3.</td>
                                      <td>Cron job running</td>
                                      <td>Sala De Redes</td>
                                  </tr>
                                  <tr>
                                      <td>4.</td>
                                      <td>Fix and squish bugs</td>
                                      <td>Sala De Redes</td>
                                  </tr>
                                  <tr>
                                      <td>4.</td>
                                      <td>Fix and squish bugs</td>
                                      <td>Sala De Redes</td>
                                  </tr>
                                  <tr>
                                      <td>4.</td>
                                      <td>Fix and squish bugs</td>
                                      <td>Sala De Redes</td>
                                  </tr>
                                  <tr>
                                      <td>4.</td>
                                      <td>Fix and squish bugs</td>
                                      <td>Sala De Redes</td>
                                  </tr>
                                  <tr>
                                      <td>4.</td>
                                      <td>Fix and squish bugs</td>
                                      <td>Sala De Redes</td>
                                  </tr>
                                  <tr>
                                      <td>4.</td>
                                      <td>Fix and squish bugs</td>
                                      <td>Sala De Redes</td>
                                  </tr>
                                  <tr>
                                      <td>4.</td>
                                      <td>Fix and squish bugs</td>
                                      <td>Sala De Redes</td>
                                  </tr>
                              </tbody>
                          </table>
                      </div>
                      <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
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