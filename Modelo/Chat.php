<?php
require_once "../Modelo/ValidadorDeSession.php";
require_once "../Modelo/Conexion.php";

$id=$_SESSION['users_id'];

// debug_to_console($_POST['Nombre']);
if(!empty($_POST['Destinatarios'])) 
{
    $arrayDestino=json_decode($_POST['Destinatarios']);
    // $data = json_decode($_POST['array']);

    if(!empty($_POST['AsuntoMensaje'])) 
    {
        if(!empty($_POST['Texto'])) 
        {
            $Tag=$_POST['Tag'];
            $AsuntoMensaje=$_POST['AsuntoMensaje'];
            $texto=$_POST['Texto'];
            foreach($arrayDestino as $fila) {

               $result = $conn->query("INSERT INTO `chat` (chat_id_remitente, chat_id_receptor, chat_asunto,
               chat_cuerpomensaje,chat_tag)
               VALUES ('$id','$fila','$AsuntoMensaje','$texto','$Tag')");
                
            }
            echo json_encode(array('success' => 1));       
        }

        else
        {
            //no se envio nada dentro del mensaje
            echo json_encode(array('success' => 2));   
        }
    }
    else
    {
        //no se envio el asunto
        echo json_encode(array('success' => 3));   
    }

}
else
{
    //Parece que NO seleccionaste uno o mas monitores
    echo json_encode(array('success' => 4));
}

?>