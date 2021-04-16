<?php
require_once "../Modelo/ValidadorDeSession.php";
require_once "../Modelo/Conexion.php";

 $id=$_SESSION['users_id'];

$resultados = $conn->query("SELECT * FROM `PortalesDelMonitor` WHERE `users_idproperty` = '".$id."' ");
$PortalesDeLosMonitores = $resultados->fetch_all(MYSQLI_ASSOC);

$countPDM = count($PortalesDeLosMonitores);



?>