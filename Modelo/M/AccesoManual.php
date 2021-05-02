<?php
require_once "../../Modelo/ValidadorDeSession.php";
require_once "../../Modelo/Conexion.php";

    if(!empty($_POST['InpCc']) && !empty($_POST['InpNom'])&& !empty($_POST['Inpocultoid'])) 
    {   
        $Nombre=$_POST['InpNom'];
        $Identificacion=$_POST['InpCc'];
        $portal=$_POST['Inpocultoid'];
        $Propietario=$_SESSION['users_propietario'];
        // $idmonitor=$_SESSION['users_id'];

        $result = $conn->query("SELECT * FROM `clientes` WHERE `client_id_admi_property`='".$Propietario."' AND
        `client_identificacion`='".$Identificacion."' AND `client_status`='1' ");
        $Sies = $result->fetch_all(MYSQLI_ASSOC);
        $count = count($Sies);

        if ($count == 1)
        {
            $client=$Sies[0]['client_id'];

            $result = $conn->query("INSERT INTO `traffic` (traffic_client_id, traffic_devices_id, traffic_devices_user_id)
             VALUES ('$client','$portal','$Propietario')");
            echo json_encode(array('success' => 1));
        }
        else
        { 
            echo json_encode(array('success' => 3));
        }

    } 
else 
{

  echo json_encode(array('success' => 2));

}
