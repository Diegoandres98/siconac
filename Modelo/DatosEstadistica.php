<?php
require_once "../Modelo/ValidadorDeSession.php";
require_once "../Modelo/Conexion.php";

$id=$_SESSION['users_id'];

date_default_timezone_set("America/Bogota");


$fecha1=date('Y-m-d');

$hora="00:00:00";
$PorHoras = array();

for ($i=1; $i <25 ; $i++) { 
    
    $fecha1seteada= $fecha1." ".$hora;
    $hora2="$i:00:00";
     $fecha2seteada= $fecha1." ".$hora2;
 
    $result = $conn->query("SELECT * FROM `traffic` WHERE `traffic_devices_user_id` = '".$id."' AND `traffic_date` BETWEEN '".$fecha1seteada."' AND  '".$fecha2seteada."' ");
    $traficohoy = $result->fetch_all(MYSQLI_ASSOC);
    $countTH = count($traficohoy);


    array_push($PorHoras, $countTH);

     $hora=$hora2;
}


echo json_encode ($PorHoras);
// echo $fechadeayerseteada. "<-- fecha de ayer ---- fecha de hoy -->".$fechadehoy ;


?>