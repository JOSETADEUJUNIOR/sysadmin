<?php
include_once '_include_autoload.php';

use Src\Controller\SetorController;
use Src\VO\SetorVO;

$ctrl = new SetorController();

if (isset($_POST['btn_cadastrar'])) {
    $vo = new SetorVO;
    $vo->setNomeSetor($_POST['nome']);
    $ret = $ctrl->CadastrarSetor($vo);

    if ($_POST['btn_cadastrar'] == 'ajx') {
        echo $ret;
    }
} else if (isset($_POST['btnAlterar'])) {
    $vo = new SetorVO;
    $vo->setID($_POST['AlteraID']);
    $vo->setNomeSetor($_POST['AlteraNome']);
    $ret = $ctrl->AlterarSetorController($vo);

    if(isset($_POST['btnAlterar']) && $_POST['btnAlterar'] == 'ajx'){
        echo $ret;
    }else{
        $setor = $ctrl->RetornarSetorController();
    }
    


} else if (isset($_POST['btnExcluir'])) {
    $vo = new SetorVO;
    $vo->setID($_POST['ExcluirID']);
    $ret = $ctrl->ExcluirSetorController($vo);
    if($_POST['btnExcluir'] == 'ajx'){
        echo $ret;
    }else{
        $setor = $ctrl->RetornarSetorController();   
    }
} else if (isset($_POST['btn_consultar']) && $_POST['btn_consultar'] == "ajx") {

    $setor = $ctrl->RetornarSetorController(); ?>

    <table class="table table-hover">
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
                        <a href="#" onclick="AlterarSetorModal('<?= $setor[$i]['id'] ?>', '<?= $setor[$i]['nome_setor'] ?>')" data-toggle="modal" data-target="#alterarSetor" class="btn btn-warning btn-xs">Alterar</a>
                        <a href="#" onclick="ExcluirModal('<?= $setor[$i]['id'] ?>', '<?= $setor[$i]['nome_setor'] ?>')" data-toggle="modal" data-target="#modalExcluir" class="btn btn-danger btn-xs">Excluir</a>
                    </td>
                    <td><?= $setor[$i]['nome_setor'] ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>


<?php } else {
    $setor = $ctrl->RetornarSetorController();
} ?>