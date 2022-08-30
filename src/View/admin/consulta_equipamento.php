<?php require_once dirname(__DIR__, 2) . '/Resource/dataview/equipamento_dataview.php'; ?>

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
                            <h1>Equipamento</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Administrador</a></li>
                                <li class="breadcrumb-item active">Consulta equipamento</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
            <form id="form_consultaEquip">
                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Consulta equipamento por Tipo</h3>

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
                                    <option value="<?= FILTRO_TIPO ?>">TIPO</option>
                                    <option value="<?= FILTRO_MODELO ?>">MODELO</option>
                                    <option value="<?= FILTRO_IDENTIFICACAO ?>">IDENTIFICACAO</option>
                                    <option value="<?= FILTRO_DESCRICAO ?>">DESCRICAO</option>

                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Escolha o filtro</label>
                                <input id="filtro_palavra" name="filtro_palavra" class="form-control obg">
                            </div>
                            <div class="col-md-12">
                            <center>   
                                <button name="btn_consultar" id="btn_consultar" class="btn btn-secondary" onclick=" return ConsultarEquipamentos('form_consultaEquip')">Pesquisar</button>
                            </center>   
                        </div>
                        </div>
                    </div>
                    </form>
                    <div class="card-body" id="divResult" style="display:none;">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Equipamento Cadastrados</h3>


                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body table-responsive p-0" >
                                        <table class="table table-hover" id="tabela_result_equipamento">
                                            <thead>
                                                <tr>
                                                    <th>Tipo</th>
                                                    <th>Modelo</th>
                                                    <th>Identificação</th>
                                                    <th>Descrição</th>
                                                    <th>Ação</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($equipamento as $equip) { ?>
                                                    <tr>
                                                        <td><?= $equip['nomeTipo'] ?></td>
                                                        <td><?= $equip['nomeModelo'] ?></td>
                                                        <td><?= $equip['identificacao'] ?></td>
                                                        <td><?= $equip['descricao'] ?></td>
                                                        <td>
                                                        <a href="equipamento.php?id=<?= $equip['idEquip']?>" class="btn btn-warning btn-xs">Alterar</a>
                                                <a href="#" class="btn btn-danger btn-xs">Excluir</a>
                                                        </td>
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
    <script src="../../Resource/ajax/equipamento-ajx.js"></script>
</body>

</html>