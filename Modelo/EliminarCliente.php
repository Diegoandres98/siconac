<?php
require_once "../Modelo/ValidadorDeSession.php";
require_once "../Modelo/Conexion.php";

$id=$_SESSION['users_id'];

if(!empty($_POST['Identificador'])) 
{
    $ElUSuario=$_POST['Identificador'];

    $result = $conn->query("SELECT * FROM `clientes` WHERE `client_id_admi_property` = '".$id."'
    AND `client_id` = '".$ElUSuario."'");

    $ExisteUsuario = $result->fetch_all(MYSQLI_ASSOC);
    $count = count($ExisteUsuario);

    if ($count == 1)
    {
        $result = $conn->query("DELETE FROM `clientes` WHERE `client_id_admi_property` = '".$id."'
        AND `client_id` = '".$ElUSuario."'");

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