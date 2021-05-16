
  <link rel="stylesheet" href="../../plugins/select2/css/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Escribe numero de cedula:</label>
                    <select id="miSelect" class="select2" style="width: 100%;">
                        <option selected>Elige Un Estudiante De Aqui</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <!-- general form elements -->
                
                <div class="card card-primary">
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="formularioenviodata">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nombre</label>
                                <input type="text" id="InpNom" name="InpNom" class="form-control" id="exampleInputEmail1" disabled>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Cedula</label>
                                <input type="text" id="InpCc" name="InpCc" class="form-control" id="exampleInputPassword1" disabled>
                            </div>
                            <div class="form-group">
                                <input type="hidden" id="Inpocultoid" name="Inpocultoid" class="form-control" id="exampleInputPassword1" disabled>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" disabled id="botonenviar" class="btn btn-info float-right">Dejar Ingresar</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
</section>

<script src="../../plugins/select2/js/select2.full.min.js"></script>
<script src="../../Funciones/llenarselect.js"></script>
<script>
      $(function() {
          $('.select2').select2()
      });
  </script>