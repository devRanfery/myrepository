<?php
require_once('../core/mainModel.php');

class memoriasModel extends mainModel
{
    private $db;

    public function __construct()
    {
        $this->db = mainModel::conectar();
    }

    public function GetAllMemory($numControl)
    {
        $tabla = [];
        $i = 0;

        $sql = "EXEC GetMemoryByStudent @numControl = '$numControl'";

        $consulta = sqlsrv_query($this->db, $sql);

        while ($fila = sqlsrv_fetch_array($consulta, SQLSRV_FETCH_ASSOC)) {
            $tabla[$i] = $fila;
            $i++;
        }
        return $tabla;
    }

    public function GetAllTypeMemory()
    {
        $tabla = [];
        $i = 0;

        $sql = "SELECT * FROM TipoMemorias";

        $consulta = sqlsrv_query($this->db, $sql);

        while ($fila = sqlsrv_fetch_array($consulta, SQLSRV_FETCH_ASSOC)) {
            $tabla[$i] = $fila;
            $i++;
        }
        return $tabla;
    }

    public function GetMemoryOne($id)
    {
        $tabla = [];
        $i = 0;

        $sql = "SELECT * FROM Memorias WHERE Id = $id";

        $consulta = sqlsrv_query($this->db, $sql);

        while ($fila = sqlsrv_fetch_array($consulta, SQLSRV_FETCH_ASSOC)) {
            $tabla[$i] = $fila;
            $i++;
        }
        return json_encode($tabla);
    }

    public function updateMemory($data)
    {
        // echo json_encode($data['Id']);
        $Id =  $data['Id'];
        $Proyecto = $data['Proyecto'];
        $Asesor = $data['Asesor'];
        $Tipo_Memoria = $data['Tipo_Memoria'];
        $Fecha = $data['Fecha'];

        // $query = "INSERT INTO Memorias VALUES ('$Proyecto','$Asesor','$Tipo_Memoria','$Fecha')";
        $query= "UPDATE Memorias SET Proyecto='$Proyecto', Asesor='$Asesor', Tipo_Memoria='$Tipo_Memoria',
         Fecha='$Fecha' WHERE Id='$Id'";

        $resultado = sqlsrv_query($this->db, $query);

        return $resultado; 
    }

    public function deleteMemory($id)
    {
        // echo json_encode($data['Id']);
        $Id =  $id;

        // $query = "INSERT INTO Memorias VALUES ('$Proyecto','$Asesor','$Tipo_Memoria','$Fecha')";
        $query= "DELETE FROM Memorias WHERE Id='$Id' ";

        $resultado = sqlsrv_query($this->db, $query);

        return $resultado; 
    }


    
    public function AddMemory($data){
       
        $Proyecto = $data['Proyecto'];
        $Asesor = $data['Asesor'];
        $Tipo_Memoria = $data['Tipo_Memoria'];
        $Fecha = $data['Fecha'];

        $query = "INSERT INTO Memorias VALUES ('$Proyecto','$Asesor','$Tipo_Memoria','$Fecha')";

        $resultado = sqlsrv_query($this->db, $query);


        return $resultado;  
    }
}
