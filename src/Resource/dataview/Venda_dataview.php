<?php
include_once '_include_autoload.php';

use Src\Controller\VendaController;
use Src\Controller\ClienteController;
use Src\Controller\ProdutoController;
use Src\VO\VendaVO;
use Src\VO\ItensVendaVO;
use Src\_public\Util;

Util::VerLogado();

$cliCtrl = new ClienteController();
$ctrlProd = new ProdutoController();
$produtos = $ctrlProd->RetornarProdutoController();
$clientes = $cliCtrl->RetornarClienteController();

$ctrl = new VendaController();

if (isset($_GET['VendaID'])) {
    $VendaID = $_GET['VendaID'];
    $vo = new VendaVO;
    $vo->setID($_GET['VendaID']);
    $venda = $ctrl->RetornarVendaController($vo);
    $ProdVenda = $ctrl->RetornaProdVendaController($vo);
    Util::debug($ProdVenda);
}

if (isset($_POST['btn_cadastrar'])) {
    $vo = new VendaVO;
    $vo->setDtVenda($_POST['VendaDT']);
    $vo->setCliID($_POST['Vendacliente']);
    if ($_POST['VendaID'] > 0) {
        $vo->setID($_POST['VendaID']);
        $ret = $ctrl->AlterarVendaController($vo);
    } else {
        $ret = $ctrl->CadastrarVendaController($vo);
    }

    if ($_POST['btn_cadastrar'] == 'ajx') {
        echo $ret;
    }
} else if (isset($_POST['btn_addItem'])) {
    $vo = new ItensVendaVO;
    $vo->setVendaID($_POST['VendaID']);
    $vo->setProdQtd($_POST['qtdProd']);
    $vo->setProdID($_POST['produto']);

    $ret = $ctrl->InserirItemVendaController($vo);

    if ($_POST['btn_addItem'] == 'ajx') {
        echo $ret;
    } else {
        $vendas = $ctrl->RetornarTodasVendaController();
    }
} else if (isset($_POST['btnExcluirItemVenda'])) {
    $vo = new ItensVendaVO;
    $vo->setVendaID($_POST['VendaID']);
    $vo->setProdQtd($_POST['qtd']);
    $vo->setID($_POST['ExcluirID']);
    $vo->setProdID($_POST['produto']);
    $ret = $ctrl->ExcluirItemVendaController($vo);

    if ($_POST['btnExcluirItemVenda'] == 'ajx') {
        echo $ret;
    } else {
        $vendas = $ctrl->RetornarTodasVendaController();
    }
} else if (isset($_POST['btn_consultar_item']) && $_POST['btn_consultar_item'] == 'ajx') {

    $vo = new VendaVO;
    $vo->setID($_POST['VendaID']);
    $venda = $ctrl->RetornarVendaController($vo);
    $ProdVenda = $ctrl->RetornaProdVendaController($vo); ?>

    <table class="table table-hover" id="tabela_result_item_venda">
        <thead>
            <tr>
                <th>Ação</th>
                <th>Produto</th>
                <th>Quantidade</th>
                <th>Valor</th>
                <th>Valor Total</th>

            </tr>
        </thead>
        <tbody>
            <?php $subTotal = 0;
            for ($i = 0; $i < count($ProdVenda); $i++) {
                if ($ProdVenda[$i]['ItensProdID'] != '') {
                    $subTotal = $subTotal + $ProdVenda[$i]['ProdValorVenda'] ?>
                    <tr>
                        <td>
                            <a href="#" onclick="ExcluirModalItemVenda('<?= $ProdVenda[$i]['VendaID'] ?>','<?= $ProdVenda[$i]['ItensID'] ?>','<?= $ProdVenda[$i]['ProdDescricao'] ?>','<?= $ProdVenda[$i]['ItensProdID'] ?>','<?= $ProdVenda[$i]['ItensQtd'] ?>')" data-toggle="modal" data-target="#modalExcluirItemVenda"><i style="color:red" class="fas fa-trash-alt"></i></a>
                        </td>
                        <td><?= $ProdVenda[$i]['ProdDescricao'] ?></td>
                        <td><?= $ProdVenda[$i]['ItensQtd'] ?></td>
                        <td><?= $ProdVenda[$i]['ProdValorVenda'] ?></td>
                        <td><?= $ProdVenda[$i]['ItensSubTotal'] ?></td>


                    </tr>
            <?php }
            } ?>

        </tbody>
        </hr>
        <tbody>
            <tr style="background-color: #dfdfdf;">
                <td colspan="3"><span><strong>Total de valores dos itens: </strong></span></td>
                <td colspan="1"><strong><?= 'R$: ' . Util::FormatarValor($subTotal) ?></strong></td>
                <td colspan="2"><strong><?= 'R$: ' . Util::FormatarValor($venda[0]['VendaValorTotal']) ?></strong></td>
            </tr>
        </tbody>
    </table>


<?php } else {
    $vendas = $ctrl->RetornarTodasVendaController();
}
