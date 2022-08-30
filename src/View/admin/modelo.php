<?php require_once dirname(__DIR__, 2) . '/Resource/dataview/modelo_dataview.php'; ?>
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
                            <h1>Modelo</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Administrador</a></li>
                                <li class="breadcrumb-item active">Gerenciar Modelos</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">

                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Gerencie os modelos</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>

                        </div>
                    </div>
                    <form id="formModelo" action="modelo.php" method="post">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Nome do modelo</label>
                                <input class="form-control obg" id="nome" name="nome" placeholder="Digite o nome....">
                            </div>
                            <button class="btn btn-success" name="btn_cadastrar" onclick="return CadastrarModelo('formModelo')">Cadastrar</button>
                    </form>

                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Modelos Cadastrados</h3>

                                    <div class="card-tools">
                                        <div class="input-group input-group-sm" style="width: 150px;">
                                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-hover" id="tabela_result_modelo">
                                        <thead>
                                            <tr>
                                                <th>Ação</th>
                                                <th>Nome do modelo</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php for ($i = 0; $i < count($modelo); $i++) { ?>
                                                <tr>
                                                    <td>
                                                        <a href="#" onclick="AlterarModeloModal('<?= $modelo[$i]['id'] ?>', '<?= $modelo[$i]['nome'] ?>')" data-toggle="modal" data-target="#alterarModelo" class="btn btn-warning btn-xs">Alterar</a>
                                                        <a href="#" onclick="ExcluirModal('<?= $modelo[$i]['id'] ?>', '<?= $modelo[$i]['nome'] ?>')" data-toggle="modal" data-target="#modalExcluir" class="btn btn-danger btn-xs">Excluir</a>
                                                    </td>
                                                    <td><?= $modelo[$i]['nome'] ?></td>
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
                <div id="divload">

                </div>
        </div>
        <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <form action="modelo.php" method="post">
        <?php include_once 'modal/_alterar_modelo.php' ?>
        <?php include_once 'modal/_excluir.php' ?>

    </form>
    <?php include_once PATH_URL . '/Template/_includes/_footer.php' ?>
    <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <?php include_once PATH_URL . '/Template/_includes/_scripts.php' ?>
    <?php include_once PATH_URL . '/Template/_includes/_msg.php' ?>
    <script src="../../Resource/ajax/modelo-ajx.js"></script>

    </script>
</body>

</html>