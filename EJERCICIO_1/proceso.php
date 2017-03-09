<?php
echo '<pre>', print_r($_POST, true), '</pre>';
if($_POST["cafeote"]== "C"){echo "Café";}
elseif($_POST["cafeote"]== "T"){echo "Té";}
echo '<br><br>';
echo $_POST["nom"];
 ?>
