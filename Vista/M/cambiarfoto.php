<link rel="stylesheet" href="../css.css">
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Cambiar foto de perfil</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <div class="row">
                <div class="col-md-6">
                    <form id="CambiarFoto" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputFile">Archivo en formato png, jpg</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="add-new-photo" name="subir_archivo" accept=".jpg, .png">
                                        <label class="custom-file-label" for="exampleInputFile">Escoga Archivo</label>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Acepto Terminos Y Condiciones</label>
                            </div> -->
                        </div>
                        <!-- /.card-body -->
                    </form>
                </div>
                <div class="col-md-6">
                    <main>
                        <div class="container">
                            <section id="Images" class="images-cards">
                                    <div class="row">
                                        <div  id="add-photo-container">
                                            <div class="add-new-photo first" id="add-photo">
                                            </div>
                                        </div>
                                    </div>
                            </section>
                        </div>
                    </main>
                </div>
            </div>
            <div class="card-footer">
                <button id="enviarfotonueva" type="submit" class="btn btn-primary">Cambiar</button>
            </div>
        </div>
        <!-- /.card -->
    </div>
    <!-- <div class="col-md-6">

    </div> -->
</div>

<script>
    $(document).on("change", "#add-new-photo", function() {

        console.log(this.files);
        var files = this.files;
        var element;
        var supportedImages = ["image/jpeg", "image/png", "image/gif"];
        var seEncontraronElementoNoValidos = false;

        for (var i = 0; i < files.length; i++) {
            element = files[i];

            if (supportedImages.indexOf(element.type) != -1) {
                createPreview(element);
            } else {
                seEncontraronElementoNoValidos = true;
            }
        }

        if (seEncontraronElementoNoValidos) {
            alert("Se encontraron archivos no validos.");
        } else {
            // alert("Todos los archivos se subieron correctamente.");
        }

    });

    function createPreview(file) {
        
        var imgCodified = URL.createObjectURL(file);
        var img = $('<div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-xs-12"><div class="image-container"> <figure> <img src="' + imgCodified + '" alt="Foto del usuario"> <figcaption> <i class="icon-cross"></i> </figcaption> </figure> </div></div>');
        $("#add-photo-container").html(img);
        // $(img).insertBefore("#add-photo-container");
    }
</script>

<style>
    /* codigo que le cambia el nombre de browse a buscar */
    .custom-file-label::after {
        content: "Buscar" !important;
    }
</style>

<script>
    $(function() {
        bsCustomFileInput.init();
    });
</script>
<script src="../../Funciones/CambiarFoto.js"></script>