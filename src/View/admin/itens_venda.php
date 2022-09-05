<?php require_once dirname(__DIR__, 2) . '/Resource/dataview/Venda_dataview.php';

use Src\_public\Util;
?>
<!DOCTYPE html>
<html>

<head>
    <?php include_once PATH_URL . '/Template/_includes/_head.php' ?>
    <!-- Tempusdominus Bbootstrap 4 -->
    <!-- Select2 -->
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
                            <h1>Itens da Venda</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Administrador</a></li>
                                <li class="breadcrumb-item active">Gerenciar Vendas</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">

                <!-- Default box -->
                <div id="CadCliente" class="card card-secondary ">
                    <div class="card-header">
                        <h3 class="card-title">Itens da venda</h3>
                    </div>
                    <form id="form_itens" action="itens_venda.php" method="post">
                        <div class="card-body">
                            <h3>Numero da venda:<?= ($venda[0]['VendaID'] != '' ? '00' . $venda[0]['VendaID'] : '') ?></h3></br>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Cliente</label>

                                        <input disabled class="form-control" id="OsCli" name="OsCli" value="<?= $venda[0]['CliNome'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Data Venda</label>
                                        <input disabled class="form-control" id="OsID" name="OsID" value="<?= Util::ExibirDataBr($venda[0]['VendaDT']) ?>">
                                    </div>
                                </div>
                               
                                <div class="col-md-8">
                    </form>
                    <form id="form_itens_venda" action="itens_venda.php" method="post">
                        <input type="hidden" name="VendaProdID" id="VendaProdID" value="<?= $venda[0]['VendaID'] ?>">
                        <div class="form-group">
                            <label>Produto</label>
                            <select class="select2bs4 obg" data-placeholder="Selecione o produto" id="produto" name="produto" style="width: 100%;">
                                <option value="">Selecione...</option>
                                <?php foreach ($produtos as $produto) { ?>
                                    <option value="<?= $produto['ProdID'] ?>"><?= $produto['ProdDescricao'] . '| Preço: ' . $produto['ProdValorVenda'] . '| Estoque: ' . $produto['ProdEstoque'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Quantidade</label>
                        <input class="form-control obg" name="qtdProd" id="qtdProd">
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="form-group">
                        <label>Add</label>
                        <button class="form-control btn btn-success btn-xs" onclick="return InserirProdVenda('form_itens_venda')" name="btnAddItem"><i class="fas fa-edit"></i></button>
                    </div>
                </div>
                </form>
                
            </form>
        </div>
        <a href="venda.php" class=" form-control btn btn-outline-warning col-md-12 ">Voltar para OS</a>


    </div>
    <div id="CadOsBody" class="card-body">
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
                <div class="card ">
                    <div class="card-header ">
                        <h3 class="card-title">Itens da venda</h3>


                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover" id="tabela_result_item_venda">
                            <thead>
                                <tr>
                                    <th>Ação</th>
                                    <th>Produto</th>
                                    <th>Quantidade</th>
                                    <th>Valor</th>
                                    <th>Valor Total</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php $subTotal = 0; 
                                for ($i = 0; $i < count($ProdVenda); $i++) {
                                    if ($ProdVenda[$i]['ItensProdID'] != '') { $subTotal = $subTotal + $ProdVenda[$i]['ProdValorVenda'] ?>
                                        <tr>
                                            <td>
                                                <a href="#" onclick="ExcluirModalItemVenda('<?= $ProdVenda[$i]['VendaID'] ?>','<?= $ProdVenda[$i]['ItensID'] ?>','<?= $ProdVenda[$i]['ProdDescricao'] ?>','<?= $ProdVenda[$i]['ItensProdID'] ?>','<?= $ProdVenda[$i]['ItensQtd'] ?>')" data-toggle="modal" data-target="#modalExcluirItemVenda"><i style="color:red" class="fas fa-trash-alt"></i></a>
                                            </td>
                                            <td><?= $ProdVenda[$i]['ProdDescricao'] ?></td>
                                            <td><?= $ProdVenda[$i]['ItensQtd'] ?></td>
                                            <td><?= $ProdVenda[$i]['ProdValorVenda'] ?></td>
                                            <td><?= $ProdVenda[$i]['ItensSubTotal'] ?></td>


                                        </tr>
                                <?php }
                                } ?>

                            </tbody>
                            </hr>
                            <tbody>
                            <tr style="background-color: #dfdfdf;">
                            <td colspan="3" ><span><strong>Total de valores dos itens: </strong></span></td>
                            <td colspan="1" ><strong><?= 'R$: '. Util::FormatarValor($subTotal) ?></strong></td>
                            <td colspan="2" ><strong><?= 'R$: '. Util::FormatarValor($venda[0]['VendaValorTotal']) ?></strong></td>
                            </tr>
                        </tbody>
                        </table>
                        <hr>
                        
                    </div>

                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        </div>
        

    </section>

    <!-- /.content -->

    <!-- /.content-wrapper -->
    <form action="venda.php" id="form_alt_venda" method="post">
        <?php include_once 'modal/_alterar_os.php' ?>
        <?php include_once 'modal/_excluirItemVenda.php' ?>
       

    </form>
    <?php include_once PATH_URL . '/Template/_includes/_footer.php' ?>
    <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <?php include_once PATH_URL . '/Template/_includes/_scripts.php' ?>
    <?php include_once PATH_URL . '/Template/_includes/_msg.php' ?>
    <script src="../../Resource/ajax/venda-ajx.js"></script>
    <script src="../../Template/plugins/select2/js/select2.full.min.js"></script>


    <script>
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('#produto').select2({
                theme: 'bootstrap4'
            })
            $('#servico').select2({
                theme: 'bootstrap4'
            })

            $('#AlteraOscliente').select2({
                theme: 'bootstrap4'
            })

        })
    </script>

</body>

</html>