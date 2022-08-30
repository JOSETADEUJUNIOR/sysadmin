<?php require_once dirname(__DIR__, 2) . '/Resource/dataview/Os_dataview.php'; use Src\_public\Util; ?>
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
                            <h1>cliente</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Administrador</a></li>
                                <li class="breadcrumb-item active">Gerenciar clientes</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">

                <!-- Default box -->
                <div id="CadCliente" class="card card-secondary collapsed-card">
                    <div class="card-header">
                        <h3 class="card-title">Dados da Ordem</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fa">Novo Cliente</i></button>

                        </div>
                    </div>
                    <form id="form_os" action="ordem_servico.php" method="post">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Cliente</label>
                                        <select class="select2bs4 obg" data-placeholder="Selecione o cliente" id="Oscliente" name="Oscliente" style="width: 100%;">
                                            <option value="">Selecione...</option>
                                            <?php foreach ($clientes as $cliente) { ?>
                                                <option value="<?= $cliente['CliID'] ?>"><?= $cliente['CliNome'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Técnico</label>
                                        <input class="form-control obg" id="tecnico" name="tecnico">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select class="form-control obg" id="status" name="status">
                                            <option value="O">Orçamento</option>
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
                                        <input type="date" class="form-control obg" id="dtInicial" name="dtInicial" placeholder="Digite o aqui....">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Data final</label>
                                        <input type="date" class="form-control" id="dtFinal" name="dtFinal" placeholder="Digite o aqui....">
                                    </div>
                                </div>
                                
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Garantia</label>
                                        <input class="form-control obg" id="garantia" name="garantia" placeholder="Digite o aqui....">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Descrição do Produto/Serviço</label>
                                        <textarea class="form-control obg" id="descProd" name="descProd" placeholder="Digite o aqui...."></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Defeito</label>
                                        <textarea class="form-control obg" id="defeito" name="defeito" placeholder="Digite o aqui...."></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Observações</label>
                                        <textarea class="form-control " id="obs" name="obs" placeholder="Digite o aqui...."></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Laudo Técnico</label>
                                        <textarea class="form-control" id="laudo" name="laudo" placeholder="Digite o aqui...."></textarea>
                                    </div>
                                </div>
                            
                        </div>
                            <button class="btn btn-success col-md-12" onclick="return CadastrarOs('form_os')" name="btn_cadastrar">Cadastrar</button>
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
                                                <a href="#" onclick="AlterarOsModal('<?= $os[$i]['OsID'] ?>', '<?= $os[$i]['OsDtInicial'] ?>','<?= $os[$i]['OsDtFinal'] ?>','<?= $os[$i]['OsGarantia'] ?>','<?= $os[$i]['OsDescProdServ'] ?>','<?= $os[$i]['OsDefeito'] ?>','<?= $os[$i]['OsObs'] ?>','<?= $os[$i]['OsCliID'] ?>','<?= $os[$i]['OsTecID'] ?>','<?= $os[$i]['OsStatus'] ?>','<?= $os[$i]['OsLaudoTec'] ?>','<?= $os[$i]['nomeCliente'] ?>')" data-toggle="modal" data-target="#alterarOs"><i class="fas fa-edit"></i></a>
                                                <a href="#" onclick="ExcluirModal('<?= $os[$i]['OsID'] ?>','<?= $os[$i]['nomeCliente'] ?>')" data-toggle="modal" data-target="#modalExcluir"><i style="color:red" class="fas fa-trash-alt"></i></a>
                                                <a href="itens_os.php?OsID=<?= $os[$i]['OsID']?>" ><i style="color:red" title="Inserir os Itens na OS" class="fas fa-list"></i></a>
                                                <a href="print_os.php?OsID=<?= $os[$i]['OsID']?>" ><i style="color:red" title="Imprimir OS" class="fas fa-print"></i></a>
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
                                                <?= $status ?></td>
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
        <?php include_once 'modal/_alterar_os.php' ?>
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