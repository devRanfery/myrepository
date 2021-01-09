<?php
require_once('../models/loginModel.php');


class loginController extends loginModel{

    public function Login($username, $passwrd){
        $resultado = new loginModel();
        // echo $username;
        // echo $passwrd;
       return $resultado->Login($username, $passwrd);
    }

    // public function GetAllMemory()
    // {
    //     $resultado = new memoriasModel();
    //     return $resultado->GetAllMemory();
    // }

    // public function CreateMemory(){
    
    //     $ruta = "../public/proyectos/".$_FILES['archivo']['name'];
    //     move_uploaded_file($_FILES['archivo']['tmp_name'], $ruta);
    //     echo $ruta;
      
    //     $datos = [
    //         "Nombre"=> trim($_POST['nombre']),
    //         "Alumno"=> trim($_POST['noControl']),
    //         "Compania"=> trim($_POST['compania']),
    //         "Ruta" => $ruta,
    //     ];

    //     // $resultado = new proyectosModel();
    //     // return $resultado->AddProject();
    //     $guardarProyecto = proyectosModel::AddProject($datos);
        

    //     if ($guardarProyecto) {
    //         $mensaje = "SE GUARDO CORRECTAMENTE";
    //         header('Location: ../views/proyectos.php');
    //     }
    //     else{
    //         $mensaje = "NO SE GUARDO";
    //     }
    //     return $mensaje;
    // }
}
