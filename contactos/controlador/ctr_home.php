<?php
include '../conexion/conexion.php';

$bandera;
if( isset($_GET['accion']) ){
    $bandera = $_GET['accion'];
}else if(isset($_POST['accion'])){
  $bandera = $_POST['accion'];
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

    case "actualizar":
      $id = $_POST['idusuario'];
      $nombre = $_POST['nombre'];
      $telefono = $_POST['telefono'];
      $descripcion = $_POST['descripcion'];

      $sql = "UPDATE contactos SET con_nombre='$nombre', con_telefono='$telefono', con_descripcion='$descripcion' WHERE con_id='$id'";

      $respuesta = mysqli_query($conexion,$sql);

      if(!$respuesta){
        echo "error";
        return 0;
      }
      else{
          $informacion=[];
          $informacion["status"] = 200;
          $informacion["bandera"] = "success";
          $informacion["error"] = null;

      }

      echo json_encode($informacion);
    break;

    case "crear":
      $nombre = $_POST['nombre'];
      $telefono = $_POST['telefono'];
      $descripcion = $_POST['descripcion'];

      $sql = "INSERT INTO contactos(con_nombre, con_telefono, con_descripcion) VALUES('$nombre', '$telefono', '$descripcion')";
      
      $respuesta = mysqli_query($conexion,$sql);

      if(!$respuesta){
        echo "error";
        return 0;
      }
      else{
          $informacion=[];
          $informacion["status"] = 200;
          $informacion["bandera"] = "success";
          $informacion["error"] = null;

      }

      echo json_encode($informacion);

    break;

    case "eliminar":
      $id = $_POST["idUsuario"];
      $sql = "DELETE from contactos WHERE con_id='$id'";
      $respuesta = mysqli_query($conexion,$sql);

      if(!$respuesta){
        echo "error";
        return 0;
      }
      else{
          $informacion=[];
          $informacion["status"] = 200;
          $informacion["bandera"] = "success";
          $informacion["error"] = null;

      }

      echo json_encode($informacion);

    break;


}