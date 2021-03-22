<?php
require_once "../Modelo/ValidadorDeSession.php";
require_once "../Modelo/Conexion.php";

$id=$_SESSION['users_id'];

// debug_to_console($_POST['Nombre']);
if(!empty($_POST['Nombre']) && !empty($_POST['Serie'])) 
{
 $Nombre=$_POST['Nombre'];
 $Serie=$_POST['Serie'];

 $result = $conn->query("SELECT * FROM `devices` WHERE `devices_user_id` = '".$id."' AND  `devices_alias` = '".$Nombre."'
 AND `devices_serie` = '".$Serie."' ");
 $dispositivos = $result->fetch_all(MYSQLI_ASSOC);
 $count = count($dispositivos);

 if ($count == 0)
 {
    $result = $conn->query("INSERT INTO `devices` (devices_alias, devices_serie, devices_user_id)
    VALUES ('$Nombre','$Serie','$id')");
   
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