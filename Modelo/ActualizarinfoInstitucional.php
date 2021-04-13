<?php
require_once "../Modelo/ValidadorDeSession.php";
require_once "../Modelo/Conexion.php";
$directorio = '../archivos/Institucion/';
$subir_archivo = $directorio.basename($_FILES['subir_archivo']['name']);

    if(!empty($_POST['Nombre'])) 
    {   
        $Nombre=$_POST['Nombre'];
        $Propietario=$_SESSION['users_id'];

        $result = $conn->query("SELECT * FROM `Datos_Institucionales` WHERE `Datos_id_admi_pro`='".$Propietario."' ");
        $Sies = $result->fetch_all(MYSQLI_ASSOC);
        $count = count($Sies);

        if ($count == 1)
        {
            if (move_uploaded_file($_FILES['subir_archivo']['tmp_name'], $subir_archivo)) 
            { 
                $result = $conn->query("UPDATE `Datos_Institucionales` SET `Datos_Nombre` = '".$Nombre."',`Datos_Foto` = '".$subir_archivo."' WHERE `Datos_id_admi_pro` = '".$Propietario."'");
                // $users = $result->fetch_all(MYSQLI_ASSOC);
                echo json_encode(array('success' => 1));
            }
            else
            {
                $result = $conn->query("UPDATE `Datos_Institucionales` SET `Datos_Nombre` = '".$Nombre."' WHERE `Datos_id_admi_pro` = '".$Propietario."'");              
                echo json_encode(array('success' => 1));
                // echo json_encode(array('success' => 2));
            }
        }
        else
        { 
            echo json_encode(array('success' => 3));
        }

    } 

