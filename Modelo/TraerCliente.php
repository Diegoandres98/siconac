





<!-- en desuso por que encontre una mejor forma xxdd -->

<?php
require_once "../Modelo/ValidadorDeSession.php";
require_once "../Modelo/Conexion.php";
$id = $_SESSION['users_id'];
if (!empty($_POST['Identificador'])) {

    $identificador = $_POST['Identificador'];
    $resultados = $conn->query("SELECT * FROM `clientes` WHERE `client_id_admi_property` = '". $id ."' AND `client_id` = '".$identificador."'");
    $cliente = $resultados->fetch_all(MYSQLI_ASSOC);
    //  echo json_encode(array($cliente));

    //guardado el usuario con exito
    $array_1 = array('success' => 1);
    // $array_2 = json_encode(array($cliente));
    $array_3 = array();
    array_push($array_3, $array_1);
    array_push($array_3, $cliente);

    echo json_encode($array_3);
} else {
    //guardado el usuario con exito
    $array_1 = array('success' => 2);
    $array_2 = array();
    $array_3 = array();
    array_push($array_3, $array_1);
    array_push($array_3, $array_2);

    echo json_encode($array_3);
}
