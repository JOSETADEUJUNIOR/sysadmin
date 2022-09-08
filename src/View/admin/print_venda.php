<?php require_once dirname(__DIR__, 2) . '/Resource/dataview/Venda_dataview.php';

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
                                            <strong>Nome: </strong> <?= ($venda[0]['CliNome'] != '' ? $venda[0]['CliNome'] : '') ?><br>
                                            <?= ($venda[0]['CliEndereco'] != '' ? $venda[0]['CliEndereco'] . ', ' . $venda[0]['CliNumero'] : '') ?><br>
                                            <?= ($venda[0]['CliBairro'] != '' ? $venda[0]['CliBairro'] . ', ' . $venda[0]['CliCidade'] : '') ?><br>
                                            Telefone: <?= ($venda[0]['CliTelefone'] != '' ? $venda[0]['CliTelefone'] : '') ?> <br>
                                            Email: <?= ($venda[0]['CliEmail'] != '' ? $venda[0]['CliEmail'] : '') ?>
                                        </address>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-4 invoice-col">
                                        <b>Ordem #<?= ($venda[0]['VendaID'] != '' ? '00' . $venda[0]['VendaID'] : '') ?></b><br>
                                        <br>
                                        <b>Data Venda: </b><?= ($venda[0]['VendaDT'] != '' ? Util::ExibirDataBr($venda[0]['VendaDT']) : '') ?> <br>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->

                                <!-- Table row -->
                                <div class="row">

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
                                                for ($i = 0; $i < count($ProdVenda); $i++) {
                                                    if ($ProdVenda[$i]['ItensProdID'] != '') {
                                                        $subTotal = $subTotal + $ProdVenda[$i]['ProdValorVenda'] ?>
                                                        <tr>
                                                            <td colspan="2"><?= $ProdVenda[$i]['ProdDescricao'] ?></td>
                                                            <td><span> Produto</span></td>
                                                            <td><?= $ProdVenda[$i]['ItensQtd'] ?></td>
                                                            <td><?= $ProdVenda[$i]['ProdValorVenda'] ?></td>
                                                            <td><?= $ProdVenda[$i]['ItensSubTotal'] ?></td>


                                                        </tr>
                                                <?php }
                                                } ?>

                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->

                                <div class="row">
                                    <!-- accepted payments column -->
                                    <div class="col-6">
                                        <p class="lead">Payment Methods:</p>
                                        <img src="../../Template/dist/img/credit/visa.png" alt="Visa">
                                        <img src="../../Template/dist/img/credit/mastercard.png" alt="Mastercard">
                                        <img src="../../Template/dist/img/credit/american-express.png" alt="American Express">
                                        <img src="../../Template/dist/img/credit/paypal2.png" alt="Paypal">
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-6">
                                        <p class="lead">Valor a ser pago em: <?= date('d/m/Y') ?></p>

                                        <div class="table-responsive">
                                            <table class="table">
                                                <tr>
                                                    <th style="width:50%">Subtotal Produtos:</th>
                                                    <td><?= ($subTotal != '' ? Util::FormatarValor($subTotal) : '0,00') ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Total Produtos:</th>
                                                    <td><?= ($venda[0]['VendaValorTotal'] != '' ? Util::FormatarValor($venda[0]['VendaValorTotal']) : '') ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Desconto:</th>
                                                    <td><?= ($venda[0]['VendaDesconto'] != '' ? Util::FormatarValor($venda[0]['VendaDesconto']) : '') ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Total Venda:</th>
                                                    <td><?= ($venda[0]['VendaValorTotal'] != '' ? Util::FormatarValor($venda[0]['VendaValorTotal'] - $venda[0]['VendaDesconto']) : '') ?></td>
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
                                        <a href="invoice-print_venda.php?VendaID= <?= $venda[0]['ItensVendaID'] ?>" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Imprimir a Venda</a>
                                        <a href="venda.php" class="btn btn-warning float-right"> Voltar para vendas
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