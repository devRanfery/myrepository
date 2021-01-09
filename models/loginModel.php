<?php
 require_once('../core/mainModel.php');

 class loginModel extends mainModel{
    private $db;

    public function __construct(){
        $this->db=mainModel::conectar();
    }


    public function Login($username, $passwrd){


        // $sql= "EXEC loginAlumnos @numControl=$username, @contrasena=$passwrd";
        $sql= "EXEC loginAlumnos @numControl = '$username', @contrasena = '$passwrd'";

        $stmt = sqlsrv_query($this->db, $sql);

        $row_count = sqlsrv_has_rows($stmt); 

        echo $row_count;
       
        
        if ($row_count === true) {
            $tabla = [];
            $i = 0;
        
            while ($fila = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
                $tabla[$i] = $fila;
                $i++;
            }

            $numControl = $tabla[0]["Num_control"];
            $nombre = $tabla[0]["Nombre"] .' ' .$tabla[0]["Ape_P"] .' ' .$tabla[0]["Ape_M"];
            // $ape_p = $tabla[0]["Ape_P"];
            // $ape_m = $tabla[0]["Ape_M"];
            $rol = $tabla[0]["Rol"];

            $UrlAlumno = "http://localhost/Tecrepo/views/proyectos.php";
            
            if ($rol == 2) {
                session_start();
                $_SESSION['numControl']= $numControl;
                $_SESSION['nombre'] = $nombre;
                $_SESSION['rol']=$rol;
                header("Location: $UrlAlumno");
            }

        }else{
            $login = "http://localhost/Tecrepo/";
            header("Location: $login");
        }
    }

    // protected function GetAllAlumnos(){
    //     $tabla = [];
    //     $i = 0;

    //     $sql = "SELECT * FROM Alumnos";

    //     $consulta = sqlsrv_query($this->db, $sql);

    //     while ($fila = sqlsrv_fetch_array($consulta, SQLSRV_FETCH_ASSOC)) {
    //         $tabla[$i] = $fila;
    //         $i++;
    //     }
    //     return $tabla;

    // }
 }