<?php
include_once '_include_autoload.php';

use Src\Controller\ClienteController;
use Src\Controller\UsuarioController;
use Src\VO\ClienteVO;
use Src\_public\Util;

Util::VerLogado();

$ctrlEmpresa = new UsuarioController();
$empresa = $ctrlEmpresa->RetornarDadosCadastraisController();

$ctrlCliente = new ClienteController();
if (isset($_POST['btn_cadastrar'])) {
    $vo = new ClienteVO;
    $vo->setNome($_POST['nomeCliente']);
    $vo->setDtNasc($_POST['dtnascimento']);
    $vo->setTelefone($_POST['telefone']);
    $vo->setEmail($_POST['email']);
    $vo->setCep($_POST['cep']);
    $vo->setEndereco($_POST['endereco']);
    $vo->setNumero($_POST['numero']);
    $vo->setBairro($_POST['bairro']);
    $vo->setCidade($_POST['cidade']);
    $vo->setEstado($_POST['estado']);
    $vo->setDescricao($_POST['descricao']);
    $vo->setStatus($_POST['ativo']);
    $ret = $ctrlCliente->CadastrarClienteController($vo);
    if ($_POST['btn_cadastrar'] == 'ajx') {
        echo $ret;
    }
} else if (isset($_POST['btnAlterar'])) {
    $vo = new ClienteVO;
    $vo->setID($_POST['AlteraID']);
    $vo->setNome($_POST['nomeCliente']);
    $vo->setDtNasc($_POST['dtnascimento']);
    $vo->setTelefone($_POST['telefone']);
    $vo->setEmail($_POST['email']);
    $vo->setCep($_POST['cep']);
    $vo->setEndereco($_POST['endereco']);
    $vo->setNumero($_POST['numero']);
    $vo->setBairro($_POST['bairro']);
    $vo->setCidade($_POST['cidade']);
    $vo->setEstado($_POST['estado']);
    $vo->setDescricao($_POST['descricao']);
    $vo->setStatus($_POST['ativo']);
    $ret = $ctrlCliente->AlterarClienteController($vo);

    if ($_POST['btnAlterar'] == 'ajx') {
        echo $ret;
    } else {
        $cliente = $ctrlCliente->RetornarClienteController();
    }
} else if (isset($_POST['btnExcluir'])) {
    $vo = new ClienteVO;
    $vo->setID($_POST['ExcluirID']);
    $ret = $ctrlCliente->ExcluirClienteController($vo);

    if ($_POST['btnExcluir'] == 'ajx') {
        echo $ret;
    } else {
        $cliente = $ctrlCliente->RetornarClienteController();
    }
} else if (isset($_POST['btnFiltrar']) && isset($_POST['FiltrarNome'])) {
    $nome_filtro = $_POST['FiltrarNome'];
    $cliente = $ctrlCliente->FiltrarClienteController($nome_filtro);

    if (count($cliente) > 0) { ?>
        <table class="table table-hover">
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
                            <a href="#" onclick="AlterarClienteModal('<?= $cliente[$i]['CliID'] ?>', '<?= $cliente[$i]['CliNome'] ?>','<?= $cliente[$i]['CliDtNasc'] ?>','<?= $cliente[$i]['CliTelefone'] ?>','<?= $cliente[$i]['CliEmail'] ?>','<?= $cliente[$i]['CliCep'] ?>','<?= $cliente[$i]['CliEndereco'] ?>','<?= $cliente[$i]['CliNumero'] ?>','<?= $cliente[$i]['CliBairro'] ?>','<?= $cliente[$i]['CliCidade'] ?>','<?= $cliente[$i]['CliEstado'] ?>','<?= $cliente[$i]['CliDescricao'] ?>','<?= $cliente[$i]['CliStatus'] ?>')" data-toggle="modal" data-target="#alterarCliente"><i class="fas fa-edit"></i></a>
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

    <?php } else {
        echo '<h4><center>Nenhum registro encontrado!</center><h4>';
    }
} else if (isset($_POST['btn_consultar']) && $_POST['btn_consultar'] == 'OK') {
    $cliente = $ctrlCliente->RetornarClienteController(); ?>

    <table class="table table-hover">
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
                        <a href="#" onclick="AlterarClienteModal('<?= $cliente[$i]['CliID'] ?>', '<?= $cliente[$i]['CliNome'] ?>','<?= $cliente[$i]['CliDtNasc'] ?>','<?= $cliente[$i]['CliTelefone'] ?>','<?= $cliente[$i]['CliEmail'] ?>','<?= $cliente[$i]['CliCep'] ?>','<?= $cliente[$i]['CliEndereco'] ?>','<?= $cliente[$i]['CliNumero'] ?>','<?= $cliente[$i]['CliBairro'] ?>','<?= $cliente[$i]['CliCidade'] ?>','<?= $cliente[$i]['CliEstado'] ?>','<?= $cliente[$i]['CliDescricao'] ?>','<?= $cliente[$i]['CliStatus'] ?>')" data-toggle="modal" data-target="#alterarCliente"><i class="fas fa-edit"></i></a>
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

<?php } else {

    $cliente = $ctrlCliente->RetornarClienteController();
} ?>