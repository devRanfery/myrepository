<?php
 require_once('../core/mainModel.php');

 class alumnosModel extends mainModel{
    private $db;

    protected function __construct(){
        $this->db=mainModel::conectar();
    }

    protected function GetAllAlumnos(){
        $tabla = [];
        $i = 0;

        $sql = "SELECT * FROM Alumnos";

        $consulta = sqlsrv_query($this->db, $sql);

        while ($fila = sqlsrv_fetch_array($consulta, SQLSRV_FETCH_ASSOC)) {
            $tabla[$i] = $fila;
            $i++;
        }
        return $tabla;

    }
 }