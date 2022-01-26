<?php

require_once 'conecta.php';

function autentica( $email, $senha ){
    $email = addslashes($email);
    $senha = addslashes(md5($senha));
    $sql = "select * from usuario where email = '$email' and senha = '$senha' and status = 'Ativo' limit 1";

    $result = mysqli_query($GLOBALS["con"], $sql);

    $arr = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $arr[] = $row;
    }

    return $arr[0];
}