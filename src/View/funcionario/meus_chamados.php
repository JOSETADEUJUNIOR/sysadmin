<?php require_once dirname(__DIR__, 3) . '/vendor/autoload.php';

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
                            <h1>Setor</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Administrador</a></li>
                                <li class="breadcrumb-item active">Consulta chamado</li>
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
                        <h3 class="card-title">Meus Chamados</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>

                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Escolha a situação</label>
                            <select class="form-control" id="situacao" name="situacao">
                                <option value="">Selecione</option>
                            </select>
                        </div>
                        <button class="btn bg-gradient-info btn-xs">Pesquisar</button>


                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Resultados encontrados</h3>

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
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Data Abertura</th>
                                                    <th>Funcionário</th>
                                                    <th>Problema</th>
                                                    <th>Data Atendimento</th>
                                                    <th>Técnico</th>
                                                    <th>Data Encerramento</th>
                                                    <th>Laudo</th>
                                                    <th>Ação</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>((Nome))</td>
                                                    <td>((Funcionário))</td>
                                                    <td>((Problema))</td>
                                                    <td>((Data Atendimento))</td>
                                                    <td>((Técnico))</td>
                                                    <td>((Data Encerramento))</td>
                                                    <td>((Laudo))</td>
                                                    <td>
                                                        <a href="#" class="btn bg-gradient-info btn-xs">Ver Mais</a>
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card -->

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <?php include_once PATH_URL . '/Template/_includes/footer.php' ?>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <?php include_once PATH_URL . '/Template/_includes/_scripts.php' ?>
</body>

</html>