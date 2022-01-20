<?php
    require 'config.php';

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

    $DT_RGST = date('Ymd');

    // TABELA CONTRATO
    $VR_CONTRATO = filter_input(INPUT_POST,'VR_CONTRATO');
    $DT_ASS = filter_input(INPUT_POST,'DT_ASS');
    $DT_INICIO = filter_input(INPUT_POST,'DT_INICIO');
    $DT_FIM = filter_input(INPUT_POST,'DT_FIM');
    $DC_STATUS = filter_input(INPUT_POST,'DC_STATUS');

    if($NM_CLIENTE && $DC_EMAIL){
        $sql = $pdo->prepare("SELECT * FROM cliente WHERE DC_EMAIL = :DC_EMAIL");
        $sql->bindValue(':DC_EMAIL',$DC_EMAIL);
        $sql->execute();

        try {
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->beginTransaction();

            $sql_cliente = "INSERT INTO `cliente` (NM_CLIENTE,DC_CPF,DC_TELL,DC_EMAIL,CD_MUNICIPIO,NM_MUNICIPIO,DT_RGST)
            VALUES ('$NM_CLIENTE','$DC_CPF','$DC_TELL','$DC_EMAIL','$CD_MUNICIPIO','$NM_MUNICIPIO','$DT_RGST')";
            $pdo->exec($sql_cliente);
            $lastIDCliente = $pdo->lastInsertId();
            if(!empty($lastIDCliente)){
                $sql_contrato = "INSERT INTO `contrato` (VR_CONTRATO,DT_ASS,DT_INICIO,DT_FIM,DC_STATUS,DT_RGST)
                VALUES ('$VR_CONTRATO','$DT_ASS','$DT_INICIO','$DT_FIM','$DC_STATUS','$DT_RGST')";
                $pdo->exec($sql_contrato);
                $lastIDContrato = $pdo->lastInsertId();
                $sql_assoc = "INSERT INTO `assc_contrato_cliente` (CD_CONTRATO,CD_CLIENTE,DT_RGST) VALUES ('$lastIDContrato','$lastIDCliente','$DT_RGST')";
                $pdo->exec($sql_assoc);
            }
            $pdo->commit();
            header("Location: index.php");
            exit;
        } catch (Exception $e) {
            $pdo->rollBack();
            echo "Ocorreu algum erro!".$e->getMessage();
        }
    }else{
        header("Location: cadastrarCliente.php");
        exit;
    }
?>
