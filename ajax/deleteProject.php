<?php                                                                                                                                               
if ( isset($_POST['id']) ) {  
    $id =  intval($_POST['id']); 
    require_once('../controllers/proyectosController.php');
    $insProyecto = new proyectosController(); 
    echo $insProyecto->deleteProject($id);                                                

} else {
    echo "No se posteó valor para el ID, revise el formulario";
}
?>