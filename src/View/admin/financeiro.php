<?php require_once dirname(__DIR__, 2) . '/Resource/dataview/financeiro_dataview.php';

use Src\_public\Util; ?>

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
                            <h1>Financeiro</h1>
                            <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#faturar">Nova Receita</button>
                            <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#FaturaDespesa">Nova Receita</button>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Administrador</a></li>
                                <li class="breadcrumb-item active">Consulta lançamentos</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <form id="gravarLancamento" method="post">
                    <!-- Default box -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Consultar Lançamentos por tipo</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i></button>

                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">

                                <div class="form-group col-md-6">
                                    <label>Filtrar Por:</label>
                                    <select class="form-control obg" id="tipo" name="tipo">
                                        <option value="3">TODOS</option>
                                        <option value="<?= LANCAMENTO_RECEITA ?>">RECEITA</option>
                                        <option value="<?= LANCAMENTO_DESPESA ?>">DESPESA</option>


                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Data Inicial</label>
                                        <input type="date" class="form-control" id="dtInicio" name="dtInicio" value="<?= date('Y-m-01') ?>" placeholder="Digite o aqui....">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Data Final</label>
                                        <input type="date" class="form-control" id="dtFinal" name="dtFinal" value="<?= date('Y-m-t') ?>" placeholder="Digite o aqui....">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <center>
                                        <button name="btn_consultar" id="btn_consultar" class="btn btn-success col-md-12" onclick=" return ConsultarLancamentos('gravarLancamento')">Pesquisar</button>
                                    </center>
                                </div>
                            </div>
                        </div>
                </form>
                <div class="card-body" id="tabela_result_financeiro">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Lançamentos realizados</h3>


                                </div>
                                <!-- /.card-header -->
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Cliente</th>
                                                <th>Descrição</th>
                                                <th>Data Vencimento</th>
                                                <th>Data Pagamento</th>
                                                <th>Tipo</th>
                                                <th>Valor</th>
                                                <th>Ação</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($lancamentos as $lanc) {
                                                if ($lanc['Tipo'] == 1) {
                                                    $totReceita = $totReceita + $lanc['LancValor'];
                                                } else {
                                                    $totDespesa = $totDespesa + $lanc['LancValor'];
                                                }
                                                $Total = $totReceita - $totDespesa;
                                            ?>
                                                <tr>

                                                    <td><?= $lanc['CliNome'] ?></td>
                                                    <td><?= $lanc['LancDescricao'] ?></td>
                                                    <td><?= Util::ExibirDataBr($lanc['LancDtVencimento']) ?></td>
                                                    <td><?= Util::ExibirDataBr($lanc['LancDtPagamento']) ?></td>
                                                    <td><?= ($lanc['Tipo'] == 1 ? '<span class="btn btn-success btn-xs">Receita</span>' : '<span class="btn btn-danger btn-xs">Despesa</span>') ?></td>
                                                    <td><?= $lanc['LancValor'] ?></td>
                                                    <td>
                                                        <?php if ($lanc['Tipo'] == 1) { ?>
                                                            <a href="#" onclick="ModalFatura('<?= $lanc['LancID'] ?>','<?= $lanc['LancDescricao'] ?>','<?= $lanc['LancClienteID'] ?>','<?= $lanc['LancValor'] ?>','<?= $lanc['LancDtVencimento'] ?>','<?= $lanc['LancDtPgto'] ?>')" data-toggle="modal" data-target="#Alterafatura"><i class="fas fa-edit"></i></a>
                                                        <?php } else if ($lanc['Tipo'] == 2) { ?>

                                                            <a href="#" onclick="ModalDespesa('<?= $lanc['LancID'] ?>','<?= $lanc['LancDescricao'] ?>','<?= $lanc['LancClienteID'] ?>','<?= $lanc['LancValor'] ?>','<?= $lanc['LancDtVencimento'] ?>','<?= $lanc['LancDtPgto'] ?>')" data-toggle="modal" data-target="#alterar_despesa"><i class="fas fa-edit"></i></a>

                                                        <?php } ?>

                                                        <a href="#" onclick="ExcluirModal('<?= $lanc['LancID'] ?>', '<?= $lanc['CliNome'] ?>')" data-toggle="modal" data-target="#modalExcluir"><i style="color:red" class="fas fa-trash-alt"></i></a>
                                                    </td>
                                                </tr>
                                            <?php } ?>

                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="5" style="text-align: right; color: green"> <strong>Total Receitas:</strong></td>
                                                <td colspan="2" style="text-align: left; color: green"><strong>R$ <?= Util::FormatarValor($totReceita) ?></strong></td>
                                            </tr>
                                            <tr>
                                                <td colspan="5" style="text-align: right; color: red"> <strong>Total Despesas:</strong></td>
                                                <td colspan="2" style="text-align: left; color: red"><strong>R$ <?= Util::FormatarValor($totDespesa) ?></strong></td>
                                            </tr>
                                            <tr>
                                                <td colspan="5" style="text-align: right"> <strong>Saldo:</strong></td>
                                                <td colspan="2" style="text-align: left;"><strong>R$ <?= Util::FormatarValor($Total) ?></strong></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>

                        <!-- /.card -->
               </section>
            <!-- /.content -->

            <!-- /.content-wrapper -->

            <!-- /.control-sidebar -->
            <form id="excluir_lancamento" action="financeiro.php" method="post">
                <?php include_once 'modal/_excluir.php' ?>
            </form>
            <form action="financeiro.php" method="post">
                <?php include_once 'modal/_faturar.php' ?>
                <?php include_once 'modal/_faturar_despesa.php' ?>
                <?php include_once 'modal/_alterar_despesa.php' ?>
                <?php include_once 'modal/_alterar_fatura.php' ?>
            </form>


        </div>
        <?php include_once PATH_URL . '/Template/_includes/_footer.php' ?>
        <!-- ./wrapper -->

        <!-- jQuery -->
        <?php include_once PATH_URL . '/Template/_includes/_scripts.php' ?>
        <?php include_once PATH_URL . '/Template/_includes/_msg.php' ?>
        <script src="../../Resource/ajax/financeiro-ajx.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $("#faturaValor").mask('000000.00', {
                    reverse: true
                });
                $("#AlterafaturaValor").mask('000000.00', {
                    reverse: true
                });
                $("#DespValor").mask('000000.00', {
                    reverse: true
                });
            });
        </script>
</body>

</html>