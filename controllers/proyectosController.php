<?php
require_once('../models/proyectosModel.php');


class proyectosController extends proyectosModel{

    public function GetAllProjects($num_Control)
    {
        $resultado = new proyectosModel();
        return $resultado->GetAllProjects($num_Control);
    }

    public function GetAllProjectsByAdmin()
    {
        $resultado = new proyectosModel();
        return $resultado->GetAllProjectsByAdmin();
    }

    public function CreateProject(){
    
        $ruta = $_FILES['archivo']['name'];
        move_uploaded_file($_FILES['archivo']['tmp_name'], $ruta);
       
      
        $data = [
            "Nombre"=> trim($_POST['nombre']),
            "Alumno"=> $_POST['noControl'],
            "Compania"=> trim($_POST['compania']),
            "Fecha"=> trim($_POST['fecha']),
            "Ruta" => $ruta,
        ];

        // $resultado = new proyectosModel();
        // return $resultado->AddProject();
        $guardarProyecto = proyectosModel::AddProject($data);
        

        if ($guardarProyecto) {
            $mensaje = "Se guardo correctamente";
            // header('Location: ../views/proyectos.php');

            echo "<script>
            window.location= '../views/proyectos.php';
            alert('Se guardo correctamente');
            </script>";
            
        }
        else{
            // echo $guardarProyecto;
            $mensaje = "No se logro guardar el dato.";
            echo '<script>alert("No se logro guardar el dato")</script>';
            header('Location: ../views/proyectos.php');
        }
        echo $guardarProyecto;
    }

    public function GetProjectOne($id)
    {
        $result = new proyectosModel();
        return $result->GetProjectOne($id);
    }


    public function updateProject($data)
    {
        $actualizarProyecto = proyectosModel::updateProject($data);
    
        if ($actualizarProyecto) {
            echo "<script>
        
            alert('Se actualizo correctamente');
            </script>";
            header('Location: ../views/proyectos.php');
        }
        else{
            
            echo "<script>
          
            alert('No se actualizo correctamente');
            </script>";
            header('Location: ../views/proyectos.php');
            
        }
        return $actualizarProyecto;
       
    }


    public function deleteProject($id)
    {
        $eliminarProyecto = proyectosModel::deleteProject($id);
    
        if ($eliminarProyecto) {
            echo "<script>
            window.location= '../views/proyectos.php';
            alert('Se elimino correctamente');
            </script>";
            return $eliminarProyecto;
        }
        else{
            echo "<script>
            window.location= '../views/proyectos.php';
            alert('No se elimino correctamente');
            </script>";
            return $eliminarProyecto;
            
        }
        
    }
}
