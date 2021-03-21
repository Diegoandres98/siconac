<?php
require_once "../Modelo/ValidadorDeSession.php";
require_once "../Modelo/Conexion.php";

$id=$_SESSION['users_id'];

if(!empty($_POST['IdPortal'])) 
{
    $ElPortal=$_POST['IdPortal'];

    $result = $conn->query("SELECT * FROM `devices` WHERE `devices_user_id` = '".$id."'
    AND `devices_id` = '".$ElPortal."'");

    $EstaElPortal = $result->fetch_all(MYSQLI_ASSOC);
    $count = count($EstaElPortal);

    if ($count == 1)
    {
        $result = $conn->query("DELETE FROM `devices` WHERE `devices_user_id` = '".$id."'
        AND `devices_id` = '".$ElPortal."'");

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