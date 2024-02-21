<?php
$link= mysqli_connect('localhost','root','
')
or die ('No se pudo conectar: ' . mysqli_error());
echo 'connected succefullly';
mysqli_select_db($link,'pizzeria');
?>

<?php

