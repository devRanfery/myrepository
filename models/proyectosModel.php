<?php
require_once('../core/mainModel.php');

class proyectosModel extends mainModel
{
    private $db;

    public function __construct()
    {
        $this->db = mainModel::conectar();
    }

    public function GetAllProjects($num_Control)
    {
        $tabla = [];
        $i = 0;

        $sql = "EXEC GetProjectByStudent @numControl = '$num_Control'";

        $consulta = sqlsrv_query($this->db, $sql);

        while ($fila = sqlsrv_fetch_array($consulta, SQLSRV_FETCH_ASSOC)) {
            $tabla[$i] = $fila;
            $i++;
        }
        return $tabla;
    }

    public function AddProject($data){
        $Nombre = $data['Nombre'];
        $Alumno = $data['Alumno'];
        $Compania = $data['Compania'];
        $Fecha = $data['Fecha'];
        $Ruta = $data['Ruta'];

        $query = "EXEC SaveProject @Nombre='$Nombre', @Alumno='$Alumno',
        @Compania='$Compania', @Fecha='$Fecha', @Ruta='$Ruta'";

        $resultado = sqlsrv_query($this->db, $query);

        return $resultado;
    }
}
