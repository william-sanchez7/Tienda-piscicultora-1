<?php
    
    $KEY="systemfish_2021";
    $COD="AES-128-ECB";// TIPO DE ENCRIPTACIÓN

    $SERVER="localhost";
    $USER="root";
    $PASSWORD="";
    $BD="system_fish";
    $server="mysql:dbname=".$BD.";host=".$SERVER;
    
    try{
        $pdo = new PDO($server,$USER,$PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));
    }catch(PDOException $e){
        echo "<script> alert('error al conectar a la bd'); </script>";
    }

?>