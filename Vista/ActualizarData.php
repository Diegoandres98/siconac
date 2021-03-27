<?php
require_once("../Modelo/ValidadorDeSession.php");
?>

<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Actualizacion De Datos</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <!-- <form action="../Modelo/ActualizarDatos.php"  method="post"> -->
              <form method="post" id="formulariocambio">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Escribe Nuevo Nombre Si Es Necesario</label>
                    <input type="text" class="form-control" name="txtnombre" value="<?php echo $_SESSION['users_nombre'];?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Contraseña Actual</label>
                    <input type="email" class="form-control" name="txtcorreo" value="<?php echo $_SESSION['users_email'];?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Contraseña Actual</label>
                    <input type="password" class="form-control" name="txtpasswordA" placeholder="Password Actual" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword2">Contraseña Nueva</label>
                    <input type="password" class="form-control" name="txtpassR1" placeholder="Password Nuevo" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword3">Repite Contraseña Nueva</label>
                    <input type="password" class="form-control" name="txtpassR2" placeholder="Password Repetir" required>
                  </div>

                  <div class="form-check" >
                    <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
                    <label class="form-check-label" for="exampleCheck1">Acepto Terminos Y Condiciones</label>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
              </form>
            </div>

<script src="../Funciones/alertadecambiocontraseña.js" ></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>