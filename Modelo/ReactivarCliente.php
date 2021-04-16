<?php
require_once "../Modelo/ValidadorDeSession.php";
require_once "../Modelo/Conexion.php";

    $id = $_SESSION['users_id'];

    if (!empty($_POST['Seleccion']))
    {
        $cliente=$_POST['Seleccion'];
      //Insertar los Nuevos Datos xD
      $result = $conn->query("UPDATE `clientes` SET  `client_status` = '1' WHERE `client_id_admi_property` = '".$id."' AND  `client_id` = '".$cliente."' ");

      //echo "<pre>";
      //print_r($devices);
      //die();
      // header("Location: .$nuevaURL.php");
      // die();
      echo json_encode(array('success' => 1));
      // header("Location: ../Vista/panel.php");
      // die();

    }
    else
    {
        echo json_encode(array('success' => 2));
    }
  


?>