<?php require_once dirname(__DIR__, 2) . '/Resource/dataview/Os_dataview.php'; ?>
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
                            <h1>Ordem de Serviço</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Administrador</a></li>
                                <li class="breadcrumb-item active">Filtrar OS para relatório</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->

            <section class="content">
                <div class="row">
                    <div class="col-12">
                        <!-- /.card-header -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Filtro para impressão de OS</h3>
                            </div>
                            <div class="card-body">

                                <a href="pdfOS.php" target="_blank" style="background-color: #e7e4e1; color:black; border:1px solid #080808" class="btn btn-app">
                                    <i class="fa fa-wrench"></i> Todas OS
                                </a>
                                <a href="pdfOS.php?OsMes" target="_blank" style="background-color: #f3de9f; color:black; border:1px solid #080808" class="btn btn-app">
                                    <i class="fa fa-wrench"></i> OS do Mês
                                </a>
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <select class="select2bs4 obg" data-placeholder="Selecione o cliente" id="Oscliente" name="Oscliente" style="width: 100%;">
                                            <?php foreach ($clientes as $cliente) { ?>
                                                <option value="<?= $cliente['CliID'] ?>" <?= $OsID == '' ? '' : ($ordemOS[0]['OsCliID'] == $cliente['CliID'] ? 'selected' : '') ?>><?= $cliente['CliNome'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-10">
                                
                                <button class="btn btn-success">Buscar</button>
                                            </div>
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
        <form action="produto.php" id="form_alt_prod" method="post">
            <?php include_once 'modal/_alterar_produto.php' ?>
            <?php include_once 'modal/_excluir.php' ?>

        </form>

        <?php include_once PATH_URL . '/Template/_includes/_footer.php' ?>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <?php include_once PATH_URL . '/Template/_includes/_scripts.php' ?>
    <?php include_once PATH_URL . '/Template/_includes/_msg.php' ?>
    <script src="../../Template/plugins/select2/js/select2.full.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
    
    <script>
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('#Oscliente').select2({
                theme: 'bootstrap4'
            })
        })
    </script>

</body>

</html>