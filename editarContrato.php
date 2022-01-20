<?php
     require 'config.php';
    $contrato = [];
    $CD_CONTRATO = filter_input(INPUT_GET, 'CD_CONTRATO');
    if($CD_CONTRATO){
        $sql = $pdo -> prepare("SELECT * FROM cliente
        INNER JOIN assc_contrato_cliente ON assc_contrato_cliente.CD_CLIENTE = cliente.CD_CLIENTE
        INNER JOIN contrato ON assc_contrato_cliente.CD_CONTRATO = contrato.CD_CONTRATO
        WHERE contrato.CD_CONTRATO = :CD_CONTRATO ");
        $sql -> bindValue(':CD_CONTRATO',$CD_CONTRATO);
        $sql -> execute();

        if($sql->rowCount() > 0){
            $contrato = $sql -> fetch(PDO::FETCH_ASSOC);
        }else{
            header("Location: index.php");
            exit;
        }
    }else{
        header("Location: index.php");
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Prova Crud - Desenvolvedor PHP">
    <meta name="author" content="22hawk">
    <title>Editar Contrato - Inter Construtora</title>
    <link href="assets/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="assets/css/painel.min.css" rel="stylesheet">
</head>
<body id="page-top">
    <div id="wrapper">
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-center mb-4">
                        <h1 class="h3 mt-3 mb-0 text-gray-800 ">Editar Contrato</h1>
                    </div>
                    <div class="row">
                        <div class=" mx-auto">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center">
                                    <form action="action_editar_contrato.php" method="POST">
                                        <div class="controls">
                                            <!-- TABELA CONTRATO -->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group"><label for="formValorCt">Valor contrato</label>
                                                        <input id="formValorCt" type="text" name="VR_CONTRATO" class="form-control" value="<?=$contrato['VR_CONTRATO']; ?>" required=" required" data-error="Campo necessário."/>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group"><label for="formDtAss">Data da assinatura</label>
                                                        <input id="formDtss" type="date" name="DT_ASS" class="form-control" value="<?=$contrato['DT_ASS']; ?>" required=" required" data-error="Campo necessário."/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group"><label for="formDtIn">Data de ínico</label>
                                                        <input id="formDtIn" type="date" name="DT_INICIO" class="form-control" value="<?=$contrato['DT_INICIO']; ?>" required=" required" data-error="Campo necessário."/>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group"><label for="formDtFim">Data de fim</label>
                                                        <input id="formDtFim" type="date" name="DT_FIM" class="form-control" value="<?=$contrato['DT_FIM']; ?>" required=" required" data-error="Campo necessário."/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group"><label for="formDesc">Descrição do Status</label>
                                                        <select class="form-select form-control form-select-lg mb-3" id="formDesc" name="DC_STATUS" required=" required" data-error="Campo necessário.">
                                                            <?php
                                                                if($contrato["DC_STATUS"] == "A"){
                                                                    echo "<option value=".$contrato["DC_STATUS"]." selected>Ativo</option>";
                                                                    echo "<option value='D'>Distratado</option>";
                                                                }else{
                                                                    echo "<option value=".$contrato["DC_STATUS"]." selected>Distratado</option>";
                                                                    echo "<option value='A'>Ativo</option>";
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <a class="btn btn-info mb-3 btn-block" data-toggle="collapse" href="#clienteStatus" role="button" aria-expanded="false" aria-controls="clienteStatus">
                                                        Exibir informações do cliente vinculado
                                                    </a>
                                                </div>
                                            </div>
                                            <!-- TABELA CLIENTE -->
                                            <div id="clienteStatus" class="collapse multi-collapse">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group"><label for="formNome">Nome *</label>
                                                            <input id="formNome" type="text" name="NM_CLIENTE" class="form-control" value="<?=$contrato['NM_CLIENTE']; ?>" readonly/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group"><label for="formCPF">CPF *</label>
                                                            <input id="formCPF" type="text" name="DC_CPF" class="form-control" value="<?=$contrato['DC_CPF']; ?>" readonly/>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group"><label for="formTelefone">Telefone *</label>
                                                            <input id="formTelefone" type="text" name="DC_TELL" class="form-control" value="<?=$contrato['DC_TELL']; ?>" readonly/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group"><label for="formEmail">Email *</label>
                                                            <input id="formEmail" type="text" name="DC_EMAIL" class="form-control" value="<?=$contrato['DC_EMAIL']; ?>" readonly/>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group"><label for="formMunc">Município *</label>
                                                            <input id="formEmail" type="text" name="CD_MUNICIPIO" class="form-control" value="<?=$contrato['NM_MUNICIPIO']; ?>" readonly/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group"><label for="formDtReg">Data de Registro</label>
                                                            <input id="formDtReg" type="date" readonly name="#" class="form-control" value="<?=$contrato['DT_RGST']; ?>"/>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group"><label for="formCodCliente">Código Cliente *</label>
                                                            <input id="formCodCliente" type="text" name="CD_CLIENTE" class="form-control" value="<?=$contrato['CD_CLIENTE']; ?>" readonly/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <input type="hidden" name="CD_CONTRATO" value="<?=$contrato["CD_CONTRATO"]; ?>"/>
                                                    <input type="submit" class="btn btn-success btn-send pt-2 btn-block" value="Atualizar"/>
                                                </div>
                                                <div class="col-md-12 mt-3">
                                                    <a href="index.php" class="btn btn-warning btn-send pt-2 btn-block">Cancelar</a>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-body">
                                    <div class="pt-4 pb-2">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>@22hawk</span>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/jquery.easing.min.js"></script>
</body>
</html>