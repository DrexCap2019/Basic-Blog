<?php 
   require_once 'includes/conexion.php';

   $exis_id = $_GET['id'];
   
   $usuario_id = $_SESSION['usuario']['id'];

   if($exis_id && isset($_SESSION['usuario'])){
     
    $sql = "DELETE FROM entradas WHERE usuario_id = $usuario_id AND id = $exis_id;";
      $consulta = mysqli_query($conection, $sql);
   }


   header('Location: index.php');
?>