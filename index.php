<?php require_once 'includes/cabecera.php'; ?>
<?php require_once 'includes/lateral.php'; ?>


     <!-- Caja Principal -->   
       <div id="principal">
          <h1>Ultimas 4 entradas</h1>
          
       <?php $entradas = getEntradas(true);      
       while($entrada = mysqli_fetch_assoc($entradas)) : ?>

         <article class="entrada">

              <a href="detalleEntrada.php?id=<?=$entrada['id']?>">
           <h2><?= $entrada['titulo'] ?></h2>
           <span class="fecha"><?=$entrada['categoria'].' | '.$entrada['fecha']?></span>
           <!-- 'substr' es para reducir la cantidad de caracteres que se extrae a partir del llamado -->
              <p><?=substr($entrada['descripcion'], 0, 100)?></p>
              </a>
              
         </article>
         
       <?php endwhile; ?> 

         <br>
          <div id="ver-todas">
             <a href="entradas.php">Ver todas las entradas</a>
          </div>

       </div>
       <!-- Fin caja principal -->


      <?php require_once 'includes/pie.php'; ?>