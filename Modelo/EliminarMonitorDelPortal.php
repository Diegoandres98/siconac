<?php
require_once "../Modelo/ValidadorDeSession.php";
require_once "../Modelo/Conexion.php";

$id=$_SESSION['users_id'];

// debug_to_console($_POST['Nombre']);
if(!empty($_POST['IdMonitorAsignado'])) 
{
$IdMonitorAsignado=$_POST['IdMonitorAsignado'];


 $result = $conn->query("SELECT * FROM `r_monitors_portals` WHERE `mp_id_admi` = '".$id."'
  AND `mp_id_mp` = '".$IdMonitorAsignado."' ");
 $usersMonitores = $result->fetch_all(MYSQLI_ASSOC);
 $count = count($usersMonitores);

 if ($count == 1)
 {
    $result = $conn->query("DELETE FROM `r_monitors_portals` WHERE `mp_id_admi` = '".$id."'
    AND `mp_id_mp` = '".$IdMonitorAsignado."' ");

 echo json_encode(array('success' => 1));
 }
 else
 {
    echo json_encode(array('success' => 2));
 }

}
else
{
    echo json_encode(array('success' => 3));
}

?>