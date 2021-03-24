<?php
require_once "../Modelo/Conexion.php";
require_once "../Modelo/ValidadorDeSession.php";


$id = $_SESSION['users_id'];
// $desprendible = $_FILES["fileContacts"];

if ($_FILES['fileContacts']['name'] != null) 
// if(count($_FILES)>0)
{
    $contarRechazados = 0;
    $fileContacts = $_FILES['fileContacts']; 
    $fileContacts = file_get_contents($fileContacts['tmp_name']); 
    
    $fileContacts = explode("\n", $fileContacts);
    $fileContacts = array_filter($fileContacts); 
    
    // preparar contactos (convertirlos en array)
    foreach ($fileContacts as $contact) 
    {
        $contactList[] = explode(";", $contact);
    }
    
    // insertar contactos
    foreach ($contactList as $contactData) 
    {
     $result = $conn->query("SELECT * FROM `clientes` WHERE `client_identificacion` = '".$contactData[0]."' AND  `client_id_admi_property` = '".$id."' ");
     $users = $result->fetch_all(MYSQLI_ASSOC);
     $count = count($users);

     if ($count == 0)
     {
        $result = $conn->query("INSERT INTO `clientes` (client_identificacion, client_name, client_card_id ,client_id_admi_property)
        VALUES ('$contactData[0]','$contactData[1]','0','$id')");
     }
     else
     {
        //listado de personas rechazadas
        $rechazados []= array("NID" => $contactData[0], "Nombre"=>$contactData[1]);
        $contarRechazados = count($rechazados);
     }
    
    }


    if($contarRechazados == 0)
    {
        //usuarios guardado con exito
        //quiere decir que todo fue correcto y que no hay nada repetido
        $array_1 = array('success' => 1);
        $array_2 = array();
        $array_3 = array();
        array_push($array_3, $array_1);
        array_push($array_3, $array_2);

        echo json_encode($array_3);
        
    }else
    {
        //quiere decir que hay problemas por que estan repetidos
        $array_1 = array('success' => 2);
        //debo devolver el json de los rechazados
        $array_3 = array();

        array_push($array_3, $array_1);
        array_push($array_3, $rechazados);

        echo json_encode($array_3);
    }
      
}

if(!empty($_POST['NID']) && !empty($_POST['Nombre']))
{
    $identity=$_POST['NID'];
    $nombresito=$_POST['Nombre'];

    $result = $conn->query("SELECT * FROM `clientes` WHERE `client_identificacion` = '".$identity."' AND  `client_id_admi_property` = '".$id."' ");
     $users = $result->fetch_all(MYSQLI_ASSOC);
     $count = count($users);

     if ($count == 0)
     {
        $result = $conn->query("INSERT INTO `clientes` (client_identificacion, client_name, client_card_id ,client_id_admi_property)
        VALUES ('$identity','$nombresito','0','$id')");

        //guardado el usuario con exito
        $array_1 = array('success' => 3);
        $array_2 = array();
        $array_3 = array();
        array_push($array_3, $array_1);
        array_push($array_3, $array_2);

        echo json_encode($array_3);
     }
     else
     {
        // este usuario ya existia en la bd
        $array_1 = array('success' => 4);
        $array_2 = array();
        $array_3 = array();
        array_push($array_3, $array_1);
        array_push($array_3, $array_2);

        echo json_encode($array_3);
     }
}

if(empty($_POST['NID']) && empty($_POST['Nombre']) && ($_FILES['fileContacts']['name'] == null) )
{
    //parace que no enviaste ningun dato, no se pudo registrar
    $array_1 = array('success' => 5);
    $array_2 = array();
    $array_3 = array();
    array_push($array_3, $array_1);
    array_push($array_3, $array_2);

    echo json_encode($array_3);
}

?>