<?php require_once 'includes/redireccion.php'; ?>
<?php require_once 'includes/cabecera.php'; ?>
<?php require_once 'includes/lateral.php'; ?>

     <!-- Caja Principal -->   
     <div id="principal">

     <h3>Registrate</h3>
          <?php if(isset($_SESSION['exito'])) :?>
             <div class="alerta alerta-exito"><?= $_SESSION['exito'];?></div>   
          <?php elseif(isset($_SESSION['error']['general'])) : ?>
             <div class="alerta alerta-error"><?= $_SESSION['error']['general'];?></div>
          <?php endif; ?>

          <form action="actualizar-usuario.php" method="POST">


              <!-- Validacion para el campo nombre -->

             <label for="nombre">Nombre</label>
            <?php if(isset($_SESSION['error']['nombre'])) :  ?> 
             <input type="text" name="nombre" value="" />
             <?php echo mostrarError($_SESSION['error'],'nombre'); ?>
             <?php else : ?>
             <input type="text" name="nombre" value="<?=$_SESSION['usuario']['nombre']; ?>" />
            <?php endif; ?>      
             


              <!-- Validacion para el campo apellido -->

             <label for="apellido">Apellido</label>
            <?php if(isset($_SESSION['error']['apellido'])) :  ?> 
             <input type="text" name="apellido" value="" />
             <?php echo mostrarError($_SESSION['error'],'apellido'); ?>
             <?php else : ?>
             <input type="text" name="apellido" value="<?=$_SESSION['usuario']['apellidos']; ?>" />
            <?php endif; ?>      


              <!-- Validacion para el campo email -->

             <label for="email">Email</label>
            <?php if(isset($_SESSION['error']['email'])) :  ?> 
             <input type="email" name="email" value="" />
             <?php echo mostrarError($_SESSION['error'],'email'); ?>
             <?php else : ?>
             <input type="email" name="email" value="<?=$_SESSION['usuario']['email']; ?>" />
            <?php endif; ?>      
           
 

             <input type="submit" name="submit" value="Actualizar" />
          </form>
          <?php  borrarErrores(); ?>

     </div>
       <!-- Fin caja principal -->


        <?php require_once 'includes/pie.php'; ?>