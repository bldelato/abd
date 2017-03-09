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
    <title>BIBLIOTECA</title>
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
                  <li class="active"><a href="Practica.php">Home</a></li>
                  <li><a href="Horarios.html">Horarios</a></li>
                  <li><a href="Compra.php">Compra</a></li>
                  <li><a href="Usuarios.php">Usuario</a></li>
                  <li><a href="Login.php">Log in</a></li>
              </ul>
          </div>
      </div>
  </nav><br><br><br>
  <div class="container-fluid">
    <h1 class="text-center" style="color:powderblue;"><strong> Bienvenido a la Biblioteca Interactiva</strong></h1>
    <div class="jumbotron"><p> En esta página tienes todo lo que te puede interesar sobre nuestra Biblioteca, además de un formulario para
      hacerte <a href="Usuarios.php">socio</a>!
      <pre>Contamos con una gran selección de libros de todos los estilos y tiempos, y te damos la posibilidad de que aportes tu granito de arena a nuestra
        colección <a href="Compra.php">aquí</a>.</pre>
    </div>
  </div>
</body>
  </html>
