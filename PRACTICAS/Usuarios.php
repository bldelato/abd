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
    <title>BIBLIOTECA-Usuario</title>
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
                  <li><a href="Compra.php">Compra</a></li>
                  <li class="active"><a href="Usuarios.php">Usuario</a></li>
                  <li><a href="Login.php">Log in</a></li>
              </ul>
          </div>

  </nav>
  <div class="container-fluid" style="margin-top:60px">
  <form action="Usuarios.php" method="post">
    <h2>ALTA DE LIBROS</h2>
    Rellena este formulario si quieres añadir un libro a nuestra <a href="practica1.php">Biblioteca</a>.<br><br>
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
      <!--Número de edición - number -->
       <div class="form-group">
         <label for="numedition">Número de edición:</label>
         <input type="number" style="max-width:300px" name="numedition" class="form-control" id="numedition" required>
       </div>
      <!--Tema - text -->
      <label>Tema:</label>
      <select name="tema">
        <?php
        $sql = "SELECT DISTINCT tema FROM libros";
        $consulta = mysqli_query($db, $sql);
        while($fila = mysqli_fetch_row($consulta)){
          echo '<option value="'.$fila[0].'">'.$fila[0].'</option>';
      }
        ?>
      </select>
        <br><br>
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
  <form action="Usuarios.php" method="post">
    <h2>ALTA DE USUARIO</h2>
    Rellena este formulario si quieres darte de alta como usuario en nuestra <a href="practica1.php">Biblioteca</a>.<br><br>
    <!--Id - text -->
     <div class="form-group">
       <label for="name">Nombre:</label>
       <input type="text" name="name" class="form-control" id="name" required>
     </div>
     <!--Password - text -->
      <div class="form-group">
        <label for="password">Contraseña:</label>
        <input type="password" name="password" class="form-control" id="password" required>
      </div>
     <!--Tipo de publico - radio buttons -->
     <label>Tipo de público:</label>
      <br>
      <div class="radio">
        <label><input type="radio" name="tipo" value="adulto">Adulto</label>
      </div>
      <div class="radio">
          <label><input type="radio" name="tipo" value="infantil">Infantil</label>
      </div>
      <button type="submit" class="btn btn-default">Enviar</button><br><br>
    </form>
      </div>
  </body>
</html>
<?php
if(!empty($_POST['name']) && !empty($_POST['password']) && !empty($_POST['tipo'])){
  $name = $_POST['name'];
  $type = $_POST['tipo'];
  $password = $_POST['password'];
  $sql = "SELECT * FROM usuarios WHERE id='$name'";
  $consulta = mysqli_query($db, $sql);
  $fila = mysqli_fetch_row($consulta);
  if(!$fila[0]){
    $sql = "INSERT INTO `usuarios` (`id`, `password`, `tipo`, `sanciones`) VALUES ('$name', '$password', '$type', '0');";
    $consulta = mysqli_query($db, $sql);
  } else {
    echo '<br><div class="container-fluid"><p class="text-danger">    Lo sentimos, pero ese nombre ya ha sido escogido. Por favor, prueba de nuevo.</p></div>';
  }
}

  if(!empty($_POST['titulo']) && !empty($_POST['autor']) && !empty($_POST['numedition']) && !empty($_POST['tema']) && !empty($_POST['publrecom']) && !empty($_POST['unidades'])){
  $autor = $_POST['autor'];
  $titulo = $_POST['titulo'];
  $numedition = $_POST['numedition'];
  $tema = $_POST['tema'];
  $publrecom = $_POST['publrecom'];
  $unidades = $_POST['unidades'];
  $sql = "SELECT titulo FROM libros WHERE titulo='$titulo'";
  $consulta = mysqli_query($db, $sql);
  $fila = mysqli_fetch_row($consulta);
  if(!$fila[0]){
    $sql = "INSERT INTO `libros` (`titulo`, `autor`, `numedition`, `tema`, `publrecom`, `unidades`) VALUES ('$titulo', '$autor', '$numedition', '$tema', '$publrecom', '$unidades');";
    $consulta = mysqli_query($db, $sql);
  } else {
    echo '<br><div class="container-fluid"><p class="text-danger">    Lo sentimos, pero este libro ya existe. Por favor, prueba de nuevo.</p></div>';
  }
}
?>
