<?php
require_once "../Modelo/ValidadorDeSession.php";
require_once "../Modelo/Conexion.php";
$ide=$_SESSION['users_id'];
if(!empty($_POST['Id']) && !empty($_POST['nombreP']) && !empty($_POST['numS'])) 
{
    $nombre=$_POST['nombreP'];
    $serie=$_POST['numS'];
    $id=$_POST['Id'];
 $result = $conn->query("UPDATE `clientes` SET  `client_name` = '".$nombre."',`client_identificacion` = '".$serie."' WHERE `client_id_admi_property` = '".$ide."' AND `client_id` = '".$id."'");
 echo json_encode(array('success' => 1));
}
else
{
    echo json_encode(array('success' => 2));
}
?>