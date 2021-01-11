<?php
    if (isset($_POST['id'])) {
        require_once('../controllers/proyectosController.php');
        $insProyecto = new proyectosController();
        $id= $_POST['id'];
        echo $insProyecto->GetProjectOne($id);
    }else{
        $mjs= 'Ocurrio un error';
        echo $mjs;
    }