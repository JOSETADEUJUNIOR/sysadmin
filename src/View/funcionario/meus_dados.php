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
                            <h1>Meus Dados</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Administrador</a></li>
                                <li class="breadcrumb-item active">Ver meus dados</li>
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
                        <h3 class="card-title">meus dados aqui</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>

                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Nome</label>
                                    <input class="form-control" id="nome" name="nome" placeholder="Digite o aqui....">
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
                        <button class="btn btn-success">Gravar</button>


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