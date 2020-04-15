<?php 
   if(!isset($_POST['busqueda'])){
       header ('Location: index.php');
   }
?>

<?php require_once 'includes/cabecera.php'; ?>
<?php require_once 'includes/lateral.php'; ?>


     <!-- Caja Principal -->   
       <div id="principal">
          <h1>Busqueda de: <?= $_POST['busqueda'] ?></h1>
          

            <!-- Entradas -->
       <?php
    $entradas = getEntradas(null, null, $_POST['busqueda']);
       
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
          <div class="alerta alerta-error">No se ha encontrado ninguna entrada con ese titulo.</div>
        
                <?php endif; ?> 

         <br>
          <div id="ver-todas">
             <a href="index.php">Las ultimas entradas</a>
          </div>

       </div>
       <!-- Fin caja principal -->


      <?php require_once 'includes/pie.php'; ?>