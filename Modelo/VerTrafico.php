<?php
require_once "../Modelo/ValidadorDeSession.php";
require_once "../Modelo/Conexion.php";
$id=$_SESSION['users_id'];
$result = $conn->query("SELECT * FROM `datos_traffico` WHERE `traffic_devices_user_id` = '".$id."' ");
$Trafico = $result->fetch_all(MYSQLI_ASSOC);

$countT = count($Trafico);



?>