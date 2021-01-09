<?php
 require_once('../core/mainModel.php');

 class asignacionesModel extends mainModel{
    private $db;

    protected function __construct(){
        $this->db=mainModel::conectar();
    }

    protected function GetAdviserByStudent($numControl){
        $tabla = [];
        $i = 0;

        $sql = "EXEC GetAdviserByStudent @numControl='$numControl'";

        $consulta = sqlsrv_query($this->db, $sql);

        while ($fila = sqlsrv_fetch_array($consulta, SQLSRV_FETCH_ASSOC)) {
            $tabla[$i] = $fila;
            $i++;
        }
        return $tabla;
    }
 }