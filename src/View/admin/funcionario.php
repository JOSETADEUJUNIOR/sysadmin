<?php require_once dirname(__DIR__, 2) . '/Resource/dataview/funcionario_dataview.php';

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
                            <h1>Novo Usuário</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Administrador</a></li>
                                <li class="breadcrumb-item active">insere (altera) usuário</li>
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
                        <h3 class="card-title">Insere (altera) os usuários aqui</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>

                        </div>
                    </div>
                    <form action="funcionario.php" method="post">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>tipo</label>
                                    <select class="form-control" id="tipo" name="tipo">
                                        <option value="">Selecione</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Setor</label>
                                    <select class="form-control" id="setor" name="setor">
                                        <option value="">Selecione</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Nome</label>
                                    <input class="form-control" id="nome" name="nome" placeholder="Digite o aqui....">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Sobrenome</label>
                                    <input class="form-control" id="sobrenome" name="sobrenome" placeholder="Digite o aqui....">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>E-mail</label>
                                    <input class="form-control" id="email" name="email" placeholder="Digite o aqui....">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Telefone</label>
                                    <input class="form-control" id="telefone" name="telefone" placeholder="Digite o aqui....">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Endereço</label>
                                    <input class="form-control" id="endereco" name="endereco" placeholder="Digite o aqui....">
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-success" onclick="return ValidarCampos(6)" name="btn_cadastrar">Gravar</button>
                        </form>

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
    <?php include_once PATH_URL . '/Template/_includes/_msg.php' ?>
</body>

</html>