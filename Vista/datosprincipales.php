<?php
require_once "../Modelo/DatosPrincipales.php"
?>
<script>
  document.querySelector('#Label9').innerText = "Resumen De Datos Principales";
  document.querySelector('#Label8').innerText = "Resumen De Datos Principales";
</script>

<div class="container-fluid">

  <div class="row">
    <div class="col-md-9">
      <div class="row">
        <div class="col-12 col-sm-6 col-md-4">
          <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-traffic-light"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Trafico Hoy</span>
              <span class="info-box-number">
                10
                <small>%</small>
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <div class="col-12 col-sm-6 col-md-4">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-door-open"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Portales</span>
              <span class="info-box-number"><?php echo $countD ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <div class="clearfix hidden-md-up"></div>

        <div class="col-12 col-sm-6 col-md-4">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-success elevation-1"><i class="fab fa-watchman-monitoring"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Monitores</span>
              <span class="info-box-number"><?php echo $countM ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
      </div>

      <div class="row">
        <div class="col-12 col-sm-6 col-md-4">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

            <div class="info-box-content">
              <span class="info-box-text"> Total Usuarios <br> Registrados</span>
              <span class="info-box-number"><?php echo $countH ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>

        <div class="col-12 col-sm-6 col-md-4">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-teal elevation-1"><i class="fas fa-address-card"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Usuarios Con <br> Tarjeta Activa</span>
              <span class="info-box-number"><?php echo $countAC ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>

        <div class="col-12 col-sm-6 col-md-4">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-black elevation-1"><i class="fas fa-user-times"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Usuarios Sin <br> Tarjeta Asignada</span>
              <span class="info-box-number"><?php echo $countIN ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>

      </div>
    </div>
    <div class="col-md-3">
      <div class="d-none d-xl-block d-none d-md-block d-lg-none d-none d-lg-block d-xl-none">
        <div class="info-boxDiego mb-3">

          <div class="info-box-content">
            <p class="info-box-negrita"><?php echo $DatosInfo[0]["Datos_Nombre"]; ?></p>
            <img class="LogoEmpresa" src="<?php echo $DatosInfo[0]["Datos_Foto"]; ?>" alt="logo empresa">
          </div>


          <!-- /.info-box-content -->
        </div>
      </div>
    </div>
  </div>

</div>
<!-- /.row -->

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h5 class="card-title">Reporte Estadistico Del Trafico De Hoy:</h5>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
          </button>
          <div class="btn-group">
          </div>
          <button type="button" class="btn btn-tool" data-card-widget="remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <div class="row">
          <div class="col-md-12">
            <p class="text-center">
              <strong><?php date_default_timezone_set("America/Bogota");
                      $hoy = date("Y-m-d");
                      $date = new DateTime($hoy);
                      // En la siguiente linea defines la manera como quieres que se muestr tu fecha, puedes agregar o quitar los campos que desees,segun tus necesidades. Por ejemplo:
                      // echo $date->format('l jS \of F Y '); 
                      echo $date->format('Y-m-d');
                      ?></strong>
            </p>

            <div class="chart">
              <!-- Sales Chart Canvas -->
              <canvas id="salesChart" height="180" style="height: 180px;"></canvas>
            </div>
            <!-- /.chart-responsive -->
          </div>
          <!-- /.col -->

          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- ./card-body -->
      <!-- /.card-footer -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.col -->
</div>
<!-- /.row -->
<!-- REQUIRED SCRIPTS -->

<style>
  .LogoEmpresa {

    display: block;
    margin-left: auto;
    margin-right: auto;
    height: 120px;
    position: relative;
    border-radius: 20%;
  }

  .info-boxDiego {
    box-shadow: 0 0 1px rgb(0 0 0 / 13%), 0 1px 3px rgb(0 0 0 / 20%);
    border-radius: .25rem;
    background-color: #fff;
    display: -ms-flexbox;
    display: flex;
    overflow: hidden;
    margin-bottom: 1rem;
    height: 200px;
    padding: .5rem;
    position: relative;
    width: 100%;
  }

  .info-box-negrita {
    position: relative;
    font-weight: 600;
    text-align: center;
  }
</style>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../dist/js/pages/dashboard2.js"></script>