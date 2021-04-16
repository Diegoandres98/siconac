<?php
require_once "../Modelo/ValidadorDeSession.php";
require_once "../Modelo/Conexion.php";
$id=$_SESSION['users_id'];
$result = $conn->query("SELECT * FROM `clientes` WHERE `client_id_admi_property` = '".$id."' AND `client_status` = '2'");
$ClientesSuspendidos = $result->fetch_all(MYSQLI_ASSOC);
$countCLIAC = count($ClientesSuspendidos);
echo json_encode($ClientesSuspendidos);

?>