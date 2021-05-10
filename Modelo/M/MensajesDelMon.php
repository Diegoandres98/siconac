<?php
    require_once "../../Modelo/ValidadorDeSession.php";
    require_once "../../Modelo/Conexion.php";

    $id=$_SESSION['users_propietario'];
    $idMonitor=$_SESSION['users_id'];

    $result = $conn->query("SELECT * FROM `InfoChat` WHERE `chat_id_receptor` = '".$idMonitor."' ORDER BY `InfoChat`.`chat_horaenvio` ASC");
    $chats = $result->fetch_all(MYSQLI_ASSOC);
    $count = count($chats);

    echo json_encode($chats);

?>   