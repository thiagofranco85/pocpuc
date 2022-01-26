<?php 

session_start();

if( ! $_SESSION['usuario'] ){ 
     
    session_destroy();
    header('Location: /poc/login.php');
    exit;
    
}

if( isset($autentica_tipo_usuario) ){
    if( ! in_array( $_SESSION['usuario']['tipo'], $autentica_tipo_usuario) ){
        header('Location: /poc/painel.php');
    exit;
    }
 }