<?php
require_once "../Modelo/ValidadorDeSession.php";
require_once "../Modelo/Conexion.php";
// $directorio = '../archivos/'.$_SESSION['users_id'].'/';
// $subir_archivo = $directorio.basename($_FILES['subir_archivo']['name']);

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
            $result = $conn->query("INSERT INTO `users` (users_rol, users_monitor, users_idproperty, users_foto,
            users_nombre, users_email, users_password) VALUES ('2','1','$Propietario','../archivos/ImgGenerica.jpg','$Nombre','$Correo','$Pass')");
            // $users = $result->fetch_all(MYSQLI_ASSOC);

            // echo json_encode(array('success' => 1));
            $result = $conn->query("SELECT * FROM `users` WHERE `users_idproperty`='".$Propietario."' AND
            `users_email`='".$Correo."' AND `users_nombre`='".$Nombre."' AND `users_password`='".$Pass."' ");
            $Sies = $result->fetch_all(MYSQLI_ASSOC);

            $directorio = '../archivos/'.$_SESSION['users_id'].'/'.$Sies[0]['users_id'].'/';
            $subir_archivo = $directorio.basename($_FILES['subir_archivo']['name']);

            if (!file_exists($directorio)) {
                mkdir($directorio, 0777, true);
            }

            if (move_uploaded_file($_FILES['subir_archivo']['tmp_name'], $subir_archivo)) 
            { 
                $result = $conn->query("UPDATE `users` SET  `users_foto` = '".$subir_archivo."' WHERE `users_id` = '".$Sies[0]['users_id']."' ");
                echo json_encode(array('success' => 1));
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