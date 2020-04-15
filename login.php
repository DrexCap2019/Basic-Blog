<?php 

if(isset($_POST['submit'])){
    
    require_once 'includes/conexion.php';

     $email = isset($_POST['email']) ? trim($_POST['email']) : false;
     $contraseña = isset($_POST['password']) ? $_POST['password'] : false;
 
        $email_verificado=false;

     if($email && $contraseña){
         $email_verificado=true;
     }else{
         $_SESSION['error_datos'] = "Ingrese los datos que faltan";
     }

     $sql = "SELECT * FROM usuarios WHERE email = '$email';";
     $verificar = mysqli_query($conection, $sql);

     if($verificar && mysqli_num_rows($verificar) == 1){

         $usuario = mysqli_fetch_assoc($verificar);

        $contra = password_verify($contraseña, $usuario['password']);
         
          if($contra){
                $_SESSION['usuario']= $usuario;
          }else{
             $_SESSION['error_login'] = "Contraseña incorrecta";
          }

     }else{

        $_SESSION['error_login'] = "Email incorrecto";
     }

}

    header ('Location: index.php');
?>