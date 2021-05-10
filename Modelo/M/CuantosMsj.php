<?php
require_once "../../Modelo/ValidadorDeSession.php";
require_once "../../Modelo/Conexion.php";

$id=$_SESSION['users_id'];
$result = $conn->query("SELECT * FROM `InfoChat` WHERE `chat_id_receptor` = '".$id."' AND `chat_leido` = '0' ");
$Mensajes = $result->fetch_all(MYSQLI_ASSOC);

$countMsj = count($Mensajes);

?>