<?php 

    if(isset($_POST)){
        require_once 'includes/conexion.php';
        
        $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($conection, $_POST['nombre']) : false;

        $error= array();

        if(!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre) ){
            $nombre_valido=true;
        }else{
           $nombre_valido=false;
          $error['nombre']="El nombre no es valido";
        }

        
        if(COUNT($error)== 0){
            
            $sql = "INSERT INTO categorias VALUES(null, '$nombre');";
            $consulta = mysqli_query($conection, $sql); 
            header('Location: index.php');

        }else{
            $_SESSION['cate_error'] = $error;
            header('Location: crear-categoria.php');
        }

    }



?>