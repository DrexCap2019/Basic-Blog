<?php require_once 'conexion.php'; ?>
<?php require_once 'helpers.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog de Videojuegos</title>

    <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>

     <!-- Cabecera -->
    <header id="cabecera">

        <!-- Inicio logo  -->
      <div id="logo">
          <a href="index.php">Blog de VideoJuegos</a>
      </div>
        <!-- Fin logo -->

     <!-- Menu -->    
      <nav id="menu">
          <ul>
              <li><a href="index.php">Incio</a></li>
              <?php $categorias = getCategorias();
            
             while($categoria = mysqli_fetch_assoc($categorias)) : ?>
               
         <li><a href="categoria.php?id=<?= $categoria['id']?>"><?= $categoria['nombre']?></a></li>
 
             <?php  endwhile; ?>
             
              <li><a href="index.php">Sobre mi</a></li>
              <li><a href="index.php">Contacto</a></li>
          </ul>
      </nav>
      <!-- Fin Menu -->
       
        <div class="clearfix"></div>

    </header>
      <!-- Fin cabecera -->

      <div id="contenedor">