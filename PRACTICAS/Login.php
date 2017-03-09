<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$db = mysqli_connect('localhost', 'root', '1234', 'biblioteca');
if(!$db){
  die('Error al conectarse con la base de datos');
}
function mostrar_formulario(){

  echo '
  <form method="POST">
      <div class="container-fluid">
  <!--Id - text -->
   <div class="form-group">
     <label for="name">Usuario:</label>
     <input type="text" name="name" class="form-control" id="name" required>
   </div>
   <!--Password - text -->
    <div class="form-group">
      <label for="password">Contraseña:</label>
      <input type="password" name="password" class="form-control" id="password" required>
    </div>
    <button type="submit" class="btn btn-default">Log in</button><br><br>
    </div>
    </form>';


}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>BIBLIOTECA-Log in</title>
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
                  <li><a href="Usuarios.php">Usuario</a></li>
                  <li class="active"><a href="Login.php">Log in</a></li>
              </ul>
          </div>
      </div>
  </nav><br><br><br>
  <?php
  if(empty($_POST['name']) || empty($_POST['password'])){
      mostrar_formulario();
  }
  else{
    $name = $_POST['name'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM usuarios WHERE id='$name'";
    $consulta = mysqli_query($db, $sql);
    $fila = mysqli_fetch_row($consulta);
    if(!$fila){
      mostrar_formulario();
      echo '<br><div class="container-fluid"><p class="text-danger">    Lo sentimos, pero ese usuario no existe. Por favor, prueba de nuevo.</p></div>';
    }
    else {
      if($password == $fila[1]){
      echo '<div class="container-fluid"> <h2 class="text-center" style="color:powderblue;"><strong>Bienvenido, '.ucfirst($name).'!</strong></h2>
        Estos son los libros que tienes prestados:<br><br>';
        echo '<table style="max-width:1000px" class="table table-striped table-hover table-condensed table-responsive">
          <thead>
              <tr>
                <th>Título</th>
                <th>Autor</th>
                <th>Desde</th>
              </tr>
          </thead>
          <tbody>';
          $sql = "SELECT DISTINCT libros.titulo, libros.autor, prestamos.fechainicio FROM libros, prestamos, usuarios WHERE prestamos.titulo = libros.titulo AND prestamos.idusuario = '$name' ";
          $consulta = mysqli_query($db, $sql);
          while($fila = mysqli_fetch_row($consulta)){
            echo '  <tr>
                <td>'.$fila[0].'</td>
                <td>'.$fila[1].'</td>
                <td>'.$fila[2].'</td>
              </tr>';
            }
        echo '  </tbody>
        </table></div>';
      }
      else{
        mostrar_formulario();
        echo '<br><div class="container-fluid"><p class="text-danger">    Lo sentimos, pero esa no es la contraseña correcta. Por favor, prueba de nuevo.</p></div>';
      }
    }
  }



  ?>
 </body>
</html>
