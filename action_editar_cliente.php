<?php
    require 'config.php';
    $CD_CLIENTE = filter_input(INPUT_POST, 'CD_CLIENTE');
    $NM_CLIENTE = filter_input(INPUT_POST,'NM_CLIENTE');
    $DC_CPF = filter_input(INPUT_POST,'DC_CPF');
    $DC_TELL = filter_input(INPUT_POST,'DC_TELL');
    $DC_EMAIL = filter_input(INPUT_POST,'DC_EMAIL');
    $ID_MUNICIPIO = filter_input(INPUT_POST,'ID_MUNICIPIO');
    $temp = explode(",",$ID_MUNICIPIO,2);
    $CD_MUNICIPIO_temp = $temp[0];
    $NM_MUNICIPIO_temp = $temp[1];
    $CD_MUNICIPIO = str_replace("{[","",$CD_MUNICIPIO_temp);
    $NM_MUNICIPIO = str_replace("]}","",$NM_MUNICIPIO_temp);

    if($CD_CLIENTE && $NM_CLIENTE && $DC_CPF && $DC_TELL && $DC_EMAIL && $CD_MUNICIPIO){
        $sql = $pdo -> prepare("UPDATE cliente SET NM_CLIENTE = :NM_CLIENTE,DC_CPF = :DC_CPF,DC_TELL = :DC_TELL,DC_EMAIL = :DC_EMAIL,CD_MUNICIPIO = :CD_MUNICIPIO,NM_MUNICIPIO = :NM_MUNICIPIO
        WHERE CD_CLIENTE = :CD_CLIENTE");
        $sql->bindValue(':NM_CLIENTE',$NM_CLIENTE);
        $sql->bindValue(':DC_CPF',$DC_CPF);
        $sql->bindValue(':DC_TELL',$DC_TELL);
        $sql->bindValue(':DC_EMAIL',$DC_EMAIL);
        $sql->bindValue(':CD_MUNICIPIO',$CD_MUNICIPIO);
        $sql->bindValue(':NM_MUNICIPIO',$NM_MUNICIPIO);
        $sql->bindValue(':CD_CLIENTE', $CD_CLIENTE);
        $sql->execute();
        header("Location: index.php");
        exit;
    }else{
        header("Location: index.php");
        exit;
    }
?>