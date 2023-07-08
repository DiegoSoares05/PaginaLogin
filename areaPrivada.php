<?php
    session_start();
    if(!isset($_SESSION['id_usuario'])){
        header("location: index.php");
        exit;
    }
?>

<h1>SEJA BEM VINDO!!!!</h1>
<a href="sair.php">SAIR</a><br>

