<?php
require_once "../Modelo/ValidadorDeSession.php";

if(!empty($_POST['txtnombre']) && !empty($_POST['txtpasswordA']) 
&& !empty($_POST['txtpassR1'])&& !empty($_POST['txtpassR2'])&& !empty($_POST['txtcorreo'])) 
{
  if($_POST['txtpassR1']==$_POST['txtpassR2'])
  {
    $nombreActual=$_POST['txtnombre'];
    $nuevocorreo=$_POST['txtcorreo'];
    $nuevapass=sha1(strip_tags($_POST['txtpassR1']));
    $id = $_SESSION['users_id'];
    $password= sha1(strip_tags($_POST['txtpasswordA']));

    //momento de conectarnos a db
    require_once "../Modelo/Conexion.php";

    $result = $conn->query("SELECT * FROM `users` WHERE `users_id` = '".$id."' AND  `users_password` = '".$password."' ");
    $users = $result->fetch_all(MYSQLI_ASSOC);


    //cuento cuantos elementos tiene $tabla,
    $count = count($users);

    if ($count == 1)
    {

      //Insertar los Nuevos Datos xD
      $result = $conn->query("UPDATE `users` SET  `users_password` = '".$nuevapass."',`users_nombre` = '".$nombreActual."',`users_email` = '".$nuevocorreo."' WHERE `users_id` = '".$id."' AND  `users_password` = '".$password."' ");
      $_SESSION['users_email'] = $nuevocorreo;
      $_SESSION['users_nombre'] = $nombreActual;
      //echo "<pre>";
      //print_r($devices);
      //die();
      // header("Location: .$nuevaURL.php");
      // die();
      echo json_encode(array('success' => 1));
      // header("Location: ../Vista/panel.php");
      // die();

    }
    else{

      //contrasña mala 
      echo json_encode(array('success' => 2));
    }
  }
  else
  {
    //no coinciden contraseñas nuevas
    echo json_encode(array('success' => 3));
  }
}
else
{
//campos que se enviaron estan complemente vacios 
echo json_encode(array('success' => 4));
}
?>
