<?php
require_once "../Modelo/ValidadorDeSession.php";
require_once "../Modelo/Conexion.php";

 $id=$_SESSION['users_id'];

$resultados = $conn->query("SELECT * FROM `r_monitors_portals` WHERE `mp_id_admi` = '".$id."' ");
$MonitoresPortales = $resultados->fetch_all(MYSQLI_ASSOC);

$countMP = count($MonitoresPortales);



?>