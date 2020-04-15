<?php 

    if(isset($_POST)){

        require_once 'includes/conexion.php';
        
        $titulo = isset($_POST['titulo']) ? mysqli_real_escape_string($conection, $_POST['titulo']) : false;
        $descripcion= isset($_POST['descripcion']) ? mysqli_real_escape_string($conection, $_POST['descripcion']) : false;
        $categoria= isset($_POST['categoria']) ?  (int)$_POST['categoria'] : false;
        $usu_id= $_SESSION['usuario']['id'];
        $error= array();

        if(empty($titulo)){
            $error['titulo']= "El titulo no es valido.";
        }

        if(empty($descripcion)){

            $error['descripcion'] = "La descripcion no es valida.";
        }

        if(empty($categoria)){

            $error['$categoria'] = "La categoria no es valida"; 
        }


        if(COUNT($error)== 0){
            
           if(isset($_GET['editar'])){
     
            $entra_id = $_GET['editar'];
         $sql = "UPDATE entradas SET titulo = '$titulo', descripcion = '$descripcion', categoria_id = $categoria ".
                "WHERE id = $entra_id AND usuario_id = $usu_id;";
           }else{

         $sql = "INSERT INTO entradas VALUES(null, $usu_id, $categoria, '$titulo', '$descripcion', CURDATE());";
           }

            $consulta = mysqli_query($conection, $sql); 

            if($consulta && isset($_GET['editar'])){
                $_SESSION['entra_exito']="Se actualizo correctamente.";

            }else if($consulta && !isset($_GET['editar'])){          
                $_SESSION['entra_exito']="Se guardo correctamente.";
            }else{
                $_SESSION['entra_error']['general'] = "No se pudo actualizar los datos correctamente.";
            }
    
            if(isset($_GET['editar'])){
                header('Location: editar-entrada.php?id='.$_GET['editar']);
            }else{
                header('Location: crear-entradas.php');
            }

        }else{
            $_SESSION['entra_error'] = $error;    

            if(isset($_GET['editar'])){
                header('Location: editar-entrada.php?id='.$_GET['editar']);
            }else{
                header('Location: crear-entradas.php');
            }
            
        }
        
    }
    
          



?>