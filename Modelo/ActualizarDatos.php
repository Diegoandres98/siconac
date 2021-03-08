<?php
require_once("../Modelo/ValidadorDeSession.php");

if(isset($_POST['txtnombre']) && isset($_POST['txtpasswordA']) 
&& isset($_POST['txtpassR1'])&& isset($_POST['txtpassR2'])) 
{

    $nuevapass=sha1(strip_tags($_POST['txtpassR1']));
    $id = $_SESSION['users_id'];
    $password= sha1(strip_tags($_POST['txtpasswordA']));

    //momento de conectarnos a db
    require_once "../Modelo/Conexion.php";

    $result = $conn->query("SELECT * FROM `users` WHERE `users_id` = '".$id."' AND  `users_password` = '".$password."' ");
    $users = $result->fetch_all(MYSQLI_ASSOC);


    //cuento cuantos elementos tiene $tabla,
    $count = count($users);

    if ($count == 1){

      //Insertar los Nuevos Datos xD
      $result = $conn->query("UPDATE `users` SET  `users_password` = '".$nuevapass."' WHERE `users_id` = '".$id."' AND  `users_password` = '".$password."' ");

      //echo "<pre>";
      //print_r($devices);
      //die();
      // header("Location: .$nuevaURL.php");
      // die();
      header("Location: ../Vista/panel.php");
      die();

    }else{
      // $msg .= "Acceso denegado!!!";
      $_SESSION['logged'] = false;
    }
}
?>
