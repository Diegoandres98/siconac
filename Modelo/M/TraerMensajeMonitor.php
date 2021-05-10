<?php
    require_once "../../Modelo/ValidadorDeSession.php";
    require_once "../../Modelo/Conexion.php";

    $id=$_SESSION['users_propietario'];
    $idMonitor=$_SESSION['users_id'];

if (!empty($_POST['IdDelMensaje'])) {
    $IdMensaje=$_POST['IdDelMensaje'];
    $result = $conn->query("SELECT * FROM `InfoChat` WHERE `chat_id_receptor` = '".$idMonitor."' AND `chat_id_mensaje` = '".$IdMensaje."'");
    $chat = $result->fetch_all(MYSQLI_ASSOC);
    $count = count($chat);

    $result2 = $conn->query("UPDATE `InfoChat` SET  `chat_leido` = '1' WHERE `chat_id_receptor` = '".$idMonitor."' AND `chat_id_mensaje` = '".$IdMensaje."'");
    echo json_encode($chat);
}



?>   