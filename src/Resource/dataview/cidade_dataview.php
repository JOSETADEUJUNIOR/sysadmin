<?php

include_once '_include_autoload.php';

use Src\Controller\CidadeController;
use Src\VO\CidadeVO;

$ctrl = new CidadeController;

if (isset($_POST['btn_cadastrar'])){
    $vo = new CidadeVO;
    $vo->setNomeCidade($_POST['nome_cidade']);
    $vo->setEstadoID($_POST['estado_id']);
    $ret = $ctrl->CadastrarCidadeController($vo);

    if ($_POST['btn_cadastrar'] == 'ajx') {
        echo $ret;
    }else{
        $cidade = $ctrl->RetornarCidadeController();
    }

}else if(isset($_POST['btn_alterar'])){
    $vo = new CidadeVO;
    $vo->setID($_POST['AlteraID']);
    $vo->setNomeCidade($_POST['AlteraNome']);
    $ret = $ctrl->AlterarCidadeController($vo);

    if (isset($_POST['btn_alterar']) && $_POST['btn_alterar'] == 'ajx' ) 
    {
        echo $ret;
       
    }else {
        $cidade = $ctrl->RetornarCidadeController();
    }

}else if (isset($_POST['btn_excluir'])) {
    $vo = new CidadeVO;
    $vo->setID($_POST['ExcluirID']);
    $ret = $ctrl->ExcluirCidadeController($vo);
    if($_POST['btn_excluir'] == 'ajx'){
        echo $ret;
    }else{
        $cidade = $ctrl->RetornarCidadeController();   
    }
} else if (isset($_POST['btn_consultar']) && $_POST['btn_consultar'] == 'ajx')
{
    $cidade = $ctrl->RetornarCidadeController(); ?>

<table class="table table-hover">
<thead>
    <tr>
        <th>Ação</th>
        <th>Nome da cidade</th>
        <th>Estado</th>


    </tr>
</thead>
<tbody>
    <?php for($i = 0; $i < count($cidade); $i++){ ?>
    <tr>
        <td>
            <a href="#" onclick="AlterarCidadeModal('<?= $cidade[$i]['id']?>','<?= $cidade[$i]['nome_cidade']?>')" data-toggle="modal" data-target="#alteraCidade" class="btn btn-warning btn-xs">Alterar</a>
            <a href="#" onclick="Excluir('<?= $cidade[$i]['id']?>','<?= $cidade[$i]['nome_cidade']?>')" class="btn btn-danger btn-xs">Excluir</a>
        </td>
        <td><?= $cidade[$i]['nome_cidade'] ?></td>
        <td><?= $cidade[$i]['sigla_estado'] ?></td>
    </tr>
    <?php } ?>
</tbody>
</table>

<?php } else {
    $cidade = $ctrl->RetornarCidadeController();
} ?>

