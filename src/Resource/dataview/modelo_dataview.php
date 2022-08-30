<?php
include_once '_include_autoload.php';

use Src\Controller\ModeloController;
use Src\VO\ModeloEquipVO;
use Src\_public\Util;
Util::VerLogado();

$ctrlModelo = new ModeloController();

if (isset($_POST['btn_cadastrar'])) {
    $vo = new ModeloEquipVO;
    $vo->setNome($_POST['nome']);
    $ret = $ctrlModelo->CadastrarModelo($vo);
    if ($_POST['btn_cadastrar'] == 'ajx') {
        echo $ret;
    }
} else if (isset($_POST['btnAlterar'])) {
    $vo = new ModeloEquipVO;
    $vo->setID($_POST['AlteraID']);
    $vo->setNome($_POST['AlteraNome']);
    $ret = $ctrlModelo->AlterarModeloController($vo);

    if($_POST['btnAlterar']== 'ajx'){
        echo $ret;
    }else{
        $modelo = $ctrlModelo->RetornaModeloController(); 
    }
} else if (isset($_POST['btnExcluir'])) {
    $vo = new ModeloEquipVO;
    $vo->setID($_POST['ExcluirID']);
    $ret = $ctrlModelo->ExcluirModeloController($vo);

    if($_POST['btnExcluir'] == 'ajx'){
        echo $ret;
    }else{
        $modelo = $ctrlModelo->RetornaModeloController();
    }


} else if (isset($_POST['btn_consultar']) && $_POST['btn_consultar'] == 'OK') {
    $modelo = $ctrlModelo->RetornaModeloController(); ?>

    <table class="table table-hover">
        <thead>
            <tr>
                <th>Ação</th>
                <th>Nome do modelo</th>

            </tr>
        </thead>
        <tbody>
            <?php for ($i = 0; $i < count($modelo); $i++) { ?>
                <tr>
                    <td>
                        <a href="#" onclick="AlterarModeloModal('<?= $modelo[$i]['id'] ?>', '<?= $modelo[$i]['nome'] ?>')" data-toggle="modal" data-target="#alterarModelo" class="btn btn-warning btn-xs">Alterar</a>
                        <a href="#" onclick="ExcluirModal('<?= $modelo[$i]['id'] ?>', '<?= $modelo[$i]['nome'] ?>')" data-toggle="modal" data-target="#modalExcluir" class="btn btn-danger btn-xs">Excluir</a>
                    </td>
                    <td><?= $modelo[$i]['nome'] ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

<?php } else {

    $modelo = $ctrlModelo->RetornaModeloController();
} ?>