<?php
if (isset($_POST['tipoMemoria'])) {
    require_once('../controllers/memoriasController.php');
    $insMemorias = new memoriasController();
    echo $insMemorias->CreateMemory();
    // echo "entro";
    
}else{
    header('Location: ../views/memorias.php');
}