<?php require_once dirname(__DIR__, 2) . '/Resource/dataview/produto_dataview.php'; ?>
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
                            <h1>Produto</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Administrador</a></li>
                                <li class="breadcrumb-item active">Gerenciar produto</li>
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
                                <h3 class="card-title">Filtro para impressão de Produto</h3>
                            </div>
                            <div class="card-body">

                                <a href="pdfProduto.php" target="_blank" style="background-color: #e7e4e1; color:black; border:1px solid #080808" class="btn btn-app">
                                    <i class="fas fa-barcode"></i> Todos Produtos
                                </a>
                                <a href="pdfProduto.php?EstoqMin" target="_blank" style="background-color: #f3de9f; color:black; border:1px solid #080808" class="btn btn-app">
                                    <i class="fas fa-barcode"></i> Produtos com estoque baixo
                                </a>
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
    <script src="../../Resource/ajax/produto-ajx.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#valorVenda").mask('000000.00', {
                reverse: true
            });
            $("#valorCompra").mask('000000.00', {
                reverse: true
            });
        });
    </script>
</body>

</html>