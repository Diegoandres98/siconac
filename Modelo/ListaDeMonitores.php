<?php
require_once "../Modelo/ValidadorDeSession.php";
require_once "../Modelo/Conexion.php";
$id=$_SESSION['users_id'];
$result = $conn->query("SELECT * FROM `users` WHERE `users_idproperty` = '".$id."' ");
$Monitores = $result->fetch_all(MYSQLI_ASSOC);

$countM = count($Monitores);



?>