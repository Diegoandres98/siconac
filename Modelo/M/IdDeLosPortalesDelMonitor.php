<?php
require_once "../../Modelo/ValidadorDeSession.php";
require_once "../../Modelo/Conexion.php";

$id=$_SESSION['users_id'];
$result = $conn->query("SELECT `devices_id` FROM `PortalesDelMonitor` WHERE `users_id` = '".$id."' ");
$IDPortales = $result->fetch_all(MYSQLI_ASSOC);

?>