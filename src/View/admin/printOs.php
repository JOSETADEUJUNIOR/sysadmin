<?php require_once dirname(__DIR__, 2) . '/Resource/dataview/Os_dataview.php'; ?>

<!DOCTYPE html>
<html>

<head>
    <?php include_once PATH_URL . '/Template/_includes/_head.php' ?>
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
                            <h1>Filtrar OS para impressão</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="ordem_servico.php">Administrador</a></li>
                                <li class="breadcrumb-item active">OS para impressão</li>
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
                        <h3 class="card-title">Filtros para impressão de OS</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>

                        </div>
                    </div>

                    <form action="pdfOS.php" method="get" target="_blank">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <a href="pdfOS.php" target="_blank" style="background-color: #e7e4e1; color:black; border:1px solid #080808" class="btn btn-app col-md-12">
                                        <i class="fa fa-wrench"></i> Todas OS
                                    </a>
                                </div>
                                <div class="form-group col-md-6">
                                    <a href="pdfOS.php?OsMes" target="_blank" style="background-color: #f3de9f; color:black; border:1px solid #080808" class="btn btn-app col-md-12">
                                        <i class="fa fa-wrench"></i> OS do Mês
                                    </a>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="">Buscar por Cliente</label>
                                    <select class="select2bs4 obg" id="Oscliente" name="Oscliente" style="width: 100%;">
                                        <option selected value="">Todos</option>
                                        <?php foreach ($clientes as $cliente) { ?>
                                            <option value="<?= $cliente['CliID'] ?>"><?= $cliente['CliNome'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Filtrar Por:</label>
                                    <select class="form-control obg" id="tipo" name="tipo">
                                        <option value="'O','A','EA','F','C'">Todas</option>
                                        <option value="'O'">ORÇAMENTO</option>
                                        <option value="'A'">Aberta</option>
                                        <option value="'EA'">ANDAMENTO</option>
                                        <option value="'F'">FINALIZADAS</option>
                                        <option value="'C'">CANCELADAS</option>



                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <center>
                                        <button class="btn btn-success col-md-12">Buscar</button>
                                    </center>
                                </div>
                    </form>
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
    <?php include_once PATH_URL . '/Template/_includes/_msg.php' ?>
    <script src="../../Template/plugins/select2/js/select2.full.min.js"></script>


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