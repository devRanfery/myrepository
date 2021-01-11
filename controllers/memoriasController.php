<?php
require_once('../models/memoriasModel.php');


class memoriasController extends memoriasModel{

    public function GetAllMemory($numControl)
    {
        $resultado = new memoriasModel();
        return $resultado->GetAllMemory($numControl);
    }

    public function GetAllTypeMemory()
    {
        $result = new memoriasModel();
        return $result->GetAllTypeMemory();
    }

    public function GetMemoryOne($id)
    {
        $result = new memoriasModel();
        return $result->GetMemoryOne($id);
    }

    public function updateMemory($data)
    {
        $actualizarMemoria = memoriasModel::updateMemory($data);
    
        if ($actualizarMemoria) {
            echo "<script>
            window.location= '../views/memorias.php';
            alert('Se actualizo correctamente');
            </script>";
            header('Location: ../views/memorias.php');
        }
        else{
            echo "<script>
            window.location= '../views/memorias.php';
            alert('No se actualizo correctamente');
            </script>";
            header('Location: ../views/memorias.php');
            
        }
        return $actualizarMemoria;
    }

    
    public function deleteMemory($id)
    {
        $eliminarMemoria = memoriasModel::deleteMemory($id);
    
        if ($eliminarMemoria) {
            echo "<script>
            window.location= '../views/memorias.php';
            alert('Se elimino correctamente');
            </script>";
            header('Location: ../views/memorias.php');
        }
        else{
            echo "<script>
            window.location= '../views/memorias.php';
            alert('No se elimino correctamente');
            </script>";
            header('Location: ../views/memorias.php');
            
        }
        return $eliminarMemoria;
    }

    public function CreateMemory(){
        if ($_POST['tipoMemoria'] == 2) {

                $asesores = array(
                 $_POST['asesor'],
                 $_POST['asesor2'],
                 $_POST['asesor3'],
                );
    
                $data = [];
                $array_num = count($asesores);
                for ($i = 0; $i < $array_num; ++$i){
                    $Memoria = [
                        "Proyecto"=> trim($_POST['proyecto']),
                        "Asesor"=> $asesores[$i],
                        "Tipo_Memoria"=> trim($_POST['tipoMemoria']),
                        "Fecha" => trim($_POST['fechaMemoria']),
                    ];
                    array_push($data,  $Memoria);
                }
                
            
                $arrayNum = count($data);
                for ($j = 0; $j < $arrayNum; ++$j){
                    $guardarMemoria = memoriasModel::AddMemory($data[$j]);
    
                    if ($guardarMemoria) {
                        $mensaje = "SE GUARDO CORRECTAMENTE";
                        header('Location: ../views/memorias.php');
                    }
                    else{
                        $mensaje = "NO SE GUARDO";
                    }
                    echo $mensaje;
                }
        }else {
                $datos = [
                    "Proyecto"=> trim($_POST['proyecto']),
                    "Asesor"=> trim($_POST['asesor']),
                    "Tipo_Memoria"=> trim($_POST['tipoMemoria']),
                    "Fecha" => trim($_POST['fechaMemoria']),
                ];
    
                $guardarMemoria = memoriasModel::AddMemory($datos);
    
                if ($guardarMemoria) {
                    $mensaje = "SE GUARDO CORRECTAMENTE";
                    header('Location: ../views/memorias.php');
                }
                else{
                    $mensaje = "NO SE GUARDO";
                }
                // echo $guardarMemoria;
                return $guardarMemoria;
        } 
    }
}
