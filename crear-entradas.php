<?php require_once 'includes/redireccion.php'; ?>
<?php require_once 'includes/cabecera.php'; ?>
<?php require_once 'includes/lateral.php'; ?>


     <!-- Caja Principal -->   
       <div id="principal">
          <h1>Crear Entradas</h1>
          <p>Añade nuevas entradas al blog para que los usuarios puedan leerlas y disfrutar de nuestro contenido.</p>

<br>
                 <?php if(isset($_SESSION['entra_exito'])) : ?>
                  <div class='alerta alerta-exito'><?= $_SESSION['entra_exito']?></div>
                 <?php endif; ?>

         <form action="guardar-entrada.php" method="POST">
           <label for="titulo">Titutlo:</label>
           <input type="text" name="titulo" />

           <?php echo isset($_SESSION['entra_error']) ? mostrarError($_SESSION['error'],'titulo') : ' '; ?>          
         
           <label for="descripcion">Descripcion:</label>
           <textarea name="descripcion" id="" cols="30" rows="10"></textarea>

           <?php echo isset($_SESSION['entra_error']) ? mostrarError($_SESSION['entra_error'],'descripcion') : ' '; ?>          
           

           <label for="categoria">Categoria:</label>
           <select name="categoria" id="">
                <?php 
                  $categorias = getCategorias(); 
                  if(isset($categorias)) :
                  while($categoria = mysqli_fetch_assoc($categorias)) : ?>

                    <option value="<?=$categoria['id']?>">
                        <?=$categoria['nombre']?>
                    </option>

                  <?php endwhile; endif;?>
           </select>

            <input type="submit" value="guardar">         
         </form>
         <?php  borrarErrores(); ?>

       </div>
       <!-- Fin caja principal -->


        <?php require_once 'includes/pie.php'; ?>