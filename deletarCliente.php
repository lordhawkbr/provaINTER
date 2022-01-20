<?php
    require 'config.php';
    $CD_CLIENTE = filter_input(INPUT_GET, 'CD_CLIENTE');

    if($CD_CLIENTE){
        $sql = $pdo -> prepare("SET SQL_SAFE_UPDATES = 0;SET FOREIGN_KEY_CHECKS = 0;
        DELETE acc,ct,cc
        FROM assc_contrato_cliente acc
        JOIN contrato ct ON ct.CD_CONTRATO = acc.CD_CONTRATO
        JOIN cliente cc ON cc.CD_CLIENTE = acc.CD_CLIENTE
        WHERE acc.CD_CLIENTE = :CD_CLIENTE;
        ");
        $sql->bindValue(':CD_CLIENTE', $CD_CLIENTE);
        $sql->execute();

        header("Location: index.php");
        exit;
    }else{
        header("Location: index.php");
        exit;
    }
?>