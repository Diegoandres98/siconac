<?php
require_once "../Modelo/ValidadorDeSession.php";
require_once "../Modelo/Conexion.php";

$id=$_SESSION['users_id'];

if(!empty($_POST['IdMonitor'])) 
{
    $ElMonitor=$_POST['IdMonitor'];

    $result = $conn->query("SELECT * FROM `users` WHERE `users_idproperty` = '".$id."'
    AND `users_id` = '".$ElMonitor."'");

    $EstaElPortal = $result->fetch_all(MYSQLI_ASSOC);
    $count = count($EstaElPortal);

    if ($count == 1)
    {
        $result = $conn->query("DELETE FROM `users` WHERE `users_idproperty` = '".$id."'
        AND `users_id` = '".$ElMonitor."'");

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