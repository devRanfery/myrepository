<?php
    if (isset($_POST['id'])) {
        require_once('../controllers/memoriasController.php');
        $insMemoria = new memoriasController();
        $id= $_POST['id'];
        echo $insMemoria->GetMemoryOne($id);
    }else{
        $mjs= 'Ocurrio un error';
        echo $mjs;
    }