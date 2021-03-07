<?php
session_start();
session_destroy();


header('Location: ../Vista/login_v.php');//Aqui lo redireccionas al lugar que quieras.
die() ;
 ?>
