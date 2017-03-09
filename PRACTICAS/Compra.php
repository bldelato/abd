<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$db = mysqli_connect('localhost', 'root', '1234', 'biblioteca');
if(!$db){
  die('Error al conectarse con la base de datos');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>BIBLIOTECA-Compra</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
  <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
          <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
              <a class="navbar-brand" href="Practica.php">BIBLIOTECA</a>
          </div>
          <div class="collapse navbar-collapse" id="myNavbar">
              <ul class="nav navbar-nav">
                  <li><a href="Practica.php">Home</a></li>
                  <li><a href="Horarios.html">Horarios</a></li>
                  <li class="active"><a href="Compra.php">Compra</a></li>
                  <li><a href="Usuarios.php">Usuario</a></li>
                  <li><a href="Login.php">Log in</a></li>
              </ul>
          </div>
      </div>
  </nav>
  <div class="container-fluid" style="margin-top:60px">

  <?php
  if(!empty($_POST['titulo']) && !empty($_POST['autor']) && !empty($_POST['tema']) && !empty($_POST['publrecom']) && !empty($_POST['unidades'])):
    echo '¡Muchas gracias por tu solicitud! Será tramitada.';

else:
  ?>
  <form action="Compra.php" method="post">
    <!--Título - text -->
     <div class="form-group">
       <label for="titulo">Título:</label>
       <input type="text" name="titulo" class="form-control" id="titulo" required>
     </div>
     <!--Autor - text -->
      <div class="form-group">
        <label for="autor">Autor:</label>
        <input type="text" name="autor" class="form-control" id="autor" required>
      </div>
      <!--Tema - text -->
       <div class="form-group">
         <label for="tema">Tema:</label>
         <input type="text" name="tema" class="form-control" id="tema" required>
       </div>
     <!--Tipo de publico - radio buttons -->
     <label>Tipo de público:</label>
      <br>
      <div class="radio">
        <label><input type="radio" name="publrecom" value="adulto">Adulto</label>
      </div>
      <div class="radio">
          <label><input type="radio" name="publrecom" value="infantil">Infantil</label>
        </div>
    <!--Unidades - number -->
    <div class="form-group">
      <label for="unidades">Unidades:</label>
      <input style="max-width:100px" type="number" name="unidades" class="form-control" id="tema" required>
    </div>
    <button type="submit" class="btn btn-default">Enviar</button>
  </form>
  <?php
endif;
  ?>
  </div>
</body>
</html>
