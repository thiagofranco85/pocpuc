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
    
    $result = salvar( $id, $nome, $dataInicio, $dataValidade, $status, $obs, $valor, $orgao );

    session_start();

    if( $result ){
        unset($_SESSION['erro_cadastrar_processo_ambiental']);
        header('Location: ../listar-processos-ambientais.php');
    }else{               
        $_SESSION['erro_cadastrar_processo_ambiental'] = "Ocorreu um erro ao salvar os dados!";
        header('Location: ../cadastrar-processo-ambiental.php');
    }
}


function select( $id = null ){
    
    $sql = "select * from processo_ambiental ";

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


function salvar( $id = null, $nome, $dataInicio, $dataValidade, $status, $obs, $valor, $orgao ){
    
    $nome = addslashes($nome);
    $status = addslashes($status);
    $orgao = addslashes($orgao);
    $obs = addslashes($obs);


    if( $id ){

        $sql = "update processo_ambiental set id = '$id', nome = '$nome', 
        dataInicio = '$dataInicio', dataValidade ='$dataValidade',
        status = '$status', obs = '$obs', valor = '$valor', orgao = '$orgao' where id = '$id'";
        
    }else{

        $sql = "insert into processo_ambiental 
        (nome, dataInicio, dataValidade, status, obs, valor, orgao) values
        ('$nome','$dataInicio','$dataValidade','$status','$obs','$valor', '$orgao')";

    }

    $result = mysqli_query($GLOBALS["con"], $sql);

    return $result;
}

function excluir( $id ){
     

    if( $id ){

        $sql = "delete from processo_ambiental where id = '$id'";
        
        $result = mysqli_query($GLOBALS["con"], $sql);

        return $result;
    } 

    
}



