<?php require_once dirname(__DIR__, 2) . '/Resource/dataview/Venda_dataview.php';

use Src\_public\Util; ?>
<!DOCTYPE html>
<html>

<head>
    <?php include_once PATH_URL . '/Template/_includes/_head.php' ?>
    <!-- Tempusdominus Bbootstrap 4 -->
    <!-- Select2 -->
    <link rel="stylesheet" href="../../Template/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="../../Template/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
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
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Vendas realizadas</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Administrador</a></li>
                                <li class="breadcrumb-item active">Gerenciar as vendas</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">

                <!-- Default box -->
                <div id="CadVenda" class="card card-secondary <?= ($venda[0]['VendaID'] != '' ? '' : 'collapsed-card') ?>">
                    <div class="card-header">
                        <h3 class="card-title">Campos para venda</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-outline-info" style="color:white" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <?= ($venda[0]['VendaID'] != '' ? 'Editar ' : 'Add ') ?>Venda</button>

                        </div>
                    </div>
                    <form id="form_os" action="venda.php" method="post">
                        <input type="hidden" name="VendaID" id="VendaID" value="<?= ($venda[0]['VendaID'] != '' ? $venda[0]['VendaID'] : '') ?>">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label>Cliente</label>
                                        <select class="select2bs4 obg" data-placeholder="Selecione o cliente" id="Vendacliente" name="Vendacliente" style="width: 100%;">
                                            <?php foreach ($clientes as $cliente) { ?>
                                                <option value="<?= $cliente['CliID'] ?>" <?= ($venda[0]['VendaID'] == '' ? '' : ($Venda[0]['VendaCliID'] == $cliente['CliID'] ? 'selected' : '')) ?>><?= $cliente['CliNome'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Data da venda</label>
                                        <input type="date" class="form-control obg" id="VendaDT" name="VendaDT" value="<?= ($venda[0]['VendaID'] == '' ? date('Y-m-d') : $venda[0]['VendaDT']) ?>" placeholder="Digite o aqui....">
                                    </div>
                                </div>



                                <div class="col-md-6">
                                    <div class="form-group">
                                        <button class="btn btn-success col-md-12" onclick="return CadastrarVenda('form_os')" name="btn_cadastrar">Criar Venda</button>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">

                                        <a href="venda.php" class="btn btn-warning col-md-12">Voltar</a>
                                    </div>
                                </div>
                            </div>

                    </form>
                </div>
                <div id="CadOsBody" class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">

                                <!-- /.card-header -->

                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                </div>
                <div id="divload">

                </div>

        </div>
        <!-- /.card -->

        </section>

        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Vendas Realizadas</h3>

                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="table_search" class="form-control float-right" onkeyup="FiltrarProduto(this.value)" placeholder="Search">

                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover tabela" id="tabela_result_venda">
                                <thead>
                                    <tr>
                                        <th>Ação</th>
                                        <th>Nome do cliente</th>
                                        <th>Dt Venda</th>
                                        <th>Valor</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php for ($i = 0; $i < count($vendas); $i++) { ?>
                                        <tr>
                                            <td>
                                                <?php if ($vendas[$i]['VendaFaturado'] == 'N') { ?>
                                                    <a href="venda.php?VendaID=<?= $vendas[$i]['VendaID'] ?>"><i class="fas fa-edit"></i></a>
                                                    <?php foreach ($dadosVenda as $dv) {
                                                        if ($dv['VendaID'] == $vendas[$i]['VendaID']) {
                                                            $prodVenda = $dv['ItensVendaID'];
                                                        }
                                                    } ?>
                                                    <?php if ($prodVenda == '') { ?>
                                                        <a href="#" onclick="ExcluirModal('<?= $vendas[$i]['VendaID'] ?>','<?= $vendas[$i]['CliNome'] ?>')" data-toggle="modal" data-target="#modalExcluir"><i style="color:red" class="fas fa-trash-alt"></i></a>
                                                    <?php } ?>
                                                    <a href="itens_venda.php?VendaID=<?= $vendas[$i]['VendaID'] ?>"><i style="color:purple" title="Inserir os Itens da venda" class="fas fa-list"></i></a>
                                                <?php } ?>
                                                <a href="print_venda.php?VendaID=<?= $vendas[$i]['VendaID'] ?>"><i style="color:black" title="Imprimir venda" class="fas fa-print"></i></a>
                                            </td>
                                            <td><?= $vendas[$i]['CliNome'] ?></td>
                                            <td><?= Util::ExibirDataBr($vendas[$i]['VendaDT']) ?></td>

                                            <td><?= Util::FormatarValor($vendas[$i]['VendaValorTotal'] - $vendas[$i]['VendaDesconto']) ?></td>

                                            <td><?=
                                                $vendas[$i]['VendaValorTotal'] == 0 ? '<span class="btn btn-info btn-xs">Em andamento</span>' : ($vendas[$i]['VendaFaturado'] == "S" ? '<span class="btn btn-success btn-xs">Faturado</span>' : '<span onclick="faturarVenda(' . $vendas[$i]['VendaID'] . ',' . $vendas[$i]['VendaCliID'] . ',' . $vendas[$i]['VendaValorTotal'] . ')" class="btn btn-warning btn-xs">Faturar?</span>') ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
    </div>

    </section>


    <!-- /.content -->

    <!-- /.content-wrapper -->
    <form action="venda.php" id="form_alt_venda" method="post">
        <?php include_once 'modal/_excluir.php' ?>

    </form>
    <?php include_once PATH_URL . '/Template/_includes/_footer.php' ?>
    <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <?php include_once PATH_URL . '/Template/_includes/_scripts.php' ?>
    <?php include_once PATH_URL . '/Template/_includes/_msg.php' ?>
    <script src="../../Resource/ajax/venda-ajx.js"></script>
    <script src="../../Template/plugins/select2/js/select2.full.min.js"></script>
    <script src="../../Template/plugins/sweetalert2/sweetalert2.all.min.js"></script>


    <script>
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('#Vendacliente').select2({
                theme: 'bootstrap4'
            })

            $('#AlteraVendacliente').select2({
                theme: 'bootstrap4'
            })

        })
    </script>

</body>

</html>