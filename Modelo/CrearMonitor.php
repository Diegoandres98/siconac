<?php
require_once "../Modelo/ValidadorDeSession.php";
require_once "../Modelo/Conexion.php";
$directorio = '../archivos/';
$subir_archivo = $directorio.basename($_FILES['subir_archivo']['name']);

    if(!empty($_POST['Nombre']) && !empty($_POST['Correo']) 
    && !empty($_POST['Contraseña'])) 
    {   
        $Nombre=$_POST['Nombre'];
        $Correo=$_POST['Correo'];
        $Pass= sha1(strip_tags($_POST['Contraseña']));
        $Propietario=$_SESSION['users_id'];

        $result = $conn->query("SELECT * FROM `users` WHERE `users_idproperty`='".$Propietario."' AND
        `users_email`='".$Correo."' ");
        $Sies = $result->fetch_all(MYSQLI_ASSOC);
        $count = count($Sies);

        if ($count == 0)
        {
            if (move_uploaded_file($_FILES['subir_archivo']['tmp_name'], $subir_archivo)) 
            { 
                $result = $conn->query("INSERT INTO `users` (users_rol, users_monitor, users_idproperty, users_foto,
                users_nombre, users_email, users_password) VALUES ('2','1','$Propietario','$subir_archivo','$Nombre','$Correo','$Pass')");
                // $users = $result->fetch_all(MYSQLI_ASSOC);
                echo json_encode(array('success' => 1));
            }
            else
            {
                $subir_archivo='../archivos/ImgGenerica.jpg' ;
    
                $Nombre=$_POST['Nombre'];
                $Correo=$_POST['Correo'];
                $Pass= sha1(strip_tags($_POST['Contraseña']));
                $Propietario=$_SESSION['users_id'];
                //momento de conectarnos a db
                require_once "../Modelo/Conexion.php";
                
                $result = $conn->query("INSERT INTO `users` (users_rol, users_monitor, users_idproperty, users_foto,
                users_nombre, users_email, users_password) VALUES ('2','1','$Propietario','$subir_archivo','$Nombre','$Correo','$Pass')");
                // $users = $result->fetch_all(MYSQLI_ASSOC);
                echo json_encode(array('success' => 1));
                // echo json_encode(array('success' => 2));
            }
        }
        else
        { 
            echo json_encode(array('success' => 3));
        }

    } 
else 
{

  echo json_encode(array('success' => 2));

}

?>