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
                <div id="CadCliente" class="card card-secondary collapsed-card">
                    <div class="card-header">
                        <h3 class="card-title">Dados Cliente</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-outline-info" style="color:white" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fa fa-plus-circle"> Add Cliente</i></button>
                        </div>
                    </div>
                    <form action="cliente.php" method="post" id="form_cliente">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Nome</label>
                                        <input class="form-control obg" id="nomeCliente" name="nomeCliente" placeholder="Digite o aqui....">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>CPF/CNPJ</label>
                                        <input class="form-control obg" id="cpfCnpj" name="cpfCnpj" placeholder="Digite o aqui....">
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
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Tipo</label>
                                        <select class="form-control obg" id="tipo" name="tipo">
                                            <option selected value="C">Cliente</option>
                                            <option value="F">Fornecedor</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Data nascimento</label>
                                        <input type="date" class="form-control" id="dtnascimento" name="dtnascimento" placeholder="Digite o aqui....">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Telefone</label>
                                        <input type="phone" class="form-control obg" id="telefone" name="telefone" placeholder="Digite o aqui....">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>E-mail</label>
                                        <input type="e-mail" class="form-control" id="email" name="email" placeholder="Digite o aqui....">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Cep</label>
                                        <input class="form-control" id="cep" name="cep" placeholder="Digite o aqui....">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Endereço</label>
                                        <input class="form-control" id="endereco" name="endereco" placeholder="Digite o aqui....">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Numero</label>
                                        <input class="form-control" id="numero" name="numero" placeholder="Digite o aqui....">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Bairro</label>
                                        <input class="form-control" id="bairro" name="bairro" placeholder="Digite o aqui....">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Cidade</label>
                                        <input class="form-control" id="cidade" name="cidade" placeholder="Digite o aqui....">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Estado</label>
                                        <input class="form-control" id="estado" name="estado" placeholder="Digite o aqui....">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Descrição</label>
                                        <textarea class="form-control" id="descricao" name="descricao" placeholder="Digite o aqui...."></textarea>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <button class="btn btn-success col-md-12" onclick="return CadastrarCliente('form_cliente')" name="btn_cadastrar">Cadastrar</button>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">

                                        <a href="cliente.php" class="btn btn-warning col-md-12">Voltar</a>
                                    </div>
                                </div>
                            </div>
                    </form>

                </div>
                <div id="CadClienteBody" class="card-body">

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
                                <div class="input-group input-group-sm" style="width: 250px;">
                                    <input type="text" name="table_search" class="form-control float-right" onkeyup="FiltrarCliente(this.value)" placeholder="buscar por nome ou telefone...">


                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <!--<div class="card-body ">-->
                        <!--<table class="table table-bordered table-hover" id="tabela_result_cliente">-->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover tabela" id="tabela_result_cliente">
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
                                                <a href="#" onclick="AlterarClienteModal('<?= $cliente[$i]['CliID'] ?>', '<?= $cliente[$i]['CliNome'] ?>','<?= $cliente[$i]['CliDtNasc'] ?>','<?= $cliente[$i]['CliTelefone'] ?>','<?= $cliente[$i]['CliEmail'] ?>','<?= $cliente[$i]['CliCep'] ?>','<?= $cliente[$i]['CliEndereco'] ?>','<?= $cliente[$i]['CliNumero'] ?>','<?= $cliente[$i]['CliBairro'] ?>','<?= $cliente[$i]['CliCidade'] ?>','<?= $cliente[$i]['CliEstado'] ?>','<?= $cliente[$i]['CliDescricao'] ?>','<?= $cliente[$i]['CliStatus'] ?>','<?= $cliente[$i]['CliCpfCnpj'] ?>','<?= $cliente[$i]['CliTipo'] ?>')" data-toggle="modal" data-target="#alterarCliente"><i class="fas fa-edit"></i></a>
                                                <a href="#" onclick="ExcluirModal('<?= $cliente[$i]['CliID'] ?>', '<?= $cliente[$i]['CliNome'] ?>')" data-toggle="modal" data-target="#modalExcluir"><i style="color:red" class="fas fa-trash-alt"></i></a>
                                            </td>
                                            <td><?= $cliente[$i]['CliNome'] ?></td>
                                            <td><?= $cliente[$i]['CliTelefone'] ?></td>
                                            <td><?= $cliente[$i]['CliEndereco'] . ', ' . $cliente[$i]['CliNumero'] . ' - ' . $cliente[$i]['CliCidade'] . '/' . $cliente[$i]['CliEstado'] ?></td>
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
        $(function() {
            $('[data-mask]').inputmask()
        })
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
    <script type="text/javascript">
        var options = {
            onKeyPress: function(cpf, ev, el, op) {
                var masks = ['000.000.000-000', '00.000.000/0000-00'];
                $('#cpfCnpj').mask((cpf.length > 14) ? masks[1] : masks[0], op);
            }
        }

        $('#cpfCnpj').length > 11 ? $('$cpfCnpj').mask('00.000.000/0000-00', options) : $('#cpfCnpj').mask('000.000.000-00#', options);
        var options = {
            onKeyPress: function(cpf, ev, el, op) {
                var masks = ['000.000.000-000', '00.000.000/0000-00'];
                $('#AlteracpfCnpj').mask((cpf.length > 14) ? masks[1] : masks[0], op);
            }
        }

        $('#AlteracpfCnpj').length > 11 ? $('$AlteracpfCnpj').mask('00.000.000/0000-00', options) : $('#AlteracpfCnpj').mask('000.000.000-00#', options);

        $(document).ready(function() {
            $("#telefone").mask('(00)00000-0000')
            $("#Alteratelefone").mask('(00)00000-0000')
            $("#AlteraCep").mask('00.000-000')
            $("#cep").mask('00.000-000')

        });
    </script>


</body>

</html>