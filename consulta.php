<?php
    require 'config.php';

    $listFiltro1 = [];
    $listFiltro2 = [];
    $listFiltro3 = [];
    $listClientes = [];
    $filterOption = filter_input(INPUT_GET, 'filterOption');
    $filterOption2 = filter_input(INPUT_GET,'filterOption2');

    if($filterOption && $filterOption2){
        switch ($filterOption) {
            case 'CD_CLIENTE':
            case 'DT_RGST':
                $sqlFilter = $pdo->query("SELECT * FROM cliente
                INNER JOIN assc_contrato_cliente ON assc_contrato_cliente.CD_CLIENTE = cliente.CD_CLIENTE
                INNER JOIN contrato ON assc_contrato_cliente.CD_CONTRATO = contrato.CD_CONTRATO
                ORDER BY cliente.$filterOption $filterOption2");
                break;
            case 'CD_CONTRATO':
            case 'VR_CONTRATO':
                $sqlFilter = $pdo->query("SELECT * FROM cliente
                INNER JOIN assc_contrato_cliente ON assc_contrato_cliente.CD_CLIENTE = cliente.CD_CLIENTE
                INNER JOIN contrato ON assc_contrato_cliente.CD_CONTRATO = contrato.CD_CONTRATO
                ORDER BY contrato.$filterOption $filterOption2");
                break;

            default:
                break;
        }
        if($sqlFilter -> rowCount() > 0){
            $listClientes = $sqlFilter -> FetchAll(PDO::FETCH_ASSOC);
        }
    }else{
        $sqlClientes = $pdo->query("SELECT * FROM cliente
            INNER JOIN assc_contrato_cliente ON assc_contrato_cliente.CD_CLIENTE = cliente.CD_CLIENTE
            INNER JOIN contrato ON assc_contrato_cliente.CD_CONTRATO = contrato.CD_CONTRATO");

        $filtro1 = $pdo->query("select count(CD_CLIENTE),NM_MUNICIPIO from cliente group by CD_MUNICIPIO order by count(CD_CLIENTE) desc");
        $filtro2 = $pdo->query("select * from contrato where DT_ASS between '2022-01-01' and '2022-12-31'");
        $filtro3 = $pdo->query("SELECT sum(contrato.vr_contrato),cliente.nm_municipio FROM cliente
        INNER JOIN assc_contrato_cliente ON assc_contrato_cliente.CD_CLIENTE = cliente.CD_CLIENTE
        INNER JOIN contrato ON assc_contrato_cliente.CD_CONTRATO = contrato.CD_CONTRATO
        where contrato.dc_status = 'A' group by cliente.nm_municipio order by sum(contrato.vr_contrato) desc;");


        if($sqlClientes -> rowCount() > 0){
            $listFiltro1 = $filtro1 -> fetchAll(PDO::FETCH_ASSOC);
            $listFiltro2 = $filtro2 -> fetchAll(PDO::FETCH_ASSOC);
            $listFiltro3 = $filtro3 -> fetchAll(PDO::FETCH_ASSOC);
            $listClientes = $sqlClientes -> FetchAll(PDO::FETCH_ASSOC);
        }

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
                        <h1 class="h3 mt-3 mb-0 text-gray-800">Consultar informações</h1>
                    </div>
                    <div class="row">
                        <div class="col-xl-12 col-lg-12">
                            <div class="card shadow mb-4">
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">
                                        Ordernar por:
                                        <form action="consulta.php" method="GET">
                                            <select name="filterOption" id="filterOption">
                                                <option value="CD_CLIENTE">Cod. Cliente</option>
                                                <option value="CD_CONTRATO">Cod. Contrato</option>
                                                <option value="VR_CONTRATO">Valor Contrato</option>
                                                <option value="DT_RGST">Data Registro</option>
                                            </select>
                                            <select name="filterOption2" id="filterOption2">
                                                <option value="">Selecione</option>
                                                <option value="ASC">Crescente</option>
                                                <option value="DESC">Decrescente</option>
                                            </select>
                                            <input type="submit" value="Filtrar">
                                            <a href="consulta.php">Limpar filtro</a>
                                        </form>
                                    </h6>
                                    <a href="index.php">Sair</a>
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
                                                    <th scope="col">ID CONTRATO</th>
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
                                                        <td><?=$cliente['CD_CONTRATO'];?></td>
                                                        <td>
                                                            <a class="btn btn-warning btn-send" name="CD_CLIENTE" href="editarCliente.php?CD_CLIENTE=<?=$cliente['CD_CLIENTE'];?>">Editar Cliente</a>
                                                            <a class="btn btn-warning btn-send" name="CD_CLIENTE" href="editarContrato.php?CD_CONTRATO=<?=$cliente['CD_CONTRATO'];?>">Editar Contrato</a>
                                                            <a class="btn btn-danger btn-send" name="CD_CLIENTE" href="deletarCliente.php?CD_CLIENTE=<?=$cliente['CD_CLIENTE'];?>">Excluir Cliente</a>
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
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mt-3 mb-0 text-gray-800">Clientes por municipio</h1>
                    </div>
                    <div class="row">
                        <div class="col-xl-12 col-lg-12">
                            <div class="card shadow mb-4">
                                <div class="card-body">
                                    <div class="pt-1 pb-2">
                                    <table class="table table-hover text-center">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Quantidade</th>
                                                    <th scope="col">Município</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($listFiltro1 as $val): ?>
                                                    <tr>
                                                        <td> <?=$val['count(CD_CLIENTE)'];?> </td>
                                                        <td><?=$val['NM_MUNICIPIO'];?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mt-3 mb-0 text-gray-800">Vendas por periodo</h1>
                    </div>
                    <div class="row">
                        <div class="col-xl-12 col-lg-12">
                            <div class="card shadow mb-4">
                                <div class="card-body">
                                    <div class="pt-1 pb-2">
                                    <table class="table table-hover text-center">
                                            <thead>
                                                <tr>
                                                    <th scope="col">ID Contrato</th>
                                                    <th scope="col">Valor do Contrato</th>
                                                    <th scope="col">Data de Assinatura</th>
                                                    <th scope="col">Data de Inicio</th>
                                                    <th scope="col">Data de Fim</th>
                                                    <th scope="col">Status Contrato</th>
                                                    <th scope="col">Data de Registro</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($listFiltro2 as $val): ?>
                                                    <tr>
                                                        <td><?=$val['CD_CONTRATO'];?></td>
                                                        <td><?=$val['VR_CONTRATO'];?></td>
                                                        <td><?=$val['DT_ASS'];?></td>
                                                        <td><?=$val['DT_INICIO'];?></td>
                                                        <td><?=$val['DT_FIM'];?></td>
                                                        <td><?=$val['DC_STATUS'];?></td>
                                                        <td><?=$val['DT_RGST'];?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mt-3 mb-0 text-gray-800">Somatorio dos contratos por municipio</h1>
                    </div>
                    <div class="row">
                        <div class="col-xl-12 col-lg-12">
                            <div class="card shadow mb-4">
                                <div class="card-body">
                                    <div class="pt-1 pb-2">
                                    <table class="table table-hover text-center">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Valor total</th>
                                                    <th scope="col">Municipio</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($listFiltro3 as $val): ?>
                                                    <tr>
                                                        <td><?=$val['sum(contrato.vr_contrato)'];?></td>
                                                        <td><?=$val['nm_municipio'];?></td>
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