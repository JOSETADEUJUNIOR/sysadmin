<?php require_once dirname(__DIR__, 2) . '/Resource/dataview/Os_dataview.php';

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
                            <h1>Ordem de Serviço</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Administrador</a></li>
                                <li class="breadcrumb-item active">Gerenciar OS</li>
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
                        <h3 class="card-title">Itens da ordem</h3>
                    </div>
                    <form id="form_itens" action="itens_os.php" method="post">
                        <div class="card-body">
                            <h3>Numero da Ordem:<?= ($ordemOS[0]['OsID'] != '' ? '00' . $ordemOS[0]['OsID'] : '') ?></h3></br>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Cliente</label>

                                        <input disabled class="form-control" id="OsCli" name="OsCli" value="<?= $ordemOS[0]['nomeCliente'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Técnico</label>
                                        <input disabled class="form-control" id="OsID" name="OsID" value="<?= $ordemOS[0]['OsTecID'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Status</label>
                                        <?php
                                        $status = '';
                                        if ($ordemOS[0]['OsStatus'] == "O") {
                                            $status = "Orçamento";
                                        } else if ($ordemOS[0]['OsStatus'] == "A") {
                                            $status = "Aberto";
                                        } else if ($ordemOS[0]['OsStatus'] == "EA") {
                                            $status = "Em aberto";
                                        } else if ($ordemOS[0]['OsStatus'] == "F") {
                                            $status = "Finalizada";
                                        } else if ($ordemOS[0]['OsStatus'] == "C") {
                                            $status = "Cancelado";
                                        } ?>

                                        <input disabled class="form-control" id="OsID" name="OsID" value="<?= $status ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Data Inicial</label>
                                        <input disabled class="form-control" id="OsID" name="OsID" value="<?= Util::ExibirDataBr($ordemOS[0]['OsDtInicial']) ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Data Final</label>
                                        <input disabled class="form-control" id="OsID" name="OsID" value="<?= Util::ExibirDataBr($ordemOS[0]['OsDtFinal']) ?>">
                                    </div>
                                </div>
                                <div class="col-md-8">
                    </form>
                    <form id="form_itens_os" action="itens_os.php" method="post">
                        <input type="hidden" name="OsProdID" id="OsProdID" value="<?= $ordemOS[0]['OsID'] ?>">
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
                        <button class="form-control btn btn-success btn-xs" onclick="return InserirProd('form_itens_os')" name="btnAddItem"><i class="fas fa-edit"></i></button>
                    </div>
                </div>
                </form>
                <div class="col-md-8">

                    <form id="form_serv_os" action="itens_os.php" method="post">
                        <input type="hidden" name="OsServID" id="OsServID" value="<?= $ordem[0]['OsID'] ?>">
                        <div class="form-group">
                            <label>Serviço</label>
                            <select class="select2bs4 obg" data-placeholder="Selecione o serviço" id="servico" name="servico" style="width: 100%;">
                                <option value="">Selecione...</option>
                                <?php foreach ($servicos as $servico) { ?>
                                    <option value="<?= $servico['ServID'] ?>"><?= $servico['ServNome'] . '| Preço: ' . $servico['ServValor'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Quantidade</label>
                        <input class="form-control obg" type="text" name="qtdServ" id="qtdServ">
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="form-group">
                        <label>Add</label>
                        <button class=" form-control btn btn-success btn-xs" onclick="return InserirServ('form_serv_os')" name="btnAddItem"><i class="fas fa-edit"></i></button>
                    </div>
                </div>
            </form>
        </div>
        <a href="ordem_servico.php" class=" form-control btn btn-outline-warning col-md-12 ">Voltar para OS</a>


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
                        <h3 class="card-title">Itens e Serviços</h3>


                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover" id="tabela_result_item">
                            <thead>
                                <tr>
                                    <th>Ação</th>
                                    <th>Produto/Serviço</th>
                                    <th>Tipo</th>
                                    <th>Quantidade</th>
                                    <th>Valor</th>
                                    <th>Valor Total</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php $subTotal = 0; 
                                for ($i = 0; $i < count($ProdOrdem); $i++) {
                                    if ($ProdOrdem[$i]['ProdOsProdID'] != '') { $subTotal = $subTotal + $ProdOrdem[$i]['ProdValorVenda'] ?>
                                        <tr>
                                            <td>
                                                <a href="#" onclick="ExcluirModalItem('<?= $ProdOrdem[$i]['OsID'] ?>','<?= $ProdOrdem[$i]['ProdOsID'] ?>','<?= $ProdOrdem[$i]['ProdDescricao'] ?>','<?= $ProdOrdem[$i]['ProdOsProdID'] ?>','<?= $ProdOrdem[$i]['ProdOsQtd'] ?>')" data-toggle="modal" data-target="#modalExcluirItem"><i style="color:red" class="fas fa-trash-alt"></i></a>
                                            </td>
                                            <td><?= $ProdOrdem[$i]['ProdDescricao'] ?></td>
                                            <td><span class="btn btn-block btn-outline-primary btn-xs"> Produto</span></td>
                                            <td><?= $ProdOrdem[$i]['ProdOsQtd'] ?></td>
                                            <td><?= $ProdOrdem[$i]['ProdValorVenda'] ?></td>
                                            <td><?= $ProdOrdem[$i]['ProdOsSubTotal'] ?></td>


                                        </tr>
                                <?php }
                                } ?>

                            </tbody>
                            </hr>
                            <tbody>
                                <?php for ($i = 0; $i < count($ProdServOrdem); $i++) {
                                    if ($ProdServOrdem[$i]['ServOsServID'] != '') { $subTotal = $subTotal + $ProdServOrdem[$i]['ServValor']  ?>
                                        <tr>
                                            <td>
                                                <a href="#" onclick="ExcluirModalServ('<?= $ProdServOrdem[$i]['OsID'] ?>','<?= $ProdServOrdem[$i]['ServOsID'] ?>','<?= $ProdServOrdem[$i]['ServNome'] ?>','<?= $ProdServOrdem[$i]['ServOsServID'] ?>','<?= $ProdServOrdem[$i]['ServOsQtd'] ?>')" data-toggle="modal" data-target="#modalExcluirServ"><i style="color:red" class="fas fa-trash-alt"></i></a>
                                            </td>
                                            <td><?= $ProdServOrdem[$i]['ServNome'] ?></td>
                                            <td><span class="btn btn-block btn-outline-secondary btn-xs"> Serviço</span></td>
                                            <td><?= $ProdServOrdem[$i]['ServOsQtd'] ?></td>
                                            <td><?= $ProdServOrdem[$i]['ServValor'] ?></td>
                                            <td><?= $ProdServOrdem[$i]['ServOsSubTotal'] ?></td>
                                        </tr>
                                    <?php } ?>
                                <?php } ?>

                            </tbody>
                            <tbody>
                            <tr style="background-color: #dfdfdf;">
                            <td colspan="4" ><span><strong>Total de valores da OS: </strong></span></td>
                            <td colspan="1" ><strong><?= 'R$: '. $subTotal ?></strong></td>
                            <td colspan="2" ><strong><?= 'R$: '. $ordemOS[0]['OsValorTotal'] ?></strong></td>
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
    <form action="ordem_servico.php" id="form_alt_os" method="post">
        <?php include_once 'modal/_alterar_os.php' ?>
        <?php include_once 'modal/_excluirItem.php' ?>
        <?php include_once 'modal/_excluirServ.php' ?>

    </form>
    <?php include_once PATH_URL . '/Template/_includes/_footer.php' ?>
    <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <?php include_once PATH_URL . '/Template/_includes/_scripts.php' ?>
    <?php include_once PATH_URL . '/Template/_includes/_msg.php' ?>
    <script src="../../Resource/ajax/os-ajx.js"></script>
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