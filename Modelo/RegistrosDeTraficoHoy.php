<?php
$fecha = date_create();
$fechita= date_timestamp_get($fecha);

 echo date("Y/m/d", $fechita);


// SELECT *
// FROM tabla
// WHERE CampoFecha 
// BETWEEN '2011/02/25' AND '2011/02/27'
?>