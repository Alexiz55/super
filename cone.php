<?php
function conecta(){
    $servidor = mysqli_connect("localhost","root","");
    mysqli_select_db($servidor,"supermercado");
    return $servidor;
}
?>