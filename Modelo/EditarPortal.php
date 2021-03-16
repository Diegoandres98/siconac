<?php
require_once "../Modelo/ValidadorDeSession.php";
require_once "../Modelo/Conexion.php";

if(!empty($_POST['Id']) && !empty($_POST['nombreP']) && !empty($_POST['numS'])) 
{
    $nombre=$_POST['nombreP'];
    $serie=$_POST['numS'];
    $id=$_POST['Id'];
 $result = $conn->query("UPDATE `devices` SET  `devices_alias` = '".$nombre."',`devices_serie` = '".$serie."' WHERE `devices_id` = '".$id."' ");
 echo json_encode(array('success' => 1));
}
else
{
    echo json_encode(array('success' => 2));
}
?>