<?php
require_once "../../Modelo/ValidadorDeSession.php";
require_once "../../Modelo/Conexion.php";

$id=$_SESSION['users_id'];
$result = $conn->query("SELECT * FROM `PortalesDelMonitor` WHERE `users_id` = '".$id."' ");
$Portales = $result->fetch_all(MYSQLI_ASSOC);

$countP = count($Portales);

?>