<?php require_once 'includes/conexion.php'; ?>
<?php require_once 'includes/helpers.php'; ?>

<?php 
    $entrada_Actual = getEntrada($_GET['id']);

        if(!isset($entrada_Actual['id'])){
              header('Location: index.php');
        }
?>

<?php require_once 'includes/cabecera.php'; ?>
<?php require_once 'includes/lateral.php'; ?>
               

     <!-- Caja Principal -->   
       <div id="principal">
          <h1><?= $entrada_Actual['titulo'] ?></h1>
          <a href="categoria.php?id=<?=$entrada_Actual['categoria_id'] ?>">
            <h2><?=$entrada_Actual['categoria'] ?></h2>
          </a>

          <br>
           <h4><?=$entrada_Actual['fecha'] ?> | <?=$entrada_Actual['usuario']?></h4>
            <p><?=$entrada_Actual['descripcion'] ?></p>
           <br>

            <?php if(isset($_SESSION['usuario']) && $_SESSION['usuario']['id']==$entrada_Actual['usuario_id']) : ?>

          <a href="editar-entrada.php?id=<?=$entrada_Actual['id']?>" class="boton boton-verde">Editar Entrada</a>
          <a href="borrar-entrada.php?id=<?=$entrada_Actual['id']?>" class="boton boton-azul">Eliminar Entradas</a>

            <?php endif; ?>

         <br>
          <div id="ver-todas">
             <a href="index.php">Las ultimas entradas</a>
          </div>

       </div>
       <!-- Fin caja principal -->


      <?php require_once 'includes/pie.php'; ?>