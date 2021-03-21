<?php
require_once "../Modelo/ValidadorDeSession.php";
require_once "../Modelo/Conexion.php";
$id=$_SESSION['users_id'];
$result = $conn->query("SELECT * FROM `devices` WHERE `devices_user_id` = '".$id."' ");
$Portales = $result->fetch_all(MYSQLI_ASSOC);

$countM = count($Portales);



?>