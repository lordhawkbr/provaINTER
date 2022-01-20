<?php
$url = "https://servicodados.ibge.gov.br/api/v1/localidades/distritos";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$resp = curl_exec($ch);
if ($e = curl_error($ch)) {
    echo $e;
} else {
    $decoded = json_decode($resp, true);
?>
    <!DOCTYPE html>
    <html lang="pt-br">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Prova Crud - Desenvolvedor PHP">
        <meta name="author" content="22hawk">
        <title>Cadastrar Cliente - Inter Construtora</title>
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
                            <h1 class="h3 mt-3 mb-0 text-gray-800 ">Cadastrar cliente</h1>
                        </div>
                        <div class="row">
                            <div class=" mx-auto">
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center">
                                        <form action="action_cadastrar_cliente.php" method="POST">
                                            <div class="controls">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group"><label for="formNome">Nome *</label>
                                                            <input id="formNome" type="text" name="NM_CLIENTE" class="form-control" placeholder="Insira o nome *" required="required" data-error="Campo necessário.">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group"><label for="formCPF">CPF *</label>
                                                            <input id="formCPF" type="text" name="DC_CPF" class="form-control" placeholder="123.456.789-00 *" required="required" data-error="Campo necessário.">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group"><label for="formTelefone">Telefone *</label>
                                                            <input id="formTelefone" type="text" name="DC_TELL" class="form-control" placeholder="(32) 9 1234-5678 *" required="required" data-error="Campo necessário.">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group"><label for="formEmail">Email *</label>
                                                            <input id="formEmail" type="text" name="DC_EMAIL" class="form-control" placeholder="maiL@mail.com *" required="required" data-error="Campo necessário.">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group"><label for="formMunicípio">Município *</label>
                                                            <select id="formMunicípio" name="ID_MUNICIPIO" class="form-control" required="required" data-error="Campo necessário.">
                                                                <option value="" selected>Selecione seu município</option>
                                                            <?php
                                                            foreach ($decoded as $val) {
                                                                    echo "<option value='{[".$val['id'].",".$val['nome']."]}'>".$val['nome']."</option>";
                                                                }
                                                            }
                                                            curl_close($ch);
                                                            ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group"><label for="formValorCt">Valor contrato *</label>
                                                            <input id="formValorCt" type="text" name="VR_CONTRATO" class="form-control" placeholder="R$ 1.000.000,00 *" required="required" data-error="Campo necessário.">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group"><label for="formDtAss">Data da assinatura *</label>
                                                            <input id="formDtss" type="date" name="DT_ASS" class="form-control" placeholder="01/01/2022 *" required="required" data-error="Campo necessário.">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group"><label for="formDtIn">Data de ínico *</label>
                                                            <input id="formDtIn" type="date" name="DT_INICIO" class="form-control" placeholder="01/01/2022 *" required="required" data-error="Campo necessário.">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group"><label for="formDtFim">Data de fim *</label>
                                                            <input id="formDtFim" type="date" name="DT_FIM" class="form-control" placeholder="01/01/2022 *" required="required" data-error="Campo necessário.">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group"><label for="formDesc">Descrição do Status *</label>
                                                            <select id="formDesc" name="DC_STATUS" class="form-control" required="required" data-error="Campo necessário.">
                                                                <option value="A">Ativo</option>
                                                                <option value="D">Distratado</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <input type="submit" class="btn btn-success btn-send pt-2 btn-block" value="Cadastrar">
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
        <script src="assets/js/vmask.js"></script>
        <script>
            function inputHandler(masks, max, event) {
                var c = event.target;
                var v = c.value.replace(/\D/g, '');
                var m = c.value.length > max ? 1 : 0;
                VMasker(c).unMask();
                VMasker(c).maskPattern(masks[m]);
                c.value = VMasker.toPattern(v, masks[m]);
            }

            var telMask = ['(99) 9999-99999', '(99) 99999-9999'];
            var tel = document.querySelector('#formTelefone');
            VMasker(tel).maskPattern(telMask[0]);
            tel.addEventListener('input', inputHandler.bind(undefined, telMask, 14), false);

            var docMask = ['999.999.999-999', '99.999.999/9999-99'];
            var doc = document.querySelector('#formCPF');
            VMasker(doc).maskPattern(docMask[0]);
            doc.addEventListener('input', inputHandler.bind(undefined, docMask, 14), false);
        </script>
    </body>
    </html>