<?php

require_once __DIR__ . '/funcoes-autenticacao.php';


if( $_POST && $_POST['acao'] = 'autentica' ){
    
    extract($_POST);

    $usuario = autentica($email, $senha);
 
    session_start();
    if( $usuario ){
        unset($_SESSION['erro_login']);
        $_SESSION['usuario'] = $usuario;
        header('Location: ../painel.php');
    }else{
        $_SESSION['erro_login'] = "Email e/ou senha inválidos!";
        unset($_SESSION['usuario']);
        header('Location: ../login.php');
        exit;
    }

}


if( $_GET && $_GET['acao'] = 'sair' ){    
 
    session_start();     
    
    if( $_SESSION ){
        session_destroy();
    }
    header("Location: ../login.php");
    exit;
  

}

 