<?php 

if(isset($_POST['submit'])){

    require_once 'includes/conexion.php';
    
    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($conection, $_POST['nombre']) : false;
    $apellido = isset($_POST['apellido']) ? mysqli_real_escape_string($conection, $_POST['apellido']) : false; 
    $email = isset($_POST['email']) ? mysqli_real_escape_string($conection, trim($_POST['email'])) : false;
    $contraseña = isset($_POST['password']) ? mysqli_real_escape_string($conection, $_POST['password']) : false;


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

   if(!empty($contraseña)){

     $contra_valido = true;
   }else {
      $contra_valido = false;
       $errores['contraseña'] = "Ingrese contraseña";
   }

                                              
   $guardar_usuario = false;

   if(count($errores) == 0){
      $guardar_usuario = true;

      $pass_seguro = password_hash($contraseña, PASSWORD_BCRYPT, ['cost' => 4]);
      $sql = "INSERT INTO usuarios VALUES (null, '$nombre', '$apellido', '$email', '$pass_seguro', CURDATE());";
      $guardar = mysqli_query($conection, $sql);

      if($guardar){
       $_SESSION['exito']= "Se guardo correctamente su cuenta";

      }else{
       $_SESSION['error']['general'] = "No se pudo guardar correctamente";

      }

   }else {
       $_SESSION['error']= $errores;  
   }

}

header ('Location: index.php');


?>