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

                <!-- Default box -->
                <div id="CadProduto" class="card card-secondary collapsed-card">
                    <div class="card-header">
                        <h3 class="card-title">Dados dos produtos</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fa">Novo Produto</i></button>

                        </div>
                    </div>
                    <form action="produto.php" method="post" id="formCadProd">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Codigo de Barras</label>
                                        <input class="form-control obg" id="codBarra" name="codBarra" placeholder="Digite o aqui....">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Descrição</label>
                                        <input class="form-control obg" id="descricao" name="descricao" placeholder="Digite o aqui....">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Data Cadastro</label>
                                        <input type="date" class="form-control obg" id="dtCad" name="dtCad" placeholder="Digite o aqui....">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Valor de Compra</label>
                                        <input type="text" class="form-control obg" id="valorCompra" name="valorCompra" placeholder="Digite o aqui....">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Valor Venda</label>
                                        <input type="text" class="form-control obg" id="valorVenda" name="valorVenda" placeholder="Digite o aqui....">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Estoque</label>
                                        <input class="form-control obg" id="estoque" name="estoque" placeholder="Digite o aqui....">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Estoque Mínimo</label>
                                        <input class="form-control obg" id="estoqueMin" name="estoqueMin" placeholder="Digite o aqui....">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Imagem do produto </label>
                                        <div class="custom-file">
                                            <input type="file" name="ProdImagem" id="ProdImagem" value="<?= $user[0]['ProdImage'] ?>" class="custom-file-input">
                                            <label class="custom-file-label" for="customFile">escolher Imagem</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-success" onclick="return CadastrarProduto('form_produto')" name="btn_cadastrar">Cadastrar</button>-->
                            <button name="btnAlterar" class="btn btn-outline-dark">Salvar</button>
                    </form>

                </div>
                <div id="CadProdutoBody" class="card-body">
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
                            <h3 class="card-title">clientes Cadastrados</h3>

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
                            <table class="table table-hover" id="tabela_result_produto">
                                <thead>
                                    <tr>
                                        <th>Ação</th>
                                        <th>Codigo Barras</th>
                                        <th>Descrição</th>
                                        <th>Valor Compra</th>
                                        <th>Valor Venda</th>
                                        <th>Estoque Mínimo</th>
                                        <th>Estoque</th>
                                        <th>Imagem</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php for ($i = 0; $i < count($produto); $i++) { ?>
                                        <tr>
                                            <td>
                                                <a href="#" onclick="AlterarProdutoModal('<?= $produto[$i]['ProdID'] ?>', '<?= $produto[$i]['ProdDescricao'] ?>','<?= $produto[$i]['ProdDtCriacao'] ?>','<?= $produto[$i]['ProdCodBarra'] ?>','<?= $produto[$i]['ProdValorCompra'] ?>','<?= $produto[$i]['ProdValorVenda'] ?>','<?= $produto[$i]['ProdEstoqueMin'] ?>','<?= $produto[$i]['ProdEstoque'] ?>','<?= $produto[$i]['ProdImagem'] ?>')" data-toggle="modal" data-target="#alterarProduto" class="btn btn-warning btn-xs">Alterar</a>
                                                <a href="#" onclick="ExcluirModal('<?= $produto[$i]['ProdID'] ?>', '<?= $produto[$i]['ProdDescricao'] ?>')" data-toggle="modal" data-target="#modalExcluir" class="btn btn-danger btn-xs">Excluir</a>
                                            </td>
                                            <td><?= $produto[$i]['ProdCodBarra'] ?></td>
                                            <td><?= $produto[$i]['ProdDescricao'] ?></td>
                                            <td><?= $produto[$i]['ProdValorCompra'] ?></td>
                                            <td><?= $produto[$i]['ProdValorVenda'] ?></td>
                                            <td><?= $produto[$i]['ProdEstoqueMin'] ?></td>
                                            <td><?= $produto[$i]['ProdEstoque'] ?></td>
                                            <td><a href="../../Resource/dataview/<?= $produto[$i]['ProdImagemPath'] ?>" target="_blank" rel="noopener noreferrer"><img src="../../Resource/dataview/<?= $produto[$i]['ProdImagemPath'] ?>" alt="<?= $produto[$i]['ProdImagemPath'] ?>" class="brand-image img-circle elevation-3" width="50px" height="50px"></a></td>


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