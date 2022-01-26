<?php

require_once 'conecta.php';


if( $_POST && $_POST['acao'] == 'excluir'){

    extract($_POST);

    $id = $id == "" ? null : $id;
    
    $result = excluir( $id );

    die($result);
   
}

if( $_POST && $_POST['acao'] == 'salvar'){

    extract($_POST);

    $id = $id == "" ? null : $id;    

    if( $id == null && ($senha != $confirmarSenha) ){       
        session_start();
        $_SESSION['erro_cadastrar_usuario'] = "As senhas não conferem!";
        header('Location: ../cadastrar-usuario.php');
        exit;
    }elseif( $senha == null || $confirmarSenha == ''){
        session_start();
        $_SESSION['erro_cadastrar_usuario'] = "As senhas não podem ser nulas!";
        header("Location: ../cadastrar-usuario.php?id=$id");
        exit;
    }else{
        if( isset($_SESSION['erro_cadastrar_usuario'])){
            unset($_SESSION['erro_cadastrar_usuario']);
        }        
    }
    
    $result = salvar( $id, $nome, $email, $senha, $status, $tipo );

    session_start();

    if( $result ){
        if( isset($_SESSION['erro_cadastrar_usuario']) ){
            unset($_SESSION['erro_cadastrar_usuario']);
        }
        
        header('Location: ../listar-usuario.php');
    }else{               
        $_SESSION['erro_cadastrar_usuario'] = "Ocorreu um erro ao salvar os dados!";
        header('Location: ../cadastrar-usuario.php');
    }
}

function select( $id = null ){
    
    $sql = "select * from usuario ";

    if( $id ){
        $sql .= " where id = $id";
    }

    $result = mysqli_query($GLOBALS["con"], $sql);

    $arr = [];
    while( $row = mysqli_fetch_assoc($result) ){
        $arr[] = $row;
    }

    return $arr;
}

function salvar( $id = null, $nome, $email, $senha, $status, $tipo ){
    
    $nome = addslashes($nome);
    $email = addslashes($email);    
    $senha = addslashes(md5($senha));
    $status = addslashes($status);
    $tipo = addslashes($tipo);

    if( $id ){

        $sql = "update usuario set id = '$id', nome = '$nome', 
        email = '$email', senha ='$senha',
        status = '$status', tipo = '$tipo' where id = '$id'";
        
    }else{

        $sql = "insert into usuario 
        (nome, email, senha, status, tipo) values
        ('$nome','$email','$senha','$status','$tipo')";

    }

    $result = mysqli_query($GLOBALS["con"], $sql);

    return $result;
}

function excluir( $id ){
     

    if( $id ){

        $sql = "delete from usuario where id = '$id'";
        
        $result = mysqli_query($GLOBALS["con"], $sql);

        return $result;
    } 

    
}


 