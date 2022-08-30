<?php
include_once '_include_autoload.php';

use Src\Controller\OsController;
use Src\Controller\ClienteController;
use Src\Controller\ProdutoController;
use Src\Controller\ServicoController;
use Src\Controller\UsuarioController;
use Src\VO\OsVO;
use Src\_public\Util;
use Src\VO\ServicoOSVO;
use Src\VO\ProdutoOSVO;

Util::VerLogado();

$ctrlEmp = new UsuarioController();
$dadosEmp = $ctrlEmp->RetornarDadosCadastraisController();
$cliCtrl = new ClienteController();
$ctrlProd = new ProdutoController();
$ctrlServ = new ServicoController();
$servicos = $ctrlServ->RetornarServicoController();
$produtos = $ctrlProd->RetornarProdutoController();
$clientes = $cliCtrl->RetornarClienteController();

$ctrl = new OsController();

if (isset($_GET['OsID'])) {
    $vo = new OsVO;
    $vo->setID($_GET['OsID']);
    $ordemOS = $ctrl->RetornaOrdem($vo);
    $ProdOrdem = $ctrl->RetornaProdOrdem($vo);
    $ProdServOrdem = $ctrl->RetornaServOrdem($vo);

}

if (isset($_POST['btn_cadastrar'])) {
    $vo = new OsVO;
    $vo->setDtInicial($_POST['dtInicial']);
    $vo->setOsDtFinal($_POST['dtFinal']);
    $vo->setOsDescProdServ($_POST['descProd']);
    $vo->setOsGarantia($_POST['garantia']);
    $vo->setOsDefeito($_POST['defeito']);
    $vo->setOsObs($_POST['obs']);
    $vo->setOsCliID($_POST['Oscliente']);
    $vo->setOsTecID($_POST['tecnico']);
    $vo->setOsStatus($_POST['status']);
    $vo->setOsLaudoTec($_POST['laudo']);
    $ret = $ctrl->CadastrarOsController($vo);

    if ($_POST['btn_cadastrar'] == 'ajx') {
        echo $ret;
    } else {
        $os = $ctrl->RetornarOsController();
    }
} else if (isset($_POST['btn_addServ'])) {
    $vo = new ServicoOSVO;
    $vo->setOsID($_POST['OsID']);
    $vo->setServQtd($_POST['qtdServ']);
    $vo->setOsServID($_POST['servico']);

    $ret = $ctrl->InserirServOrdemController($vo);
    $servicos = $ctrlServ->RetornarServicoController();
    $produtos = $ctrlProd->RetornarProdutoController();

    if ($_POST['btn_addServ'] == 'ajx') {
        echo $ret;
    } else {
        $os = $ctrl->RetornarOsController();
    }
} else if (isset($_POST['btn_addItem'])) {
    $vo = new ProdutoOSVO;
    $vo->setOsID($_POST['OsID']);
    $vo->setProdQtd($_POST['qtdProd']);
    $vo->setOsProdID($_POST['produto']);

    $ret = $ctrl->InserirItemOrdemController($vo);
    $servicos = $ctrlServ->RetornarServicoController();
    $produtos = $ctrlProd->RetornarProdutoController();

    if ($_POST['btn_addItem'] == 'ajx') {
        echo $ret;
    } else {
        $os = $ctrl->RetornarOsController();
    }
} else if (isset($_POST['btnExcluir'])) {
    $vo = new OSVO;
    $vo->setID($_POST['ExcluirID']);
    $ret = $ctrl->ExcluirOSController($vo);
    
    if ($_POST['btnExcluir'] == 'ajx') {
        echo $ret;
    } else {
        $os = $ctrl->RetornarOsController();
    }
} else if (isset($_POST['btnExcluirItemOs'])) {
    $vo = new ProdutoOSVO;
    $vo->setOsID($_POST['OsID']);
    $vo->setProdQtd($_POST['qtd']);
    $vo->setProdOsID($_POST['ExcluirID']);
    $vo->setOsProdID($_POST['produto']);
    $ret = $ctrl->ExcluirItemOSController($vo);

    if ($_POST['btnExcluirItemOs'] == 'ajx') {
        echo $ret;
    } else {
        $os = $ctrl->RetornarOsController();
    }
} else if (isset($_POST['btnExcluirServ'])) {
    $vo = new ServicoOSVO;
    $vo->setOsID($_POST['OsID']);
    $vo->setServQtd($_POST['qtd']);
    $vo->setID($_POST['ExcluirID']);
    $vo->setOsServID($_POST['servico']);
    $ret = $ctrl->ExcluirServOSController($vo);

    if ($_POST['btnExcluirServ'] == 'ajx') {
        echo $ret;
    } else {
        $os = $ctrl->RetornarOsController();
    }
} else if (isset($_POST['btnAlterar'])) {
    $vo = new OsVO;
    $vo->setID($_POST['OsID']);
    $vo->setDtInicial($_POST['dtInicial']);
    $vo->setOsDtFinal($_POST['dtFinal']);
    $vo->setOsDescProdServ($_POST['descProd']);
    $vo->setOsGarantia($_POST['garantia']);
    $vo->setOsDefeito($_POST['defeito']);
    $vo->setOsObs($_POST['obs']);
    $vo->setOsCliID($_POST['Oscliente']);
    $vo->setOsTecID($_POST['tecnico']);
    $vo->setOsStatus($_POST['status']);
    $vo->setOsLaudoTec($_POST['laudo']);
    $ret = $ctrl->AlterarOsController($vo);

    if ($_POST['btnAlterar'] == 'ajx') {
        echo $ret;
    } else {
        $os = $ctrl->RetornarOsController();
    }
} else if (isset($_POST['btn_consultar']) && $_POST['btn_consultar'] == 'ajx') {
    $os = $ctrl->RetornarOsController(); ?>

    <table class="table table-hover" id="tabela_result_os">
        <thead>
            <tr>
                <th>Ação</th>
                <th>Nome do cliente</th>
                <th>Dt Inicio</th>
                <th>Dt Entrega</th>
                <th>Tecnico</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php for ($i = 0; $i < count($os); $i++) { ?>
                <tr>
                    <td>
                        <a href="#" onclick="AlterarOsModal('<?= $os[$i]['OsID'] ?>', '<?= $os[$i]['OsDtInicial'] ?>','<?= $os[$i]['OsDtFinal'] ?>','<?= $os[$i]['OsGarantia'] ?>','<?= $os[$i]['OsDescProdServ'] ?>','<?= $os[$i]['OsDefeito'] ?>','<?= $os[$i]['OsObs'] ?>','<?= $os[$i]['OsCliID'] ?>','<?= $os[$i]['OsTecID'] ?>','<?= $os[$i]['OsStatus'] ?>','<?= $os[$i]['OsLaudoTec'] ?>','<?= $os[$i]['nomeCliente'] ?>')" data-toggle="modal" data-target="#alterarOs"><i class="fas fa-edit"></i></a>
                        <a href="#" onclick="ExcluirModal('<?= $os[$i]['OsID'] ?>','<?= $os[$i]['nomeCliente'] ?>')" data-toggle="modal" data-target="#modalExcluir"><i style="color:red" class="fas fa-trash-alt"></i></a>
                    </td>
                    <td><?= $os[$i]['nomeCliente'] ?></td>
                    <td><?= $os[$i]['OsDtInicial'] ?></td>
                    <td><?= $os[$i]['OsDtFinal'] ?></td>
                    <td><?= $os[$i]['OsTecID'] ?></td>

                    <td><?php
                        $status = '';
                        if ($os[$i]['OsStatus'] == "O") {
                            $status = "<button class=\"btn btn-secondary btn-xs\">Orçamento</button>";
                        } else if ($os[$i]['OsStatus'] == "A") {
                            $status = "<button class=\"btn btn-info btn-xs\">Aberto</button>";
                        } else if ($os[$i]['OsStatus'] == "EA") {
                            $status = "<button class=\"btn btn-warning btn-xs\">Em aberto</button>";
                        } else if ($os[$i]['OsStatus'] == "F") {
                            $status = "<button class=\"btn btn-success btn-xs\">Finalizada</button>";
                        } else if ($os[$i]['OsStatus'] == "C") {
                            $status = "<button class=\"btn btn-danger btn-xs\">Cancelada</button>";
                        } ?>
                        <?= $status ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

<?php } else if (isset($_POST['btn_consultar_item']) && $_POST['btn_consultar_item'] == 'ajx') {

    $vo = new OsVO;
    $vo->setID($_POST['OsID']);
    $ProdOrdem = $ctrl->RetornaProdOrdem($vo);
    $ordemOS = $ctrl->RetornaOrdem($vo);
    $ProdServOrdem = $ctrl->RetornaServOrdem($vo); ?>

    <table class="table table-hover" id="tabela_result_item">
        <thead>
            <tr>
                <th>Ação</th>
                <th>Produto/Serviço</th>
                <th>Tipo</th>
                <th>Quantidade</th>
                <th>Valor</th>
                <th>Valor Total</th>

            </tr>
        </thead>
        <tbody>
            <?php $subTotal = 0;
            for ($i = 0; $i < count($ProdOrdem); $i++) {
                if ($ProdOrdem[$i]['ProdOsProdID'] != '') {
                    $subTotal = $subTotal + $ProdOrdem[$i]['ProdValorVenda'] ?>
                    <tr>
                        <td>
                            <a href="#" onclick="ExcluirModalItem('<?= $ProdOrdem[$i]['OsID'] ?>','<?= $ProdOrdem[$i]['ProdOsID'] ?>','<?= $ProdOrdem[$i]['ProdDescricao'] ?>','<?= $ProdOrdem[$i]['ProdOsProdID'] ?>','<?= $ProdOrdem[$i]['ProdOsQtd'] ?>')" data-toggle="modal" data-target="#modalExcluirItem"><i style="color:red" class="fas fa-trash-alt"></i></a>
                        </td>
                        <td><?= $ProdOrdem[$i]['ProdDescricao'] ?></td>
                        <td><span class="btn btn-block btn-outline-primary btn-xs"> Produto</span></td>
                        <td><?= $ProdOrdem[$i]['ProdOsQtd'] ?></td>
                        <td><?= $ProdOrdem[$i]['ProdValorVenda'] ?></td>
                        <td><?= $ProdOrdem[$i]['ProdOsSubTotal'] ?></td>


                    </tr>
            <?php }
            } ?>

        </tbody>
        </hr>
        <tbody>
            <?php for ($i = 0; $i < count($ProdServOrdem); $i++) {
                if ($ProdServOrdem[$i]['ServOsServID'] != '') {
                    $subTotal = $subTotal + $ProdServOrdem[$i]['ServValor']  ?>
                    <tr>
                        <td>
                            <a href="#" onclick="ExcluirModalServ('<?= $ProdServOrdem[$i]['OsID'] ?>','<?= $ProdServOrdem[$i]['ServOsID'] ?>','<?= $ProdServOrdem[$i]['ServNome'] ?>','<?= $ProdServOrdem[$i]['ServOsServID'] ?>','<?= $ProdServOrdem[$i]['ServOsQtd'] ?>')" data-toggle="modal" data-target="#modalExcluirServ"><i style="color:red" class="fas fa-trash-alt"></i></a>
                        </td>
                        <td><?= $ProdServOrdem[$i]['ServNome'] ?></td>
                        <td><span class="btn btn-block btn-outline-secondary btn-xs"> Serviço</span></td>
                        <td><?= $ProdServOrdem[$i]['ServOsQtd'] ?></td>
                        <td><?= $ProdServOrdem[$i]['ServValor'] ?></td>
                        <td><?= $ProdServOrdem[$i]['ServOsSubTotal'] ?></td>
                    </tr>
                <?php } ?>
            <?php } ?>

        </tbody>
        <tbody>
            <tr style="background-color: #dfdfdf;">
                <td colspan="4"><span><strong>Total de valores da OS: </strong></span></td>
                <td colspan="1"><strong><?= 'R$: ' . $subTotal ?></strong></td>
                <td colspan="2"><strong><?= 'R$: ' . $ordemOS[0]['OsValorTotal'] ?></strong></td>
            </tr>
        </tbody>
    </table>


<?php } else if (isset($_POST['btn_consultar_serv']) && $_POST['btn_consultar_serv'] == 'ajx') {

    $vo = new OsVO;
    $vo->setID($_POST['OsID']);
    $ProdOrdem = $ctrl->RetornaProdOrdem($vo);
    $ProdServOrdem = $ctrl->RetornaServOrdem($vo);
    $ordemOS = $ctrl->RetornaOrdem($vo); ?>


    <table class="table table-hover" id="tabela_result_item">
        <thead>
            <tr>
                <th>Ação</th>
                <th>Produto/Serviço</th>
                <th>Tipo</th>
                <th>Quantidade</th>
                <th>Valor</th>
                <th>Valor Total</th>

            </tr>
        </thead>
        <tbody>
            <?php $subTotal = 0;
            for ($i = 0; $i < count($ProdOrdem); $i++) {
                if ($ProdOrdem[$i]['ProdOsProdID'] != '') {
                    $subTotal = $subTotal + $ProdOrdem[$i]['ProdValorVenda'] ?>
                    <tr>
                        <td>
                            <a href="#" onclick="ExcluirModalItem('<?= $ProdOrdem[$i]['OsID'] ?>','<?= $ProdOrdem[$i]['ProdOsID'] ?>','<?= $ProdOrdem[$i]['ProdDescricao'] ?>','<?= $ProdOrdem[$i]['ProdOsProdID'] ?>','<?= $ProdOrdem[$i]['ProdOsQtd'] ?>')" data-toggle="modal" data-target="#modalExcluirItem"><i style="color:red" class="fas fa-trash-alt"></i></a>
                        </td>
                        <td><?= $ProdOrdem[$i]['ProdDescricao'] ?></td>
                        <td><span class="btn btn-block btn-outline-primary btn-xs"> Produto</span></td>
                        <td><?= $ProdOrdem[$i]['ProdOsQtd'] ?></td>
                        <td><?= $ProdOrdem[$i]['ProdValorVenda'] ?></td>
                        <td><?= $ProdOrdem[$i]['ProdOsSubTotal'] ?></td>


                    </tr>
            <?php }
            } ?>

        </tbody>
        </hr>
        <tbody>
            <?php for ($i = 0; $i < count($ProdServOrdem); $i++) {
                if ($ProdServOrdem[$i]['ServOsServID'] != '') {
                    $subTotal = $subTotal + $ProdServOrdem[$i]['ServValor']  ?>
                    <tr>
                        <td>
                            <a href="#" onclick="ExcluirModalServ('<?= $ProdServOrdem[$i]['OsID'] ?>','<?= $ProdServOrdem[$i]['ServOsID'] ?>','<?= $ProdServOrdem[$i]['ServNome'] ?>','<?= $ProdServOrdem[$i]['ServOsServID'] ?>','<?= $ProdServOrdem[$i]['ServOsQtd'] ?>')" data-toggle="modal" data-target="#modalExcluirServ"><i style="color:red" class="fas fa-trash-alt"></i></a>
                        </td>
                        <td><?= $ProdServOrdem[$i]['ServNome'] ?></td>
                        <td><span class="btn btn-block btn-outline-secondary btn-xs"> Serviço</span></td>
                        <td><?= $ProdServOrdem[$i]['ServOsQtd'] ?></td>
                        <td><?= $ProdServOrdem[$i]['ServValor'] ?></td>
                        <td><?= $ProdServOrdem[$i]['ServOsSubTotal'] ?></td>
                    </tr>
                <?php } ?>
            <?php } ?>

        </tbody>
        <tbody>
            <tr style="background-color: #dfdfdf;">
                <td colspan="4"><span><strong>Total de valores da OS: </strong></span></td>
                <td colspan="1"><strong><?= 'R$: ' . $subTotal ?></strong></td>
                <td colspan="2"><strong><?= 'R$: ' . $ordemOS[0]['OsValorTotal'] ?></strong></td>
            </tr>
        </tbody>
    </table>


<?php } else {

    $os = $ctrl->RetornarOsController();
}

?>