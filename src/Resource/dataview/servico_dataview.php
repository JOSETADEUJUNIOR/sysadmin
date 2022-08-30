<?php
include_once '_include_autoload.php';

use Src\Controller\ServicoController;
use Src\VO\ServicoVO;
use Src\_public\Util;

Util::VerLogado();

$ctrl = new ServicoController();

if (isset($_POST['btn_cadastrar'])) {
    $vo = new ServicoVO;
    $vo->setNome($_POST['ServNome']);
    $vo->setValor($_POST['ServValor']);
    $vo->setDescricao($_POST['ServDescricao']);
    $ret = $ctrl->CadastrarServico($vo);

    if ($_POST['btn_cadastrar'] == 'ajx') {
        echo $ret;
    }
} else if (isset($_POST['btnAlterar'])) {
    $vo = new ServicoVO;
    $vo->setID($_POST['ServID']);
    $vo->setNome($_POST['ServNome']);
    $vo->setValor($_POST['ServValor']);
    $vo->setDescricao($_POST['ServDescricao']);
    $ret = $ctrl->AlterarServicoController($vo);

    if (isset($_POST['btnAlterar']) && $_POST['btnAlterar'] == 'ajx') {
        echo $ret;
    } else {
        $servico = $ctrl->RetornarServicoController();
    }
} else if (isset($_POST['btnExcluir'])) {
    $vo = new ServicoVO;
    $vo->setID($_POST['ExcluirID']);
    $ret = $ctrl->ExcluirServicoController($vo);
    if ($_POST['btnExcluir'] == 'ajx') {
        echo $ret;
    } else {
        $servico = $ctrl->RetornarServicoController();
    }
} else if (isset($_POST['btnFiltrar']) && isset($_POST['FiltrarNome'])) {
    $nome_filtro = $_POST['FiltrarNome'];
    $servico = $ctrl->FiltrarServicoController($nome_filtro);

    if (count($servico) > 0) { ?>
        <table class="table table-hover" id="tabela_result_servico">
            <thead>
                <tr>
                    <th>Ação</th>
                    <th>Serviço</th>
                    <th>Valor</th>
                    <th>Descrição</th>
                </tr>
            </thead>
            <tbody>
                <?php for ($i = 0; $i < count($servico); $i++) { ?>
                    <tr>
                        <td>
                            <a href="#" onclick="AlterarServicoModal('<?= $servico[$i]['ServID'] ?>', '<?= $servico[$i]['ServNome'] ?>','<?= $servico[$i]['ServValor'] ?>','<?= $servico[$i]['ServDescricao'] ?>')" data-toggle="modal" data-target="#alterarServico" class="btn btn-warning btn-xs">Alterar</a>
                            <a href="#" onclick="ExcluirModal('<?= $servico[$i]['ServID'] ?>', '<?= $servico[$i]['ServNome'] ?>')" data-toggle="modal" data-target="#modalExcluir" class="btn btn-danger btn-xs">Excluir</a>
                        </td>
                        <td><?= $servico[$i]['ServNome'] ?></td>
                        <td><?= $servico[$i]['ServValor'] ?></td>
                        <td><?= $servico[$i]['ServDescricao'] ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

    <?php } else {
        echo '<h4><center>Nenhum registro encontrado!</center><h4>';
    }
} else if (isset($_POST['btn_consultar']) && $_POST['btn_consultar'] == "ajx") {

    $servico = $ctrl->RetornarServicoController(); ?>

    <table class="table table-hover" id="tabela_result_cliente">
        <thead>
            <tr>
                <th>Ação</th>
                <th>Serviço</th>
                <th>Valor</th>
                <th>Descrição</th>
            </tr>
        </thead>
        <tbody>
            <?php for ($i = 0; $i < count($servico); $i++) { ?>
                <tr>
                    <td>
                        <a href="#" onclick="AlterarServicoModal('<?= $servico[$i]['ServID'] ?>', '<?= $servico[$i]['ServNome'] ?>','<?= $servico[$i]['ServValor'] ?>','<?= $servico[$i]['ServDescricao'] ?>')" data-toggle="modal" data-target="#alterarServico" class="btn btn-warning btn-xs">Alterar</a>
                        <a href="#" onclick="ExcluirModal('<?= $servico[$i]['ServID'] ?>', '<?= $servico[$i]['ServNome'] ?>')" data-toggle="modal" data-target="#modalExcluir" class="btn btn-danger btn-xs">Excluir</a>
                    </td>
                    <td><?= $servico[$i]['ServNome'] ?></td>
                    <td><?= $servico[$i]['ServValor'] ?></td>
                    <td><?= $servico[$i]['ServDescricao'] ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>


<?php } else {
    $servico = $ctrl->RetornarServicoController();
} ?>