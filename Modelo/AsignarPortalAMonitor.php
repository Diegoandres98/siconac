<?php
require_once "../Modelo/ValidadorDeSession.php";
require_once "../Modelo/Conexion.php";

$id=$_SESSION['users_id'];

// debug_to_console($_POST['Nombre']);
if(!empty($_POST['IdMonitor']) && !empty($_POST['IdPortal'])) 
{
 $Monitor=$_POST['IdMonitor'];
 $Portal=$_POST['IdPortal'];


 $result = $conn->query("SELECT * FROM `r_monitors_portals` WHERE `mp_id_admi` = '".$id."' AND 
  `mp_id_monitors` = '".$Monitor."' AND `mp_id_portal` = '".$Portal."' ");
 $usersMonitores = $result->fetch_all(MYSQLI_ASSOC);
 $count = count($usersMonitores);

 if ($count == 1)
 {
    echo json_encode(array('success' => 2));
 }
 else
 {
    $result = $conn->query("INSERT INTO `r_monitors_portals` (mp_id_admi, mp_id_monitors, mp_id_portal)
 VALUES ('$id','$Monitor','$Portal')");

 echo json_encode(array('success' => 1));
 }

}
else
{
    echo json_encode(array('success' => 3));
}

?>