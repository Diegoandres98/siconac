<?php

session_start();
$_SESSION['logged'] = false;

$msg="";
$email="";

if(isset($_POST['email']) && isset($_POST['password'])) {
  if ($_POST['email']==""){
    $msg.="Debe ingresar un email <br>";
  }else if ($_POST['password']=="") {
    $msg.="Debe ingresar la clave <br>";
  }else {
    $email = strip_tags($_POST['email']);
    $password= sha1(strip_tags($_POST['password']));

    //momento de conectarnos a db
    require_once "../Modelo/Conexion.php";

    $result = $conn->query("SELECT * FROM `users` WHERE `users_email` = '".$email."' AND  `users_password` = '".$password."' ");
    $users = $result->fetch_all(MYSQLI_ASSOC);


    //cuento cuantos elementos tiene $tabla,
    $count = count($users);

    if ($count == 1){

      //cargo datos del usuario en variables de sesión
      $_SESSION['users_id'] = $users[0]['users_id'];
      $_SESSION['users_email'] = $users[0]['users_email'];
      $_SESSION['users_nombre'] = $users[0]['users_nombre'];

      $msg .= "Exito!!!";
      $_SESSION['logged'] = true;

      //RECUPERAMOS LOS DISPOSITIVOS DE ESTE USUARIO
      $result = $conn->query("SELECT * FROM `devices` WHERE `devices_user_id` = '".$users[0]['users_id']."'");
      $devices = $result->fetch_all(MYSQLI_ASSOC);

      //guardamos los dispositivos en una variable de sesión
      $_SESSION['devices'] = $devices;

      //echo "<pre>";
      //print_r($devices);
      //die();
      // header("Location: .$nuevaURL.php");
      // die();
      echo $json = true;
      // header("Location: ../Vista/panel.php");
      // die();

    }else{

      echo $json = false;

      // header("Location: ../Vista/login_v.php");
      // die();
      $msg .= "Acceso denegado!!!";
      $_SESSION['logged'] = false;
    }
  }
}
?>