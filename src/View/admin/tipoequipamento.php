<?php require_once dirname(__DIR__, 2) . '/Resource/dataview/tipoequipamento_dataview.php';?>

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
                            <h1>Gerenciar os tipos de equipamentos aqui</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Administrador</a></li>
                                <li class="breadcrumb-item active">Gerenciar Tipos</li>
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
                        <h3 class="card-title">Gerencie os tipos de equipamentos</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>

                        </div>
                    </div>
                    <form action="tipoequipamento.php" id="form_tipoequip" method="post">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Nome do tipo</label>
                                <input class="form-control obg" id="nome" name="nome" placeholder="Digite o nome....">
                            </div>
                            <button class="btn btn-success" name="btn_cadastrar" onclick="return CadastrarTipo('form_tipoequip')">Cadastrar</button>

                    </form>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Tipos cadastrados</h3>

                                    <div class="card-tools">
                                        <div class="input-group input-group-sm" style="width: 150px;">
                                            <input type="text" name="table_search" class="form-control float-right" onkeyup="FiltrarTipo(this.value)" placeholder="Pesquisar Tipo">

                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-hover" id="tabela_result_tipo">
                                        <thead>
                                            <tr>
                                                <th>Ação</th>
                                                <th>Nome do tipo</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php for($i = 0; $i < count($tipos); $i++) { ?>
                                            <tr>
                                                <td>
                                                    <a href="#" onclick="AlterarTipoEquipamentoModal('<?=$tipos[$i]['id']?>','<?=$tipos[$i]['nome']?>')" data-toggle="modal" data-target="#alterarTipoEquipamento" class="btn btn-warning btn-xs">Alterar</a>
                                                    <a href="#" onclick="ExcluirModal('<?=$tipos[$i]['id']?>','<?=$tipos[$i]['nome']?>')" data-toggle="modal" data-target="#modalExcluir" class="btn btn-danger btn-xs">Excluir</a>
                                                </td>
                                                <td><?= $tipos[$i]['nome']?></td>
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
                <div id="divload"></div>
        </div>
        <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <form action="tipoequipamento.php" method="post">
    <?php include_once 'modal/_alterar_tipo_equipamento.php'?>
    <?php include_once 'modal/_excluir.php'?>
  
    
    </form>
    <?php include_once PATH_URL . '/Template/_includes/_footer.php' ?>
    <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <?php include_once PATH_URL . '/Template/_includes/_scripts.php' ?>;
    <?php include_once PATH_URL . '/Template/_includes/_msg.php' ?>;
    <script src="../../Resource/ajax/tipo-equipamento-ajx.js"></script>
</body>

</html>