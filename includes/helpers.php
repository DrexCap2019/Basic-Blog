
<?php 

function mostrarError($error, $campo){

    $alerta = '';

    if(isset($error[$campo]) && !empty($campo)){
    $alerta = "<div class='alerta alerta-error'>$error[$campo]</div>";
    }
    return $alerta;
}

function borrarErrores(){
    if(isset( $_SESSION['error'])){
      unset($_SESSION['error']);
      }elseif(isset($_SESSION['entra_exito'])){
        unset($_SESSION['entra_exito']);
      }

    if(isset($_SESSION['exito'])){
            unset($_SESSION['exito']);    
      }elseif(isset($_SESSION['cate_error'])){
        unset($_SESSION['cate_error']);
      }elseif(isset($_SESSION['entra_error'])){
        unset($_SESSION['entra_error']);
      }

    if(isset($_SESSION['error_login'])){
      unset($_SESSION['error_login']);   
       }elseif(isset($_SESSION['error_datos'])){
        unset($_SESSION['error_datos']);  
       }
    }

    function getCategorias(){

        global $conection;
        $sql= "SELECT * FROM categorias ORDER BY id ASC;";
        $consulta = mysqli_query($conection, $sql);
        $result= array();
        if($consulta && mysqli_num_rows($consulta) >= 1){
            $result = $consulta;
        }
       return $result;
    }

    function getCategoria($id){

      global $conection;
      $sql= "SELECT * FROM categorias WHERE id = $id;";
      $consulta = mysqli_query($conection, $sql);
      $result= array();
      if($consulta && mysqli_num_rows($consulta) >= 1){
          $result = mysqli_fetch_assoc($consulta);
      }
     return $result;
  }

    function getEntrada($id){
      global $conection;
     
      $sql= "SELECT e.*, c.nombre AS 'categoria', CONCAT(u.nombre, ' ',u.apellidos) AS usuario FROM entradas e ".
            "INNER JOIN categorias c ON e.categoria_id = c.id ".
            "INNER JOIN usuarios u ON e.usuario_id = u.id ".
            "WHERE e.id = $id;";
      $entrada = mysqli_query($conection, $sql);
      $general = mysqli_fetch_assoc($entrada);
      return $general;
    }


    function getEntradas($limit = null, $categoria = null, $busqueda = null){

      global $conection;
      $sql= "SELECT e.*, c.nombre as 'categoria' FROM entradas e ". 
      "INNER JOIN categorias c ON e.categoria_id = c.id ";
      
      if($categoria){
        $sql .= "WHERE e.categoria_id = $categoria ";
      }

      if($busqueda){
        $sql .= "WHERE e.titulo LIKE '%$busqueda%' ";
      }

      $sql.="ORDER BY e.id DESC";

      if($limit){
         $sql .= " LIMIT 4;";
      }

      $consulta = mysqli_query($conection, $sql);
      $result= array();
      if($consulta && mysqli_num_rows($consulta) >= 1){
         $result = $consulta;
      }
      return $result;
  }

?>