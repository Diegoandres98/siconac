<?php
require_once "../Modelo/ValidadorDeSession.php";
require_once "../Modelo/Conexion.php";

$id=$_SESSION['users_id'];

// debug_to_console($_POST['Nombre']);
if(!empty($_POST['Nombre']) && !empty($_POST['Serie'])) 
{
 $Nombre=$_POST['Nombre'];
 $Serie=$_POST['Serie'];

$result = $conn->query("INSERT INTO `devices` (devices_alias, devices_serie, devices_user_id)
 VALUES ('$Nombre','$Serie','$id')");

 echo json_encode(array('success' => 1));
}
else
{
 echo json_encode(array('success' => 2));
}

?>