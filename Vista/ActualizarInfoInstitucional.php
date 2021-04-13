<?php
require_once "../Modelo/ValidadorDeSession.php";
require_once "../Modelo/BuscarNombreInsti.php";
?>

<script>
    document.querySelector('#Label9').innerText = "Actualización De Datos Institucionales";
    document.querySelector('#Label8').innerText = "Actualización De Datos Institucionales";
</script>

<div class="row">

    <div class="col-md-3">
    </div>

    <div class="col-md-6">

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Actualizacion De Instituciones</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <!-- <form action="../Modelo/ActualizarDatos.php"  method="post"> -->
            <form method="post" id="formUpdateInst">
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Escribe Nuevo Nombre Institucional Si Es Necesario</label>
                        <input type="text" class="form-control" name="Nombre" value="<?php echo $Dato[0]["Datos_Nombre"]; ?>">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputFile">Logo Institucional</label> (Si no eliges una foto se pondra una predeterminada por el sistema)
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="subir_archivo" accept=".jpg, .png">
                                <label class="custom-file-label" for="exampleInputFile">Escoger Archivo</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Subir</span>
                            </div>
                        </div>
                    </div>

                    <div class="form-check">
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


    </div>

</div>
<script>
    $(function() {
        bsCustomFileInput.init();
    });
</script>
<script src="../Funciones/ActualizarInfoInstitucional.js"></script>