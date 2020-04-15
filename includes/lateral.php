
      <!-- Barra Lateral -->
      <aside id="sidebar">

      <!-- Buscado -->

      <div id="buscador" class="bloque">
       <h3>Buscar</h3>

       <form action="buscar.php" method="POST">
             <input type="text" name="busqueda" />
 
             <input type="submit" name="Buscar" />
       </form>
    </div>


      <?php if(isset($_SESSION['usuario'])) :?>
        <div id="usuario-logueado" class="bloque">
          <h3>Bienvenido,<?=$_SESSION['usuario']['nombre'].' '.$_SESSION['usuario']['apellidos']; ?></h3>
          <!-- Botones  -->
          <a href="crear-categoria.php" class="boton boton-verde">Crear Categoria</a>
          <a href="crear-entradas.php" class="boton boton-azul">Crear Entradas</a>
          <a href="mis-datos.php" class="boton boton-naranja">Mis datos</a>
          <a href="cerrar.php" class="boton boton-rojo">Cerrar Sesion</a>

        </div>
         <?php endif; ?>
 
   <?php if(!isset($_SESSION['usuario'])): ?>

    <div id="login" class="bloque">
       <h3>Identificate</h3>
       <?php if(isset($_SESSION['error_datos'])) :?>
   <div  class="alerta alerta-error"><h3><?=$_SESSION['error_datos'];?></h3></div>           
            <?php elseif(isset($_SESSION['error_login'])) :?>
   <div  class="alerta alerta-error"><h3><?=$_SESSION['error_login'];?></h3></div>           
            <?php endif; ?>

       <form action="login.php" method="POST">
             <label for="email">Email</label>
             <input type="email" name="email" />

             <label for="password">Contraseña</label>
             <input type="password" name="password" />
 
             <input type="submit" value="Entrar" name="submit" />
       </form>
    </div>


    <div id="register" class="bloque">
          <h3>Registrate</h3>
          <?php if(isset($_SESSION['exito'])) :?>
             <div class="alerta alerta-exito"><?= $_SESSION['exito'];?></div>   
          <?php elseif(isset($_SESSION['error']['general'])) : ?>
             <div class="alerta alerta-error"><?= $_SESSION['error']['general'];?></div>
          <?php endif; ?>

          <form action="registro.php" method="POST">
             <label for="nombre">Nombre</label>
             <input type="text" name="nombre" />

       <?php echo isset($_SESSION['error']) ? mostrarError($_SESSION['error'],'nombre') : ' '; ?>          

             <label for="apellido">Apellido</label>
             <input type="text" name="apellido" />

       <?php echo isset($_SESSION['error']) ? mostrarError($_SESSION['error'],'apellido') : ' '; ?>          

             <label for="email">Email</label>
             <input type="email" name="email" />

       <?php echo isset($_SESSION['error']) ? mostrarError($_SESSION['error'],'email') : ' '; ?>          

             <label for="password">Contraseña</label>
             <input type="password" name="password" />

       <?php echo isset($_SESSION['error']) ? mostrarError($_SESSION['error'],'contraseña') : ' '; ?>         

             <input type="submit" name="submit" value="Registrar" />
          </form>
       <?php  borrarErrores(); ?>
    </div>
          <?php endif; ?>
</aside>
       <!-- Final Lateral -->