<?php
    require_once "../../Modelo/ValidadorDeSession.php";
    require_once "../../Modelo/Conexion.php";

    $id=$_SESSION['users_propietario'];

    $result = $conn->query("SELECT * FROM `clientes` WHERE `client_id_admi_property` = '".$id."' AND 
    `client_card_id` != '0' AND `client_status`='1'");
    $studenAsignados = $result->fetch_all(MYSQLI_ASSOC);
    $count = count($studenAsignados);
    echo json_encode($studenAsignados);

?>   