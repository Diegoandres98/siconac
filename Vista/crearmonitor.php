<script>
    document.querySelector('#Label9').innerText = "Crear Monitor";
    document.querySelector('#Label8').innerText = "Crear Monitor";
</script>

<div class="row">
    <!-- left column -->
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Registro De Monitor</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <!-- <form method="post" action="../Modelo/CrearMonitor.php" enctype="multipart/form-data">  -->
            <!-- <form action="../Modelo/uploads.php" method="post" enctype="multipart/form-data"> -->
            <form method="post" id="FormRegistroMonitor" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nombre</label>
                        <input type="text" class="form-control" name="Nombre" placeholder="Escriba Nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Correo Electronico</label>
                        <input type="email" class="form-control" name="Correo" placeholder="Escriba Correo" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Contraseña</label>
                        <input type="password" class="form-control" name="Contraseña" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Foto De Perfil</label> (Si no eliges una foto se pondra una predeterminada por el sistema)
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="subir_archivo" accept=".jpg, .png">
                                <label class="custom-file-label" for="exampleInputFile">Escoger Archivo</label>
                            </div>
                            <!-- <div class="input-group-append">
                                <span class="input-group-text">Subir</span>
                            </div> -->
                        </div>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
                        <label class="form-check-label" for="exampleCheck1">Acepto Terminos y Condiciones</label>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" name="submit">Enviar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    /* codigo que le cambia el nombre de browse a buscar */
.custom-file-label::after {
  content: "Buscar" !important ;
}
</style>

<script>
    $(function() {
        bsCustomFileInput.init();
    });
</script>
<script src="../Funciones/CrearMonitorAjax.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>