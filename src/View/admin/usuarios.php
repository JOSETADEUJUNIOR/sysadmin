<?php require_once dirname(__DIR__, 2) . '/Resource/dataview/cliente_dataview.php'; ?>
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
                            <h1>cliente</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Administrador</a></li>
                                <li class="breadcrumb-item active">Gerenciar clientes</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">

                <!-- Default box -->
                <div class="card card-secondary collapsed-card">
                    <div class="card-header">
                        <h3 class="card-title">Dados Cliente</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fa">Novo Cliente</i></button>

                        </div>
                    </div>
                    <form action="cliente.php" method="post" id="form_cliente">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label>Nome</label>
                                        <input class="form-control obg" id="nomeCliente" name="nomeCliente" placeholder="Digite o aqui....">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Ativo?</label>
                                        <select class="form-control obg" id="ativo" name="ativo">
                                            <option selected value="A">Sim</option>
                                            <option value="I">Não</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Data nascimento</label>
                                        <input type="date" class="form-control obg" id="dtnascimento" name="dtnascimento" placeholder="Digite o aqui....">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Telefone</label>
                                        <input type="phone" class="form-control obg" id="telefone" name="telefone" placeholder="Digite o aqui...." data-inputmask='"mask": "(99) 9 9999-9999"' data-mask>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>E-mail</label>
                                        <input type="e-mail" class="form-control obg" id="email" name="email" placeholder="Digite o aqui...." >
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Cep</label>
                                        <input class="form-control obg" id="cep" name="cep" placeholder="Digite o aqui...." data-inputmask='"mask": "99.999-999"' data-mask >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Endereço</label>
                                        <input class="form-control obg" id="endereco" name="endereco" placeholder="Digite o aqui....">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Numero</label>
                                        <input class="form-control obg" id="numero" name="numero" placeholder="Digite o aqui....">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Bairro</label>
                                        <input class="form-control obg" id="bairro" name="bairro" placeholder="Digite o aqui....">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Cidade</label>
                                        <input class="form-control obg" id="cidade" name="cidade" placeholder="Digite o aqui....">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Estado</label>
                                        <input class="form-control obg" id="estado" name="estado" placeholder="Digite o aqui....">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Descrição</label>
                                        <textarea class="form-control obg" id="descricao" name="descricao" placeholder="Digite o aqui...."></textarea>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-success" onclick="return CadastrarCliente('form_cliente')" name="btn_cadastrar">Cadastrar</button>

                    </form>

                </div>
                <div class="card-body">
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
                                            <input type="text" name="table_search" class="form-control float-right" onkeyup="FiltrarCliente(this.value)" placeholder="Search">

                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-hover" id="tabela_result_cliente">
                                        <thead>
                                            <tr>
                                                <th>Ação</th>
                                                <th>Nome do cliente</th>
                                                <th>Telefone</th>
                                                <th>Endereço</th>
                                                <th>E-mail</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php for ($i = 0; $i < count($cliente); $i++) { ?>
                                                <tr>
                                                    <td>
                                                        <a href="#" onclick="AlterarClienteModal('<?= $cliente[$i]['CliID'] ?>', '<?= $cliente[$i]['CliNome'] ?>','<?= $cliente[$i]['CliDtNasc'] ?>','<?= $cliente[$i]['CliTelefone'] ?>','<?= $cliente[$i]['CliEmail'] ?>','<?= $cliente[$i]['CliCep'] ?>','<?= $cliente[$i]['CliEndereco'] ?>','<?= $cliente[$i]['CliNumero'] ?>','<?= $cliente[$i]['CliBairro'] ?>','<?= $cliente[$i]['CliCidade'] ?>','<?= $cliente[$i]['CliEstado'] ?>','<?= $cliente[$i]['CliDescricao'] ?>','<?= $cliente[$i]['CliStatus'] ?>')" data-toggle="modal" data-target="#alterarCliente" class="btn btn-warning btn-xs">Alterar</a>
                                                        <a href="#" onclick="ExcluirModal('<?= $cliente[$i]['CliID'] ?>', '<?= $cliente[$i]['CliNome'] ?>')" data-toggle="modal" data-target="#modalExcluir" class="btn btn-danger btn-xs">Excluir</a>
                                                    </td>
                                                    <td><?= $cliente[$i]['CliNome'] ?></td>
                                                    <td><?= $cliente[$i]['CliTelefone'] ?></td>
                                                    <td><?= $cliente[$i]['CliEndereco'].', '.$cliente[$i]['CliNumero'].' - '.$cliente[$i]['CliCidade'].'/'.$cliente[$i]['CliEstado']?></td>
                                                    <td><?= $cliente[$i]['CliEmail'] ?></td>
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
    <form action="cliente.php" method="post">
        <?php include_once 'modal/_alterar_cliente.php' ?>
        <?php include_once 'modal/_excluir.php' ?>

    </form>
    <?php include_once PATH_URL . '/Template/_includes/_footer.php' ?>
    <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <?php include_once PATH_URL . '/Template/_includes/_scripts.php' ?>
    <?php include_once PATH_URL . '/Template/_includes/_msg.php' ?>
    <script src="../../Resource/ajax/cliente-ajx.js"></script>
    <script>
         $(function () {
         $('[data-mask]').inputmask()
         })
    </script>
</body>

</html>