<?php require_once dirname(__DIR__, 2) . '/Resource/dataview/servico_dataview.php'; ?>
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
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Serviços</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index.php">Administrador</a></li>
                                <li class="breadcrumb-item active">Gerenciar Serviços</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">

                <!-- Default box -->
                <div id="CadServico" class="card card-secondary collapsed-card">
                    <div class="card-header">
                        <h3 class="card-title">Dados Serviços</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fa">Novo Serviço</i></button>

                        </div>
                    </div>
                    <form action="servico.php" method="post" id="form_servico">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label>Nome</label>
                                        <input class="form-control obg" id="nomeServico" name="nomeServico" placeholder="Digite o aqui....">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Preço</label>
                                        <input class="form-control obg" id="valorServico" name="valorServico" placeholder="Digite o aqui....">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Descrição</label>
                                        <textarea class="form-control" id="DescServico" name="DescServico" placeholder="Digite o aqui...."></textarea>
                                    </div>
                                </div>

                            </div>

                            <button class="btn btn-success" onclick="return CadastrarServico('form_servico')" name="btn_cadastrar">Cadastrar</button>

                    </form>

                </div>
                <div id="CadServicoBody" class="card-body">
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

            <!-- Default box -->



            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Serviços Cadastrados</h3>

                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="table_search" class="form-control float-right" onkeyup="FiltrarServico(this.value)" placeholder="Search">

                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover" id="tabela_result_servico">
                                <thead>
                                    <tr>
                                        <th>Ação</th>
                                        <th>Serviço</th>
                                        <th>Valor</th>
                                        <th>Descrição</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php for ($i = 0; $i < count($servico); $i++) { ?>
                                        <tr>
                                            <td>
                                                <a href="#" onclick="AlterarServicoModal('<?= $servico[$i]['ServID'] ?>', '<?= $servico[$i]['ServNome'] ?>','<?= $servico[$i]['ServValor'] ?>','<?= $servico[$i]['ServDescricao'] ?>')" data-toggle="modal" data-target="#alterarServico" class="btn btn-warning btn-xs">Alterar</a>
                                                <a href="#" onclick="ExcluirModal('<?= $servico[$i]['ServID'] ?>', '<?= $servico[$i]['ServNome'] ?>')" data-toggle="modal" data-target="#modalExcluir" class="btn btn-danger btn-xs">Excluir</a>
                                            </td>
                                            <td><?= $servico[$i]['ServNome'] ?></td>
                                            <td><?= $servico[$i]['ServValor'] ?></td>
                                            <td><?= $servico[$i]['ServDescricao'] ?></td>
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

    <form action="cliente.php" method="post">
        <?php include_once 'modal/_alterar_servico.php' ?>
        <?php include_once 'modal/_excluir.php' ?>

    </form>
    <?php include_once PATH_URL . '/Template/_includes/_footer.php' ?>
    <!-- /.control-sidebar -->

    <!-- jQuery -->
    <?php include_once PATH_URL . '/Template/_includes/_scripts.php' ?>
    <?php include_once PATH_URL . '/Template/_includes/_msg.php' ?>
    <script src="../../Resource/ajax/servico-ajx.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#valorServico").mask('000000.00', {
                reverse: true
            });
            $("#valorServico").mask('000000.00', {
                reverse: true
            });
        });
    </script>

    </script>
</body>

</html>