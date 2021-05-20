<?php
require_once "../../Modelo/ValidadorDeSession.php";
require_once "../../Modelo/Conexion.php";

if (!empty($_POST['IDDELPORTAL'])) {
    # code...
    
    $IDPORTAL=$_POST['IDDELPORTAL'];

    $id=$_SESSION['users_propietario'];
    // $result = $conn->query("SELECT * FROM `datos_traffico` WHERE `traffic_devices_user_id` = '".$id."' ");
    $result = $conn->query("SELECT * FROM `datos_traffico` WHERE `traffic_devices_user_id` = '".$id."' AND `devices_id` = '".$IDPORTAL."' ORDER BY `traffic_date` ASC");
    $TraficoPortal = $result->fetch_all(MYSQLI_ASSOC);
    
      echo json_encode(array($TraficoPortal));
    //   $countTP = count($TraficoPortal);
}


?>