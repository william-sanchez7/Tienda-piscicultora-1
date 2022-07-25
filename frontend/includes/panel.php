<?php 
    session_start();
    if(!isset($_SESSION['user'])){
        echo "redirigir al inicio";
    }else{
        print_r($_SESSION[['user']]);
    }
?>