<?php
include '../conexion/conexion.php';

$bandera;
if( isset($_GET['accion']) ){
    $bandera = $_GET['accion'];
}else{
    $bandera = "getContactos";
}

switch ($bandera) {
    case 'getContactos':
      $sql = "SELECT * from contactos";
      $respuesta = mysqli_query($conexion,$sql);

      if(!$respuesta){
        echo "error";
        return 0;
      }
      else{
          $datosCompletos=[];
          while( $datos = mysqli_fetch_assoc($respuesta) ){
            $datosCompletos[] = $datos;
          }
          echo json_encode($datosCompletos);
      }

    break;
}