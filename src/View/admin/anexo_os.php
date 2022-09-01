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
                                <form id="form_anx_os" action="anexo_os.php" method="post">
                                    <input type="hidden" name="OsAnxID" id="OsAnxID" value="<?= $ordemOS[0]['OsID'] ?>">

                            </div>



                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nome do Anexo</label>
                                    <input class="form-control obg" type="text" name="anxNome" id="anxNome">
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="form-group">
                                    <label>Imagem do produto </label>
                                    <div class="custom-file">
                                        <input type="file" name="anxImagem" id="anxImagem" class="custom-file-input">
                                        <label class="custom-file-label" for="customFile">escolher Imagem</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="form-group">
                                    <label>Add</label>
                                    <button class=" form-control btn btn-success btn-xs" onclick="return InserirAnxOs('form_anx_os')" name="btnAddAnx"><i class="fas fa-edit"></i></button>
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
            </section>

            <section class="content">
                <div class="row">
                    <div class="col-12">
                        <div class="card ">
                            <div class="card-header ">
                                <h3 class="card-title">Anexos e documentos da OS</h3>


                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover" id="tabela_result_anx">
                                    <thead>
                                        <tr>
                                            <th>Ação</th>
                                            <th>Nome</th>
                                            <th>Tipo</th>
                                            <th>Arquivo</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $subTotal = 0;
                                        for ($i = 0; $i < count($AnxOs); $i++) {
                                            if ($AnxOs[$i]['AnxOsID'] != '') { ?>
                                                <tr>
                                                    <td>
                                                        <a href="#" onclick="ExcluirModalAnx('<?= $AnxOs[$i]['AnxOsID'] ?>','<?= $AnxOs[$i]['AnxID'] ?>','<?= $AnxOs[$i]['AnxNome'] ?>')" data-toggle="modal" data-target="#modalExcluirAnx"><i style="color:red" class="fas fa-trash-alt"></i></a>
                                                    </td>
                                                    <td><?= $AnxOs[$i]['AnxNome'] ?></td>
                                                    <td><i style="color:red" class="<?= (explode('.', $AnxOs[$i]['AnxPath'])[1] == 'png' ? 'fas fa-image' : 'fa fa-file-pdf') ?>"></i></td>
                                                    <td><a href="../../Resource/dataview/<?= $AnxOs[$i]['AnxPath'] ?>" target="_blank" rel="noopener noreferrer">visualizar arquivo </a>
                                                    </td>



                                                </tr>
                                        <?php }
                                        } ?>

                                    </tbody>

                                </table>
                        

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
        <form action="anexo_os.php" id="form_anx_os" method="post">
            <?php include_once 'modal/_excluir_anx.php' ?>
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