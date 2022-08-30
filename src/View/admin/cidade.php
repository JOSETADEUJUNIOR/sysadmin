<?php require_once dirname(__DIR__, 2) . '/Resource/dataview/cidade_dataview.php';

?>

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
                            <h1>Cidade</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active">Gerenciar Cidades</li>
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
                        <h3 class="card-title">Gerencie as cidades</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>

                        </div>
                    </div>
                    <form action="cidade.php" id="form_cidade" method="post">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Cidade</label>
                                <input class="form-control obg" id="nome_cidade" name="nome_cidade" placeholder="Digite o nome....">
                            </div>

                            <div class="form-group">
                                <label>Estado</label>
                                <select class="form-control select2" name="estado" id="estado" style="width: 100%;">
                                    <option selected="selected">Selecione....</option>
                                    <option value="1">Paraná</option>
                                </select>
                            </div>
                            <button class="btn btn-success" onclick=" return CadastrarCidade('form_cidade')" name="btn_cadastrar">Cadastrar</button>
                    </form>

                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Cidades Cadastrados</h3>

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
                                    <table class="table table-hover" id="table_result_Cidade">
                                        <thead>
                                            <tr>
                                                <th>Ação</th>
                                                <th>Nome da cidade</th>
                                                <th>Estado</th>


                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php for ($i = 0; $i < count($cidade); $i++) { ?>
                                                <tr>
                                                    <td>
                                                        <a href="#" onclick="AlterarCidadeModal('<?= $cidade[$i]['id'] ?>','<?= $cidade[$i]['nome_cidade'] ?>')" data-toggle="modal" data-target="#alteraCidade" class="btn btn-warning btn-xs">Alterar</a>
                                                        <a href="#" onclick="Excluir('<?= $cidade[$i]['id'] ?>','<?= $cidade[$i]['nome_cidade'] ?>')" class="btn btn-danger btn-xs">Excluir</a>
                                                    </td>
                                                    <td><?= $cidade[$i]['nome_cidade'] ?></td>
                                                    <td><?= $cidade[$i]['sigla_estado'] ?></td>
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

    <form action="cidade.php" method="post">
        <?php include_once 'modal/_alterar_cidade.php' ?>
        <?php include_once 'modal/_excluir.php' ?>
    </form>

    <?php include_once PATH_URL . '/Template/_includes/footer.php' ?>
    <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <?php include_once PATH_URL . '/Template/_includes/_scripts.php' ?>
    <?php include_once PATH_URL . '/Template/_includes/_msg.php' ?>
    <script src="../../Resource/ajax/cidade-ajx.js"></script>
    
</body>

</html>