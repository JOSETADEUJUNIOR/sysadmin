<?php require_once dirname(__DIR__, 2) . '/Resource/dataview/equipamento_dataview.php';

?>

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
                                <li class="breadcrumb-item active"><?= $id=='' ? 'Novo':'Alterar'?> equipamento</li>
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
                        <h3 class="card-title"><?= $id=='' ? 'Novo':'Alterar'?> equipamentos aqui</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>

                        </div>
                    </div>
                    <form action="equipamento.php" method="post" id="form_equipamento">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>tipo do equipamento</label>
                                    <select class="form-control obg" id="tipo" name="tipo">
                                           <?php for($i=0; $i < count($tipos); $i++){ ?>
                                        <option value="<?= $tipos[$i]['id']?>" <?= $id =='' ?'':($dados['tipoequip_id'] == $tipos[$i]['id'] ? 'selected': '')?> ><?= $tipos[$i]['nome']?></option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Modelo do equipamento</label>
                                    <select class="form-control obg" id="modelo" name="modelo">
                                        <?php for($i=0; $i < count($modelo); $i++){ ?>
                                        <option value="<?= $modelo[$i]['id']?>" <?= $id ==''?'':($dados['modeloequip_id'] == $modelo[$id]['id']?'selected':'')?>><?= $modelo[$i]['nome']?></option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Identificação</label>
                                    <input class="form-control obg" id="identificacao" name="identificacao" value="<?= $id!='' ? $dados[0]['tipoequip_id'] : ''?>">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Descrição</label>
                                    <textarea class="form-control obg" id="descricao" name="descricao" placeholder="Digite o aqui...."><?php echo $id!='' ? $dados[0]['descricao'] : ''?></textarea>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-success" onclick="return CadastrarEquipamento('form_equipamento')" name="btn_cadastrar">Cadastrar</button>

                        </form>
                    </div> 
                
                    <div id="divload">

                    </div>
                </div>
                <!-- /.card -->

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <form action="equipamento.php" method="post">
        <?php include_once 'modal/_alterar_equipamento.php'?>
        <?php include_once 'modal/_excluir.php'?>

        </form>
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