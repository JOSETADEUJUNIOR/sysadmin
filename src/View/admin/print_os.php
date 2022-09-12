<?php require_once dirname(__DIR__, 2) . '/Resource/dataview/Os_dataview.php';

use Src\_public\Util; ?>
<!DOCTYPE html>
<html>

<head>
    <?php include_once PATH_URL . '/Template/_includes/_head.php' ?>

</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <?php
        include_once PATH_URL . '/Template/_includes/_topo.php';
        include_once PATH_URL . '/Template/_includes/_menu.php'
        ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->


        <!-- Content Wrapper. Contains page content -->

        <!-- /.card -->

        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Fatura</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Fatura</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">

                            <!-- Main content -->
                            <div class="invoice p-3 mb-3">
                                <!-- title row -->
                                <div class="row">
                                    <div class="col-12">
                                        <h4>
                                            <img class="profile-user-img img-fluid img-circle" src="../../Resource/dataview/<?= $dadosEmp[0]['EmpLogoPath'] ?>" alt="User profile picture"> <?php echo $dadosEmp[0]['EmpNome'] ?> .
                                            <small class="float-right">Data: <?php echo date('d/m/Y') ?></small>
                                        </h4>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- info row -->
                                <div class="row invoice-info">
                                    <div class="col-sm-4 invoice-col">
                                        Dados Empresa
                                        <address>
                                            <strong><?= $dadosEmp[0]['EmpNome'] . ' - </strong> [' . $dadosEmp[0]['EmpCNPJ'] . ']'  ?></strong><br>
                                            <?= $dadosEmp[0]['EmpEnd'] . ', ' . $dadosEmp[0]['EmpNumero'] ?><br>
                                            <?= 'Cep: ' . $dadosEmp[0]['EmpCep'] . ' - ' . $dadosEmp[0]['EmpCidade'] ?><br>
                                            Telefone: <?= $dadosEmp[0]['telefone'] ?><br>
                                            Email: <?= $dadosEmp[0]['login'] ?>
                                        </address>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-4 invoice-col">
                                        Dados Cliente
                                        <address>
                                            <strong>Nome: </strong> <?= ($ordemOS[0]['nomeCliente'] != '' ? $ordemOS[0]['nomeCliente'] : '') ?><br>
                                            <?= ($ordemOS[0]['CliEndereco'] != '' ? $ordemOS[0]['CliEndereco'] . ', ' . $ordemOS[0]['CliNumero'] : '') ?><br>
                                            <?= ($ordemOS[0]['CliBairro'] != '' ? $ordemOS[0]['CliBairro'] . ', ' . $ordemOS[0]['CliCidade'] : '') ?><br>
                                            Telefone: <?= ($ordemOS[0]['CliTelefone'] != '' ? $ordemOS[0]['CliTelefone'] : '') ?> <br>
                                            Email: <?= ($ordemOS[0]['CliEmail'] != '' ? $ordemOS[0]['CliEmail'] : '') ?>
                                        </address>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-4 invoice-col">
                                        <b>Ordem #<?= ($ordemOS[0]['OsID'] != '' ? '00' . $ordemOS[0]['OsID'] : '') ?></b><br>
                                        <br>
                                        <b>Data Entrega: </b><?= ($ordemOS[0]['OsDtFinal'] != '' ? Util::ExibirDataBr($ordemOS[0]['OsDtFinal']) : '') ?> <br>
                                        <?php $status = '';
                                        if ($ordemOS[0]['OsStatus'] == "O") {
                                            $status = "<button class=\"btn btn-secondary btn-xs\">Orçamento</button>";
                                        } else if ($ordemOS[0]['OsStatus'] == "A") {
                                            $status = "<button class=\"btn btn-info btn-xs\">Aberto</button>";
                                        } else if ($ordemOS[0]['OsStatus'] == "EA") {
                                            $status = "<button class=\"btn btn-warning btn-xs\">Em aberto</button>";
                                        } else if ($ordemOS[0]['OsStatus'] == "F") {
                                            $status = "<button class=\"btn btn-success btn-xs\">Finalizada</button>";
                                        } else if ($ordemOS[0]['OsStatus'] == "C") {
                                            $status = "<button class=\"btn btn-danger btn-xs\">Cancelada</button>";
                                        } ?>
                                        <b>Status:</b> <?= $status ?>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->

                                <!-- Table row -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card card-default">
                                            <div class="card-header">
                                                <h3 class="card-title">
                                                    <i class="fas fa-bullhorn"></i>
                                                    Descrição do Produto ou Serviço
                                                </h3>
                                            </div>
                                            <!-- /.card-header -->
                                            <div class="card-body">
                                                <div class="callout callout-info">
                                                    <h5>Descrições da OS!</h5>
                                                    <p><?= ($ordemOS[0]['OsDescProdServ'] != '' ? $ordemOS[0]['OsDescProdServ'] : '') ?>.</p>
                                                </div>
                                            </div>

                                            <!-- /.card-body -->
                                        </div>

                                        <!-- /.card -->
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card card-default">
                                            <div class="card-header">
                                                <h3 class="card-title">
                                                    <i class="fas fa-bullhorn"></i>
                                                    Defeito!
                                                </h3>
                                            </div>
                                            <!-- /.card-header -->
                                            <div class="card-body">
                                                <div class="callout callout-danger">
                                                    <h5>Defeito!</h5>

                                                    <p><?= ($ordemOS[0]['OsDefeito'] != '' ? $ordemOS[0]['OsDefeito'] : '') ?></p>
                                                </div>
                                            </div>

                                            <!-- /.card-body -->
                                        </div>

                                        <!-- /.card -->
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card card-default">
                                            <div class="card-header">
                                                <h3 class="card-title">
                                                    <i class="fas fa-bullhorn"></i>
                                                    Observações gerais!
                                                </h3>
                                            </div>
                                            <!-- /.card-header -->
                                            <div class="card-body">
                                                <div class="callout callout-warning">
                                                    <h5>Observações!</h5>

                                                    <p><?= ($ordemOS[0]['OsObs'] != '' ? $ordemOS[0]['OsObs'] : 'Nenhuma observação inserida') ?>.</p>
                                                </div>
                                            </div>

                                            <!-- /.card-body -->
                                        </div>

                                        <!-- /.card -->
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card card-default">
                                            <div class="card-header">
                                                <h3 class="card-title">
                                                    <i class="fas fa-bullhorn"></i>
                                                    Laudo Técnico
                                                </h3>
                                            </div>
                                            <!-- /.card-header -->
                                            <div class="card-body">
                                                <div class="callout callout-success">
                                                    <h5>Laudo Técnico!</h5>

                                                    <p><?= ($ordemOS[0]['OsLaudoTec'] != '' ? $ordemOS[0]['OsLaudoTec'] : 'Laudo Técnico não informado') ?>.</p>
                                                </div>
                                            </div>

                                            <!-- /.card-body -->
                                        </div>

                                        <!-- /.card -->
                                    </div>
                                    <div class="col-12 table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th colspan="2">Produto/Serviço</th>
                                                    <th>Tipo</th>
                                                    <th>Quantidade</th>
                                                    <th>Valor</th>
                                                    <th>Valor Total</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $subTotal = 0;
                                                for ($i = 0; $i < count($ProdOrdem); $i++) {
                                                    if ($ProdOrdem[$i]['ProdOsProdID'] != '') {
                                                        $subTotal = $subTotal + $ProdOrdem[$i]['ProdValorVenda'] ?>
                                                        <tr>
                                                            <td colspan="2"><?= $ProdOrdem[$i]['ProdDescricao'] ?></td>
                                                            <td><span> Produto</span></td>
                                                            <td><?= $ProdOrdem[$i]['ProdOsQtd'] ?></td>
                                                            <td><?= $ProdOrdem[$i]['ProdValorVenda'] ?></td>
                                                            <td><?= $ProdOrdem[$i]['ProdOsSubTotal'] ?></td>


                                                        </tr>
                                                <?php }
                                                } ?>

                                            </tbody>
                                            </hr>
                                            <tbody>
                                                <?php for ($i = 0; $i < count($ProdServOrdem); $i++) {
                                                    if ($ProdServOrdem[$i]['ServOsServID'] != '') {
                                                        $subTotal = $subTotal + $ProdServOrdem[$i]['ServValor']  ?>
                                                        <tr>
                                                            <td colspan="2"><?= $ProdServOrdem[$i]['ServNome'] ?></td>
                                                            <td><span> Serviço</span></td>
                                                            <td><?= $ProdServOrdem[$i]['ServOsQtd'] ?></td>
                                                            <td><?= $ProdServOrdem[$i]['ServValor'] ?></td>
                                                            <td><?= $ProdServOrdem[$i]['ServOsSubTotal'] ?></td>
                                                        </tr>
                                                    <?php } ?>
                                                <?php } ?>

                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->

                                <div class="row">
                                    <!-- accepted payments column -->
                                    <div class="col-6">
                                        <p class="lead">Formas de pagamento:</p>
                                        <img src="../../Template/dist/img/credit/visa.png" alt="Visa">
                                        <img src="../../Template/dist/img/credit/mastercard.png" alt="Mastercard">
                                        
                                        <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                                            <strong>Garantia: <?= ($ordemOS[0]['OsGarantia'] != '' ? $ordemOS[0]['OsGarantia'] : '') ?></strong>
                                        </p>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-6">
                                        <p class="lead">Valor a ser pago em: <?= date('d/m/Y') ?></p>

                                        <div class="table-responsive">
                                            <table class="table">
                                                <tr>
                                                    <th style="width:50%">Subtotal:</th>
                                                    <td><?= ($subTotal != '' ? Util::FormatarValor($subTotal) : '0,00') ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Desconto:</th>
                                                    <td><?= ($ordemOS[0]['OsDesconto'] != '' ? Util::FormatarValor($ordemOS[0]['OsDesconto']) : '') ?></td>
                                                </tr>
                                                
                                                <tr>
                                                    <th>Total:</th>
                                                    <td><?= ($ordemOS[0]['OsValorTotal'] != '' ? Util::FormatarValor($ordemOS[0]['OsValorTotal'] - $ordemOS[0]['OsDesconto']) : '') ?></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->

                                <!-- this row will not appear when printing -->
                                <div class="row no-print">
                                    <div class="col-12">
                                        <a href="invoice-print.php?OsID= <?= $ordemOS[0]['OsID'] ?>" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Imprimir a Ordem</a>
                                        <a href="ordem_servico.php" class="btn btn-warning float-right"> Voltar para OS
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- /.invoice -->
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>


        <!-- /.content -->

        <!-- /.content-wrapper -->
        <?php include_once PATH_URL . '/Template/_includes/_footer.php' ?>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <?php include_once PATH_URL . '/Template/_includes/_scripts.php' ?>
    <?php include_once PATH_URL . '/Template/_includes/_msg.php' ?>
    <script src="../../Resource/ajax/os-ajx.js"></script>

    </script>
</body>

</html>