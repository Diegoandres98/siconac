<?php
require_once "../Modelo/ValidadorDeSession.php";
require_once "../Modelo/Conexion.php";

$id=$_SESSION['users_id'];
$result = $conn->query("SELECT * FROM `clientes` WHERE `client_id_admi_property` = '".$id."' ");
$ListadoDeClientes = $result->fetch_all(MYSQLI_ASSOC);

 $countC = count($ListadoDeClientes);

?>