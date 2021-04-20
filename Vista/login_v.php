<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link  rel="icon"   href="../img/Siconac.ico" type="image/ico" />
  <title>Siconac | Login </title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <script src="../plugins/jquery/jquery.min.js"></script>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <img src="../img/Siconac.png" width="50%" height="50%"/><br>
      <a href="../" class="h1"><b>Siconac </b>SCA</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Pon tus Datos Para Iniciar session</p>

        <!-- <form action="../Modelo/login.php"  method="post"> -->
        <form method="POST" id="form">
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Correo" name="email" REQUIRED>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Contraseña" name="password" REQUIRED>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Recuerdame
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Iniciar</button>
          </div>
          <!-- /.col -->
        </div>
      </form>


      <p class="mb-1">
        <a href="#" onclick="alertasss()">Se me olvido la Contraseña</a>
      </p>
      <p class="mb-0">
        <a href="#" onclick="alertass()" class="text-center">Quiero Registrarme</a>
      </p>
    </div>
    <!-- /.card-body -->
  </div >
  <!-- /.card -->
</div>
<!-- /.login-box -->


<script src="../Funciones/funciones.js"></script>
<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
</body>
</html>
