<?php
require_once('../models/asignacionesModel.php');
  

class asignacionesController extends asignacionesModel{

    public function GetAdviserByStudent($numControl){
        $resultado = new asignacionesModel();
        return $resultado->GetAdviserByStudent($numControl);
    }

    // public function agregar_usuario_controlador(){
    //     $estatus = true;

    //     $datos = [
    //         "usuario"=> trim($_POST['usuario']),
    //         "psword"=> trim($_POST['psword']),
    //         "nombre"=> trim($_POST['nombre']),
    //         "aPaterno" => trim($_POST['a_paterno']),
    //         "aMaterno" => trim($_POST['a_materno']),
    //         "fecha"=> trim($_POST['fecha']),
    //         "estatus" => $estatus
    //     ];

    //     $guardarUsuarios = usuariosModel::agregar_usuario_modelo($datos);

    //     if ($guardarUsuarios === true) {
    //         $alerta=[
    //             "Alerta"=>"limpiar",
    //             "Titulo"=>"Exito",
    //             "Texto"=>"El usuario se guardo correctamente",
    //             "Tipo"=>"success"
    //         ];
    //     }
    //     else{
    //         $alerta=[
    //             "Alerta"=>"recargar",
    //             "Titulo"=>"Fallo",
    //             "Texto"=>"El producto no se guardo correctamente",
    //             "Tipo"=>"error"
    //         ];
    //     }
    //     return mainModel::sweet_alert($alerta); 
    // }
}