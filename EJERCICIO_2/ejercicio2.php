<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);



$db = mysqli_connect('localhost', 'root', '1234', 'libreria');
if(!$db){
  die('Error al conectarse con la base de datos');
}
?>

<!DOCTYPE html>
<html>
<body>

<form action="ejercicio2.php" method="POST">
  <h1>FORMULARIO</h1>
  Categoria: <br>
  <select name="categoria">
    <?php
    $sql = "SELECT * FROM categoria";
    $consulta = mysqli_query($db, $sql);
    while($fila = mysqli_fetch_row($consulta)){
      echo '<option value="'.$fila[0].'">'.$fila[0].'</option>';
    //<option value="belico">Belico</option>
  }
    ?>
  </select><br><br>
  Precio minimo: <br>
  <input type="text" name="minprice" value=""><br><br>
  Precio maximo:<br>
  <input type="text" name="maxprice" value=""><br><br>
  <button type="submit" class="btn btn-default">Enviar</button><br><br>
</form><br><br><br>
<?php
if(!empty($_POST['categoria']) && !empty($_POST['minprice']) && !empty($_POST['maxprice'])){
  $categoria = $_POST['categoria'];
  $minprice = $_POST['minprice'];
  $maxprice = $_POST['maxprice'];
  $sql = "SELECT * FROM libros WHERE categoria='$categoria' AND precio<'$maxprice' AND precio>'$minprice'";
  $consulta = mysqli_query($db, $sql);
  echo '<table border=1>';
  echo '<th style="color:blue;">TITULO</th><th style="color:blue;">PRECIO</th>';
  while($fila = mysqli_fetch_row($consulta)){
    echo '<tr style="color:green;"><td>'.$fila[0].'</td><td>'.$fila[2].'</td></tr>';
  }
  echo '</table>';
}
?>
</body>
</html>
