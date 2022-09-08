<?php require_once dirname(__DIR__, 2) . '/Resource/dataview/Os_dataview.php';

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
                            <h1>Ordens de Serviços</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Administrador</a></li>
                                <li class="breadcrumb-item active">Gerenciar Ordem de Serviços</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">

                <!-- Default box -->
                <div id="CadOs" class="card card-secondary <?= $OsID==''?'collapsed-card':'' ?>">
                    <div class="card-header">
                        <h3 class="card-title">Dados da Ordem</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <?= $OsID=='' ? 'Add' : 'Editar' ?>Ordem</button>

                        </div>
                    </div>
                    <form id="form_os" action="ordem_servico.php" method="post">
                        <input type="hidden" name="OsID" id="OsID" value="<?= $OsID!='' ? $ordemOS[0]['OsID'] : '' ?>">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Cliente</label>
                                        <select class="select2bs4 obg" data-placeholder="Selecione o cliente" id="Oscliente" name="Oscliente" style="width: 100%;">
                                            <?php foreach ($clientes as $cliente) { ?>
                                                <option value="<?= $cliente['CliID'] ?>" <?= $OsID == '' ? '' : ($ordemOS[0]['OsCliID'] == $cliente['CliID'] ? 'selected' : '') ?>><?= $cliente['CliNome'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Técnico</label>
                                        <input class="form-control obg" id="tecnico" name="tecnico" value="<?= $OsID == '' ? '' : $ordemOS[0]['OsTecID'] ?>">
                                    </div>
                                </div>
                                <?php
                                $status = '';
                                if ($ordemOS[0]['OsStatus'] == "O") {
                                    $status = "<button class=\"btn btn-secondary btn-xs\">Orçamento</button>";
                                } else if ($ordemOS[0]['OsStatus'] == "A") {
                                    $status = "<button class=\"btn btn-info btn-xs\">Aberto</button>";
                                } else if ($ordemOS[0]['OsStatus'] == "EA") {
                                    $status = "<button class=\"btn btn-warning btn-xs\">Em aberto</button>";
                                } else if ($ordemOS[0]['OsStatus'] == "F") {
                                    $status = "<button class=\"btn btn-success btn-xs\">Finalizada</button>";
                                } else if ($ordemOS[0]['OsStatus'] == "C") {
                                    $status = "<button class=\"btn btn-danger btn-xs\">Cancelado</button>";
                                } ?>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select class="form-control obg" id="status" name="status">
                                            <option value="<?= $OsID != ''? $ordemOS[0]['OsStatus'] : 'O' ?>"><?= ($status != '' ? $status : 'Orçamento') ?></option>
                                            <option value="A">Aberto</option>
                                            <option value="EA">Em andamento</option>
                                            <option value="F">Finalizado</option>
                                            <option value="C">Cancelado</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Data inicial</label>
                                        <input type="date" class="form-control obg" id="dtInicial" name="dtInicial" value="<?= $OsID == ' ' ? '' : $ordemOS[0]['OsDtInicial'] ?>" placeholder="Digite o aqui....">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Data final</label>
                                        <input type="date" class="form-control" id="dtFinal" name="dtFinal" value="<?= $OsID == '' ? '' : $ordemOS[0]['OsDtFinal'] ?>" placeholder="Digite o aqui....">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Garantia</label>
                                        <input class="form-control obg" id="garantia" name="garantia" value="<?= $OsID == '' ? '' : $ordemOS[0]['OsGarantia'] ?>" placeholder="Digite o aqui....">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Descrição do Produto/Serviço</label>
                                        <textarea class="form-control obg" id="descProd" name="descProd" placeholder="Digite o aqui...."><?= $OsID == '' ? '' : $ordemOS[0]['OsDescProdServ'] ?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Defeito</label>
                                        <textarea class="form-control obg" id="defeito" name="defeito" placeholder="Digite o aqui...."><?= $OsID == '' ? '' : $ordemOS[0]['OsDefeito'] ?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Observações</label>
                                        <textarea class="form-control " id="obs" name="obs" placeholder="Digite o aqui...."><?= $OsID == '' ? '' : $ordemOS[0]['OsObs'] ?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Laudo Técnico</label>
                                        <textarea class="form-control" id="laudo" name="laudo" placeholder="Digite o aqui...."><?= $OsID == '' ? '' : $ordemOS[0]['OsLaudo'] ?></textarea>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <button class="btn btn-success col-md-12" onclick="return CadastrarOs('form_os')" name="btn_cadastrar">Cadastrar</button>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">

                                        <a href="ordem_servico.php" class="btn btn-warning col-md-12">Voltar</a>
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
                            <h3 class="card-title">Ordens Cadastradas</h3>

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
                            <table class="table table-hover" id="tabela_result_os">
                                <thead>
                                    <tr>
                                        <th>Ação</th>
                                        <th>Nome do cliente</th>
                                        <th>Dt Inicio</th>
                                        <th>Dt Entrega</th>
                                        <th>Tecnico</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php for ($i = 0; $i < count($os); $i++) { ?>
                                        <tr>
                                            <td>
                                                <?php if ($os[$i]['OsFaturado']=='N') { ?>
                                                <a href="ordem_servico.php?OsID=<?= $os[$i]['OsID'] ?>"><i class="fas fa-edit"></i></a>
                                                <?php foreach ($dadosOS as $do) {
                                                   if ($do['OsID']==$os[$i]['OsID']) {
                                                    $prodOS = $do['ProdOs_osID'];
                                                    $servOS = $do['ServOs_osID'];
                                                    $anxOS = $do['AnxOsID'];
                                                   }
                                                } ?>
                                                <?php if ($prodOS=='' && $servOS=='' && $anxOS=='') {?>
                                                <a href="#" onclick="ExcluirModal('<?= $os[$i]['OsID'] ?>','<?= $os[$i]['nomeCliente'] ?>')" data-toggle="modal" data-target="#modalExcluir"><i style="color:red" class="fas fa-trash-alt"></i></a>
                                               <?php }?>
                                                <a href="itens_os.php?OsID=<?= $os[$i]['OsID'] ?>"><i style="color:purple" title="Inserir os Itens na OS" class="fas fa-list"></i></a>
                                                <a href="anexo_os.php?OsID=<?= $os[$i]['OsID'] ?>"><i style="color:black" title="Inserir os anexos na OS" class="fas fa-file-archive"></i></a>
                                                <?php }?>
                                                <a href="print_os.php?OsID=<?= $os[$i]['OsID'] ?>"><i style="color:black" title="Imprimir OS" class="fas fa-print"></i></a>
                                            </td>
                                            <td><?= $os[$i]['nomeCliente'] ?></td>
                                            <td><?= Util::ExibirDataBr($os[$i]['OsDtInicial']) ?></td>
                                            <td><?= Util::ExibirDataBr($os[$i]['OsDtFinal']) ?></td>
                                            <td><?= $os[$i]['OsTecID'] ?></td>

                                            <td><?php
                                                $status = '';
                                                if ($os[$i]['OsStatus'] == "O") {
                                                    $status = "<button class=\"btn btn-secondary btn-xs\">Orçamento</button>";
                                                } else if ($os[$i]['OsStatus'] == "A") {
                                                    $status = "<button class=\"btn btn-info btn-xs\">Aberto</button>";
                                                } else if ($os[$i]['OsStatus'] == "EA") {
                                                    $status = "<button class=\"btn btn-warning btn-xs\">Em aberto</button>";
                                                } else if ($os[$i]['OsStatus'] == "F") {
                                                    $status = "<button class=\"btn btn-success btn-xs\">Finalizada</button>";
                                                } else if ($os[$i]['OsStatus'] == "C") {
                                                    $status = "<button class=\"btn btn-danger btn-xs\">Cancelado</button>";
                                                } ?>
                                                <?= $status ?>
                                                <?= ($os[$i]['OsStatus']!="F"?'':($os[$i]['OsFaturado'] == "S" ? '<span class="btn btn-success btn-xs">Faturado</span>' : '<span onclick="faturarOs(' . $os[$i]['OsID'] . ',' . $os[$i]['OsCliID'] . ',' . $os[$i]['OsValorTotal'] . ')" class="btn btn-warning btn-xs">Faturar?</span>')) ?>
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
    <form action="ordem_servico.php" id="form_alt_os" method="post">
        <?php include_once 'modal/_excluir.php' ?>

    </form>
    <?php include_once PATH_URL . '/Template/_includes/_footer.php' ?>
    <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <?php include_once PATH_URL . '/Template/_includes/_scripts.php' ?>
    <?php include_once PATH_URL . '/Template/_includes/_msg.php' ?>
    <script src="../../Resource/ajax/os-ajx.js"></script>
    <script src="../../Template/plugins/select2/js/select2.full.min.js"></script>
    <script src="../../Template/plugins/sweetalert2/sweetalert2.all.min.js"></script>


    <script>
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('#Oscliente').select2({
                theme: 'bootstrap4'
            })

            $('#AlteraOscliente').select2({
                theme: 'bootstrap4'
            })

        })
    </script>

</body>

</html>