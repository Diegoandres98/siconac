<?php
require_once "../../Modelo/ValidadorDeSession.php";
require_once "../../Modelo/Conexion.php";
// $directorio = '../archivos/'.$_SESSION['users_id'].'/';
// $subir_archivo = $directorio.basename($_FILES['subir_archivo']['name']);

if (!empty($_FILES['subir_archivo'])) {


    $directorio = '../../archivos/' . $_SESSION['users_propietario'] . '/' . $_SESSION['users_id']. '/';
    $subir_archivo = $directorio . basename($_FILES['subir_archivo']['name']);

    if (!file_exists($directorio)) {
        mkdir($directorio, 0777, true);
    }

    if (move_uploaded_file($_FILES['subir_archivo']['tmp_name'], $subir_archivo)) {
        $result = $conn->query("UPDATE `users` SET  `users_foto` = '" . $subir_archivo . "' WHERE `users_id` = '" . $_SESSION['users_id'] . "' ");
        $_SESSION['users_img']=$subir_archivo;
        echo json_encode(array('success' => 1));
    }

} else {

    echo json_encode(array('success' => 2));
}
