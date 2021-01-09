<?php
require_once('configApp.php');

class mainModel
{
  protected function conectar()
  {
    $conn = sqlsrv_connect(SERVER, connectionInfo);

      // if( $conn ) {
      //    echo "Conexión establecida.<br />";
      // }else{
      //    echo "Conexión no se pudo establecer.<br />";
      //    die( print_r( sqlsrv_errors(), true));
      // }

    return $conn;
  }
}
