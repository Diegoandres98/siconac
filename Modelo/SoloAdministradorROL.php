<?php
    header('Content-Type: text/html; charset=UTF-8');
    //Iniciar una nueva sesión o reanudar la existente.
    //Si existe la sesión "cliente"..., la guardamos en una variable.
    if (($_SESSION['rol']==1) &&($_SESSION['confirmacion']==0)){
        // $cliente = $_SESSION['cliente'];
    }else{
      header('Location: ../Vista/M/panel.php');//Aqui lo redireccionas al lugar que quieras.
     die() ;

    }
?>
