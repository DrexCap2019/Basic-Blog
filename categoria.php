<?php require_once 'includes/conexion.php'; ?>
<?php require_once 'includes/helpers.php'; ?>

<?php 
    $categoria_Actual = getCategoria($_GET['id']);

        if(!isset($categoria_Actual['id'])){
              header('Location: index.php');
        }
?>

<?php require_once 'includes/cabecera.php'; ?>
<?php require_once 'includes/lateral.php'; ?>


     <!-- Caja Principal -->   
       <div id="principal">
          <h1>Entradas de <?= $categoria_Actual['nombre'] ?></h1>
          

            <!-- Entradas -->
       <?php $entradas = getEntradas(null, $_GET['id']);  
               if(!empty($entradas)) :    
       while($entrada = mysqli_fetch_assoc($entradas)) : ?>

         <article class="entrada">
           <a href="detalleEntrada.php?id=<?=$entrada['id']?>">
           <h2><?= $entrada['titulo'] ?></h2>
           <span class="fecha"><?=$entrada['categoria'].' | '.$entrada['fecha']?></span>
           <!-- 'substr' es para reducir la cantidad de caracteres que se extrae a partir del llamado -->
           <p><?=substr($entrada['descripcion'], 0, 100)?></p>
           </a>
         </article>
         
       <?php endwhile; 
            else :?>
           <br>
          <div class="alerta alerta-error">No se ha encontrado ninguna entrada de esta categoria.</div>
        
                <?php endif; ?> 

         <br>
          <div id="ver-todas">
             <a href="index.php">Las ultimas entradas</a>
          </div>

       </div>
       <!-- Fin caja principal -->


      <?php require_once 'includes/pie.php'; ?>