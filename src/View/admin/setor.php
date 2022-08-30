<?php

require_once dirname(__DIR__, 2) . '/Resource/dataview/setor_dataview.php';?>
<!DOCTYPE html>
<html>

<head>
    
    <?php include_once PATH_URL . '/Template/_includes/_head.php' ?>
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <?php include_once PATH_URL . '/Template/_includes/_topo.php';
        include_once PATH_URL . '/Template/_includes/_menu.php' ?>
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Setor</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Administrador</a></li>
                                <li class="breadcrumb-item active">Gerenciar Setores</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <section class="content">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Gerencie os setores</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                        </div>
                    </div>
                    <form id="form_setor" method="post" action="setor.php">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Nome do setor</label>
                                <input class="form-control obg" id="nome" name="nome" placeholder="Digite o nome....">
                            </div>
                            <button class="btn btn-success" name="btn_cadastrar" onclick="return CadastrarSetor('form_setor')">Cadastrar</button>
                    </form>
                   
                </div>
               
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Setores Cadastrados</h3>
                                    <div class="card-tools">
                                        <div class="input-group input-group-sm" style="width: 150px;">
                                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                            </div>


                                        </div>

                                    </div>
                                </div>
                                <div class="card-body table-responsive p-0" >
                                    <table class="table table-hover" id="table_result_Setor">
                                        <thead>
                                            <tr>
                                                <th>Ação</th>
                                                <th>Nome do setor</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php for ($i = 0; $i < count($setor); $i++) { ?>
                                                <tr>
                                                    <td>
                                                        <a href="#" onclick="AlterarSetorModal('<?= $setor[$i]['id']?>', '<?= $setor[$i]['nome_setor']?>')" data-toggle="modal" data-target="#alterarSetor" class="btn btn-warning btn-xs">Alterar</a>
                                                        <a href="#" onclick="ExcluirModal('<?= $setor[$i]['id']?>', '<?= $setor[$i]['nome_setor']?>')"  data-toggle="modal" data-target="#modalExcluir" class="btn btn-danger btn-xs">Excluir</a>
                                                    </td>
                                                    <td><?= $setor[$i]['nome_setor'] ?></td>
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
                <div id="divload">

                </div>
        </div>
        <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <form action="setor.php" method="post">
    <?php include_once 'modal/_alterar_setor.php'?>
    <?php include_once 'modal/_excluir.php'?>
   
    </form>
    <?php include_once PATH_URL . '/Template/_includes/_footer.php' ?>
    <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <?php include_once PATH_URL . '/Template/_includes/_scripts.php' ?>
    <?php include_once PATH_URL . '/Template/_includes/_msg.php' ?>

    <script src="../../Resource/ajax/setor-ajx.js"></script>


</body>

</html>