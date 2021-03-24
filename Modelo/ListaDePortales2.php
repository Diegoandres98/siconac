<?php
require_once "../Modelo/ValidadorDeSession.php";
require_once "../Modelo/Conexion.php";
$id=$_SESSION['users_id'];

if(!empty($_POST['IdDelMonitor'])) 
{
$Iden=$_POST['IdDelMonitor'];
$result = $conn->query("SELECT * FROM `r_monitors_portals` WHERE `mp_id_admi` = '".$id."' AND `mp_id_monitors` = '".$Iden."' ");
$PortalesDelMonitor = $result->fetch_all(MYSQLI_ASSOC);

$countM = count($PortalesDelMonitor);
}


?>