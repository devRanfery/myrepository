<?php
    if (isset($_POST['id'])) {
        require_once('../controllers/memoriasController.php');
        $insMemorias = new memoriasController();
        $data = [
            "Id"=> intval(trim($_POST['id'])),
            "Proyecto"=> intval(trim($_POST['proyecto'])),
            "Asesor"=> trim($_POST['asesor']),
            "Tipo_Memoria"=> intval(trim($_POST['tipoMemoria'])),
            "Fecha" => trim($_POST['fechaMemoria']),
        ];
        // echo json_encode($data);
        echo $insMemorias->updateMemoryByAdmin($data);
    }else{
        $mjs= 'Ocurrio un error';
        echo $mjs;
    }