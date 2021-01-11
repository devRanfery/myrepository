<?php
    if (isset($_POST['id'])) {
        require_once('../controllers/proyectosController.php');
        $insProyectos = new proyectosController();
        $data = [
            "Id"=> intval(trim($_POST['id'])),
            "Nombre"=> trim($_POST['nombre']),
            "Alumno"=> trim($_POST['noControl']),
            "Compania"=> trim($_POST['compania']),
            "Fecha"=> $_POST['fecha'],
            "Ruta" => trim($_POST['ruta']),
        ];
        return $insProyectos->updateProject($data);
        echo json_encode($data);
    }else{
        $mjs= 'Ocurrio un error';
        echo $mjs;
    }