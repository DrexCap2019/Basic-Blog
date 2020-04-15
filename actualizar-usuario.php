<?php 

if(isset($_POST['submit'])){

    require_once 'includes/conexion.php';
    
    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($conection, $_POST['nombre']) : false;
    $apellido = isset($_POST['apellido']) ? mysqli_real_escape_string($conection, $_POST['apellido']) : false; 
    $email = isset($_POST['email']) ? mysqli_real_escape_string($conection, trim($_POST['email'])) : false;
    
    $errores = array();

    if(!empty($nombre) && !is_numeric($nombre) && !preg_match('/[0-9]/', $nombre)){

        $nombre_valido = true;
    }else {
        $nombre_valido = false;
       $errores['nombre'] = "El nombre no es valido";
    }
                   
    if(!empty($apellido) && !is_numeric($apellido) && !preg_match('/[0-9]/', $apellido)){

        $nombre_valido = true;
    }else {
        $nombre_valido = false;
       $errores['apellido'] = "El apellido no es valido";
    }

   if(!empty($email) && filter_var($email , FILTER_VALIDATE_EMAIL)){

       $email_valido = true;        
   }else{
       $email_valido = false;
       $errores['email'] = "El correo no es valido";
   }      
   
   $guardar_usuario = false;

   if(count($errores) == 0){

      $guardar_usuario = true;
      $usuario = $_SESSION['usuario'];

        $sql = "SELECT id FROM usuarios WHERE email = '$email';";
        $consulta= mysqli_query($conection, $sql);
        $isset_email = mysqli_fetch_assoc($consulta);

        if($isset_email['id'] == $usuario['id'] || empty($isset_email)){

      $sql = "UPDATE usuarios SET ".
      "nombre = '$nombre', ".
      "apellidos = '$apellido', ".
      "email = '$email' ".
      "WHERE id = ".$usuario['id'];

      $guardar = mysqli_query($conection, $sql);
     
      if($guardar){
          $_SESSION['usuario']['nombre'] = $nombre;
          $_SESSION['usuario']['apellidos'] = $apellido;
          $_SESSION['usuario']['email'] = $email;
        
       $_SESSION['exito']= "Tus datos se han actualizado con exito.";

      }else{
       $_SESSION['error']['general'] = "Fallos al actualizar";
      
      }

    }else{
       $_SESSION['error']['general'] = "El usuario ya existe";

    }

   }else {
       $_SESSION['error']= $errores;  
   }

}

header ('Location: mis-datos.php');

?>