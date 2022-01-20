<?php
    require 'config.php';
    $listClientes = [];
    $listContratos = [];
    $sqlClientes = $pdo->query("SELECT * FROM cliente");
    $sqlContratos = $pdo->query("SELECT * FROM contrato WHERE DC_STATUS = 'A'");

    if($sqlClientes -> rowCount() > 0){
        $listClientes = $sqlClientes -> FetchAll(PDO::FETCH_ASSOC);
        $listContratos = $sqlContratos -> FetchAll(PDO::FETCH_ASSOC);
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
    <title>Prova - Inter Construtora</title>
    <link href="assets/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="assets/css/painel.min.css" rel="stylesheet">
</head>
<body id="page-top">
    <div id="wrapper">
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mt-3 mb-0 text-gray-800">Dashboard</h1>
                    </div>
                    <div class="row">
                        <div class="col-xl-6 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <a href="cadastrarCliente.php" class="text-xs font-weight-bold text-primary text-uppercase mb-1 stretched-link">Novo Cliente</a>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-plus fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <a href="consulta.php" class="text-xs font-weight-bold text-primary text-uppercase mb-1 stretched-link">Consultas</a>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-plus fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12 col-lg-12">
                            <div class="card shadow mb-4">
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Clientes cadastrados</h6>
                                </div>
                                <div class="card-body">
                                    <div class="pt-1 pb-2">
                                        <table class="table table-hover text-center">
                                            <thead>
                                                <tr>
                                                    <th scope="col">ID</th>
                                                    <th scope="col">Nome</th>
                                                    <th scope="col">CPF</th>
                                                    <th scope="col">Telefone</th>
                                                    <th scope="col">E-mail</th>
                                                    <th scope="col">Município</th>
                                                    <th scope="col">Data de Registro</th>
                                                    <th scope="col">Ações</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($listClientes as $cliente): ?>
                                                    <tr>
                                                        <td> <?=$cliente['CD_CLIENTE'];?> </td>
                                                        <td><?=$cliente['NM_CLIENTE'];?></td>
                                                        <td><?=$cliente['DC_CPF'];?></td>
                                                        <td><?=$cliente['DC_TELL'];?></td>
                                                        <td><?=$cliente['DC_EMAIL'];?></td>
                                                        <td><?=$cliente['NM_MUNICIPIO'];?></td>
                                                        <td><?=$cliente['DT_RGST'];?></td>
                                                        <td>
                                                            <a class="btn btn-warning btn-send" name="CD_CLIENTE" href="editarCliente.php?CD_CLIENTE=<?=$cliente['CD_CLIENTE'];?>">Editar</a>
                                                            <a class="btn btn-danger btn-send" name="CD_CLIENTE" href="deletarCliente.php?CD_CLIENTE=<?=$cliente['CD_CLIENTE'];?>">Excluir</a>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-lg-12">
                            <div class="card shadow mb-4">
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Contratos ativos</h6>
                                </div>
                                <div class="card-body">
                                    <div class="pt-4 pb-2">
                                        <table class="table table-hover text-center">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">ID</th>
                                                        <th scope="col">Valor Contrato</th>
                                                        <th scope="col">Data de Assinatura</th>
                                                        <th scope="col">Data de Ínicio</th>
                                                        <th scope="col">Data de Fim</th>
                                                        <th scope="col">Status</th>
                                                        <th scope="col">Ações</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach($listContratos as $contrato): ?>
                                                        <tr>
                                                            <td><?=$contrato['CD_CONTRATO'];?></td>
                                                            <td><?=$contrato['VR_CONTRATO'];?></td>
                                                            <td><?=$contrato['DT_ASS'];?></td>
                                                            <td><?=$contrato['DT_INICIO'];?></td>
                                                            <td><?=$contrato['DT_FIM'];?></td>
                                                            <td><?=$contrato['DC_STATUS'];?></td>
                                                            <td>
                                                                <a class="btn btn-warning btn-send" href="editarContrato.php?CD_CONTRATO=<?=$contrato['CD_CONTRATO'];?>">Editar</a>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
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