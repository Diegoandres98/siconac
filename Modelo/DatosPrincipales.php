<?php
require_once "../Modelo/ValidadorDeSession.php";
require_once "../Modelo/Conexion.php";
$id=$_SESSION['users_id'];
$result = $conn->query("SELECT * FROM `users` WHERE `users_idproperty` = '".$id."' ");
$users = $result->fetch_all(MYSQLI_ASSOC);
$countM = count($users);

$result = $conn->query("SELECT * FROM `devices` WHERE `devices_user_id` = '".$id."' ");
$users = $result->fetch_all(MYSQLI_ASSOC);
$countD = count($users);


$result = $conn->query("SELECT * FROM `clientes` WHERE `client_id_admi_property` = '".$id."' ");
$users = $result->fetch_all(MYSQLI_ASSOC);
$countH = count($users);

$result = $conn->query("SELECT * FROM `clientes` WHERE `client_id_admi_property` = '".$id."' AND `client_card_id` != '0' ");
$users = $result->fetch_all(MYSQLI_ASSOC);
$countAC = count($users);

$result = $conn->query("SELECT * FROM `clientes` WHERE `client_id_admi_property` = '".$id."' AND `client_card_id` = '0' ");
$users = $result->fetch_all(MYSQLI_ASSOC);
$countIN = count($users);

$result = $conn->query("SELECT * FROM `Datos_Institucionales` WHERE `Datos_id_admi_pro` = '".$id."' ");
$DatosInfo = $result->fetch_all(MYSQLI_ASSOC);

date_default_timezone_set("America/Bogota");
// $fechadeayer=date('Y-m-d', strtotime('-1 day'));
$fechadeayer=date('Y-m-d');

$hora="00:00:01";

$fechadeayerseteada= $fechadeayer." ".$hora;
$fechadehoy=date('Y-m-d H:i:s');
  // echo $fechadeayerseteada. "<-- fecha de ayer ---- fecha de hoy -->".$fechadehoy ;

$result = $conn->query("SELECT * FROM `traffic` WHERE `traffic_devices_user_id` = '".$id."' AND `traffic_date` BETWEEN '".$fechadeayerseteada."' AND  '".$fechadehoy."' ");
$traficohoy = $result->fetch_all(MYSQLI_ASSOC);
$countTH = count($traficohoy);

?>