<?php require_once 'includes/redireccion.php'; ?>
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

          <h1>Editar la entrada: <?=$entrada_Actual['titulo']?></h1>
         
<br>
                 <?php if(isset($_SESSION['entra_exito'])) : ?>
                  <div class='alerta alerta-exito'><?= $_SESSION['entra_exito']?></div>
                  <?php elseif(isset($_SESSION['entra_error']['general'])): ?>
                    <div class='alerta alerta-error'><?= $_SESSION['entra_error']['general']?></div>
                 <?php endif; ?>

         <form action="guardar-entrada.php?editar=<?=$entrada_Actual['id']?>" method="POST">

           <label for="titulo">Titutlo:</label>
           <input type="text" name="titulo" value="<?=$entrada_Actual['titulo']?>"/>

 <?php echo isset($_SESSION['entra_error']) ? mostrarError($_SESSION['entra_error'],'titulo') : ' '; ?>          
         
           <label for="descripcion">Descripcion:</label>
           <textarea name="descripcion" id="" cols="30" rows="10"><?=$entrada_Actual['descripcion']?></textarea>

 <?php echo isset($_SESSION['entra_error']) ? mostrarError($_SESSION['entra_error'],'descripcion') : ' '; ?>          
           
           <label for="categoria">Categoria:</label>

           <select name="categoria" id="">
                <?php 
                  $categorias = getCategorias(); 
                  if(isset($categorias)) :
                  while($categoria = mysqli_fetch_assoc($categorias)) : ?>

                    <option value="<?=$categoria['id']?>"
                    <?= ($categoria['id'] == $entrada_Actual['categoria_id']) ? 'selected = "selected"' : ' ' ?>>
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