<?php
// $_SESSION['logged'] = false;
$msg="";
$email="";

if(!empty($_POST['email']) && !empty($_POST['password'])) 
{
    $email = strip_tags($_POST['email']);
    $password= sha1(strip_tags($_POST['password']));

    //momento de conectarnos a db
    require_once "../Modelo/Conexion.php";

    $result = $conn->query("SELECT * FROM `users` WHERE `users_email` = '".$email."' AND  `users_password` = '".$password."' ");
    $users = $result->fetch_all(MYSQLI_ASSOC);


    //cuento cuantos elementos tiene $tabla,
    $count = count($users);

    if ($count == 1)
    {

      session_start();

      //cargo datos del usuario en variables de sesión
      $_SESSION['users_id'] = $users[0]['users_id'];
      $_SESSION['users_propietario'] = $users[0]['users_idproperty'];
      $_SESSION['users_email'] = $users[0]['users_email'];
      $_SESSION['users_nombre'] = $users[0]['users_nombre'];
      $_SESSION['users_img'] = $users[0]['users_foto'];
      $_SESSION['rol'] = $users[0]['users_rol'];
      $_SESSION['confirmacion'] = $users[0]['users_monitor'];
      $_SESSION['logged'] = true;
      //echo "<pre>";
      //print_r($devices);
      //die();
      // header("Location: .$nuevaURL.php");
      // die();
      if (($_SESSION['rol']==1) && ($_SESSION['confirmacion']==0)) {
        echo json_encode(array('success' => 1));
      }
      if (($_SESSION['rol']==2) && ($_SESSION['confirmacion']==1)) {
        echo json_encode(array('success' => 4));
      }
      // header("Location: ../Vista/panel.php");
      // die();
    }
    else{
//significa que fallo datos erroneos
      echo json_encode(array('success' => 2));

      // header("Location: ../Vista/login_v.php");
      // die();
      // $_SESSION['logged'] = false;
    }
}
else
{
  //datos vacios
  echo json_encode(array('success' => 3));
}
?>