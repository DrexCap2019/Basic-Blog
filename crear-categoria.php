<?php require_once 'includes/redireccion.php'; ?>
<?php require_once 'includes/cabecera.php'; ?>
<?php require_once 'includes/lateral.php'; ?>


     <!-- Caja Principal -->   
       <div id="principal">
          <h1>Crear Categorias</h1>
          <p>Añade nuevas categorias al blog para que los usuarios puedan usarlas al crear sus entradas. </p>

<br>

         <form action="guardar-categoria.php" method="POST">
           <label for="nombre">Nombre de la Categoria:</label>
           <input type="text" name="nombre" />

                 <?php if(isset($_SESSION['cate_error'])) : ?>
                  <div class='alerta alerta-error'><?= $_SESSION['cate_error']['nombre']?></div>
                 <?php endif; ?>
                 
            <input type="submit" value="guardar">         
         </form>
         <?php  borrarErrores(); ?>

       </div>
       <!-- Fin caja principal -->


        <?php require_once 'includes/pie.php'; ?>