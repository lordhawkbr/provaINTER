<?php
    require 'config.php';
    $CD_CONTRATO = filter_input(INPUT_POST,'CD_CONTRATO');
    $VR_CONTRATO = filter_input(INPUT_POST,'VR_CONTRATO');
    $DT_ASS = filter_input(INPUT_POST,'DT_ASS');
    $DT_INICIO = filter_input(INPUT_POST,'DT_INICIO');
    $DT_FIM = filter_input(INPUT_POST,'DT_FIM');
    $DC_STATUS = filter_input(INPUT_POST,'DC_STATUS');

    if($VR_CONTRATO && $DT_ASS && $DT_INICIO && $DT_FIM && $DC_STATUS){
        $sql = $pdo -> prepare("UPDATE contrato SET VR_CONTRATO = :VR_CONTRATO,DT_ASS = :DT_ASS,DT_INICIO = :DT_INICIO,DT_FIM = :DT_FIM,DC_STATUS = :DC_STATUS
        WHERE CD_CONTRATO = :CD_CONTRATO");

        $sql->bindValue(':VR_CONTRATO',$VR_CONTRATO);
        $sql->bindValue(':DT_ASS',$DT_ASS);
        $sql->bindValue(':DT_INICIO',$DT_INICIO);
        $sql->bindValue(':DT_FIM',$DT_FIM);
        $sql->bindValue(':DC_STATUS',$DC_STATUS);
        $sql->bindValue(':CD_CONTRATO',$CD_CONTRATO);

        $sql->execute();
        header("Location: index.php");
        exit;
    }else{
        header("Location: index.php");
        exit;
    }
?>