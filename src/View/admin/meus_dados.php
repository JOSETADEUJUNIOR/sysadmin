<?php
require_once dirname(__DIR__, 2) . '/Resource/dataview/meusdados_dataview.php'; ?>

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
                            <h1>Dados Cadastrais</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active">Dados Usuário</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-3">

                            <!-- Profile Image -->
                            <div class="card card-primary card-outline" id="table_result_Usuario">
                               <div class="card-header" style="background-color:blue">
                                    <h3 class="card-title" style="color:white">Informações do Usuário</h3>
                                </div>
                                 <div class="card-body box-profile">
                                    <div class="text-center">
                                        <img class="profile-user-img img-fluid img-circle" src="../../Resource/dataview/<?= $user[0]['UserLogoPath']?>" alt="User profile picture">
                                    </div>

                                    <h3 class="profile-username text-center"><?= $user[0]['nome'] ?></h3>

                                    <p class="text-muted text-center"><?= $user[0]['tipo'] ?></p>

                                    <ul class="list-group list-group-unbordered mb-3">
                                        <li class="list-group-item">
                                            <b>Telefone</b> <a class="float-right"><?= $user[0]['telefone'] ?></a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>E-mail</b> <a class="float-right"><?= $user[0]['login'] ?></a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Status</b> <a class="float-right"><?= ($user[0]['status']==1?'<small class="btn btn-success btn-xs">Ativo</small>':'<small class="btn btn-danger btn-xs">Inativo</small>') ?></a>
                                        </li>
                                    </ul>
                                    <a href="#" onclick="AlterarUsuarioModal('<?= $user[0]['EmpID'] ?>', '<?= $user[0]['nome'] ?>','<?= $user[0]['login'] ?>','<?= $user[0]['senha'] ?>','<?= $user[0]['telefone'] ?>','<?= $user[0]['UserLogo'] ?>','<?= $user[0]['UserLogoPath'] ?>')" data-toggle="modal" data-target="#alterarUsuario" class="btn btn-primary btn-block">Alterar Dados Usuario</a>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->

                            <!-- About Me Box -->
                           
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->

                        <div class="col-md-9" >
                            <div class="card card-primary" id="table_result_Empresa" >
                                <div class="card-header">
                                    <h3 class="card-title">Informações da Empresa</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="position-relative">
                                                <img src="../../Resource/dataview/<?= $dados[0]['EmpLogoPath']?>" heigth="180px" width="120px" alt="Photo 2" class="img-fluid">
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body " >
                                    <strong><i class="fas fa-book mr-1"></i>Dados Cadastrais</strong>

                                    <p class="text-muted">
                                        <?= $dados[0]['EmpNome'] . ' - ' . $dados[0]['EmpCNPJ'] ?>
                                    </p>

                                    <hr>

                                    <strong><i class="fas fa-map-marker-alt mr-1"></i> Endereço</strong>

                                    <p class="text-muted"><?= 'Endereço: ' . $dados[0]['EmpEnd'] . ', ' . $dados[0]['EmpNumero'] . ' - ' . $dados[0]['EmpCidade'] ?></p>

                                    <hr>

                                    <strong><i class="fas fa-pencil-alt mr-1"></i> Quantidade de Usuários</strong>

                                    <p class="text-muted">
                                        <span class="tag tag-danger">10 Usuários</span>

                                    </p>

                                    <hr>

                                    <strong><i class="far fa-file-alt mr-1"></i> Observações</strong>

                                    <p class="text-muted">Vencimento da Lincença: 10/08/2022.</p>
                                    <a href="#" onclick="AlterarEmpresaModal('<?= $dados[0]['EmpID'] ?>', '<?= $dados[0]['EmpNome'] ?>','<?= $dados[0]['EmpCNPJ'] ?>','<?= $dados[0]['EmpEnd'] ?>','<?= $dados[0]['EmpCep'] ?>','<?= $dados[0]['EmpNumero'] ?>','<?= $dados[0]['EmpCidade'] ?>','<?= $dados[0]['EmpLogo'] ?>')" data-toggle="modal" data-target="#alterarEmpresa" class="btn btn-primary btn-block">Alterar Dados</a>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </section>
        </div>
        <!-- /.content-wrapper -->
        <form id="formAlt" action="meus_dados.php" method="post">
            <?php include_once 'modal/_alterarEmpresa.php' ?>
            <?php include_once 'modal/_excluir.php' ?>

        </form>
        <form id="formAltUser" action="meus_dados.php" method="post">
            <?php include_once 'modal/_alterarUsuario.php' ?>
            
        </form>
        <?php include_once PATH_URL . '/Template/_includes/_footer.php' ?>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <?php include_once PATH_URL . '/Template/_includes/_scripts.php' ?>
    <?php include_once PATH_URL . '/Template/_includes/_msg.php' ?>
    <script src="../../Resource/ajax/empresa-ajx.js"></script>
    <script src="../../Resource/ajax/usuario-ajx.js"></script>
  
    <script>
         $(function () {
         $('[data-mask]').inputmask()
         })
    </script>
</body>

</html>