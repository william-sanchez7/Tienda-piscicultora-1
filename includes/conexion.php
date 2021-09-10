<?php
    include('config.php');
    $server="mysql:dbname=".$BD.";host=".$SERVER;
    // CREA UNA VARIABLE PDO PARA LA CONEXION
    try{
        $pdo= new PDO($server,$USER,$PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));
    }catch(PDOException $e){
        echo "<script> alert('error'); </script>";
    }
?>