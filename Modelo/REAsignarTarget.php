<?php
    require_once "../Modelo/ValidadorDeSession.php";
    require_once "../Modelo/Conexion.php";
    require_once "../Modelo/funciondebugger.php";

    $id=$_SESSION['users_id'];
    $Seleccion=$_POST['Seleccion'];
    $NumTarget=$_POST['NumTarget'];

    $result = $conn->query("SELECT * FROM `clientes` WHERE `client_id_admi_property` = '".$id."' AND 
    `client_id` = '".$Seleccion."' ");
     $PropietarioTarget = $result->fetch_all(MYSQLI_ASSOC);
     $count = count($PropietarioTarget);

     if($count==1)
     {
         //aqui inhabilita la tarjeta anterior
        $idtarjeta=$PropietarioTarget[0]['client_card_id'];

        $result = $conn->query("UPDATE `cards` SET  `cards_assigned` = '0' WHERE `cards_id` = '".$idtarjeta."' AND  `cards_id_admi_property` = '".$id."' ");

//aqui hace el proceso para asignar la nueva tarjeta
        $result = $conn->query("SELECT * FROM `cards` WHERE `cards_id_admi_property` = '".$id."' AND 
        `cards_number` = '".$NumTarget."' ");
         $Targetas = $result->fetch_all(MYSQLI_ASSOC);
         $count = count($Targetas);
    
         if($count==0)
         {
             $resultin = $conn->query("INSERT INTO `cards` (cards_number, cards_assigned, cards_id_admi_property)
             VALUES ('$NumTarget','1','$id')");
    
             $result = $conn->query("SELECT * FROM `cards` WHERE `cards_id_admi_property` = '".$id."' AND 
             `cards_number` = '".$NumTarget."' ");
             $Targetas = $result->fetch_all(MYSQLI_ASSOC);
             $count = count($Targetas);
             if($count==1)
             {
                $result = $conn->query("UPDATE `clientes` SET  `client_card_id` = '".$Targetas[0]['cards_id']."' WHERE `client_id` = '".$Seleccion."' AND  `client_id_admi_property` = '".$id."' ");
                echo json_encode(array('success' => 1));
                //Asignado
             }
             else
             {
                //no se pudo asignar 
                echo json_encode(array('success' => 2));
             }
         }
          else
          {
              //tarjeta existente
             echo json_encode(array('success' => 3));
          }

     }
    else
    {
        //usuario inexistente
        echo json_encode(array('success' => 4));
    }
?>   