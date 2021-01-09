<?php
if (isset($_POST['nombre']) && isset($_POST['noControl'])) {
    require_once('../controllers/proyectosController.php');
    $insProyectos = new proyectosController();
    echo $insProyectos->CreateProject();
    
}else{
    echo "errorrrrrrr";
}