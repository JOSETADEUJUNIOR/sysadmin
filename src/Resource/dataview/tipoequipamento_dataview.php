<?php

include_once '_include_autoload.php';

use Src\VO\TipoEquipamentoVO;
use Src\Controller\TipoEquipamentoController;
use Src\_public\Util;
Util::VerLogado();
$ctrl = new TipoEquipamentoController();

if (isset($_POST['btn_cadastrar'])){
    $vo = new TipoEquipamentoVO;
    $vo->setNome($_POST['nome']);
    $ret = $ctrl->CadastrarTipoEquipamento($vo);
    if ($_POST['btn_cadastrar']== 'ajx') {echo $ret;}

}else if (isset($_POST['btnAlterar'])){

    $vo = new TipoEquipamentoVO;
    $vo->setID($_POST['AlteraID']);
    $vo->setNome($_POST['AlteraNome']);
    $ret = $ctrl->AlterarTipoEquipamentoController($vo);
    if ($_POST['btnAlterar']== 'ajx') {
        echo $ret;
    }else{
        $tipos = $ctrl->RetornarTiposEquipamentosController();  
    }   
    

}else if (isset($_POST['btnExcluir'])){
    $vo = new TipoEquipamentoVO;
    $vo->setID($_POST['ExcluirID']);
    $ret = $ctrl->ExcluirTipoEquipamentoController($vo);
    if($_POST['btnExcluir'] == 'ajx'){
        echo $ret;
    }else {
        $tipos = $ctrl->RetornarTiposEquipamentosController();
    }

}else if (isset($_POST['btnFiltrar']) && isset($_POST['FiltrarNome'])){
    $nome_filtro = $_POST['FiltrarNome'];

    $tipos = $ctrl->FiltrarTiposEquipamentosController($nome_filtro); 
    
    if (count($tipos) > 0) { ?>
    <table class="table table-hover" >
    <thead>
        <tr>
            <th>Ação</th>
            <th>Nome do tipo</th>

        </tr>
    </thead>
    <tbody>
        <?php for($i = 0; $i < count($tipos); $i++) { ?>
        <tr>
            <td>
                <a href="#" onclick="AlterarTipoEquipamentoModal('<?=$tipos[$i]['id']?>','<?=$tipos[$i]['nome']?>')" data-toggle="modal" data-target="#alterarTipoEquipamento" class="btn btn-warning btn-xs">Alterar</a>
                <a href="#" onclick="ExcluirModal('<?=$tipos[$i]['id']?>','<?=$tipos[$i]['nome']?>')" data-toggle="modal" data-target="#modalExcluir" class="btn btn-danger btn-xs">Excluir</a>
            </td>
            <td><?= $tipos[$i]['nome']?></td>
        </tr>

        <?php } ?>
    </tbody>
</table>

<?php 
} else{


echo '<h4><center>Nenhum registro encontrado!</center><h4>';

} 
}
else if (isset($_POST['btnConsultar']) && $_POST['btnConsultar']){
    $tipos = $ctrl->RetornarTiposEquipamentosController(); ?>

    <table class="table table-hover" >
    <thead>
        <tr>
            <th>Ação</th>
            <th>Nome do tipo</th>

        </tr>
    </thead>
    <tbody>
        <?php for($i = 0; $i < count($tipos); $i++) { ?>
        <tr>
            <td>
                <a href="#" onclick="AlterarTipoEquipamentoModal('<?=$tipos[$i]['id']?>','<?=$tipos[$i]['nome']?>')" data-toggle="modal" data-target="#alterarTipoEquipamento" class="btn btn-warning btn-xs">Alterar</a>
                <a href="#" onclick="ExcluirModal('<?=$tipos[$i]['id']?>','<?=$tipos[$i]['nome']?>')" data-toggle="modal" data-target="#modalExcluir" class="btn btn-danger btn-xs">Excluir</a>
            </td>
            <td><?= $tipos[$i]['nome']?></td>
        </tr>

        <?php } ?>
    </tbody>
</table>




<?php } else{
    $tipos = $ctrl->RetornarTiposEquipamentosController(); } ?>


