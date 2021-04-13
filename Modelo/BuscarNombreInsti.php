<?php
require_once "../Modelo/ValidadorDeSession.php";
require_once "../Modelo/Conexion.php";

    $id = $_SESSION['users_id'];

    $result = $conn->query("SELECT * FROM `Datos_Institucionales` WHERE `Datos_id_admi_pro`='".$id."' ");
    $Dato = $result->fetch_all(MYSQLI_ASSOC);
?>
