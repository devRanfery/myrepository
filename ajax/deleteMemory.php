<?php                                                                                                                                              
if ( isset($_POST['id']) ) {  
    $id =  intval($_POST['id']); 
    require_once('../controllers/memoriasController.php');
    $insMemoria = new memoriasController(); 
    echo $insMemoria->deleteMemory($id);                                                  

} else {
    echo "No se posteó valor para el ID, revise el formulario";
}
?>