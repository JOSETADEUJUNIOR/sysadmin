<?php
include_once '_include_autoload.php';

use Src\_public\Util;
Util::VerLogado();
use Src\Controller\VendaController;
use Src\Controller\ClienteController;
use Src\Controller\ProdutoController;
use Src\Controller\UsuarioController;
use Src\VO\VendaVO;
use Src\VO\ItensVendaVO;

$ctrlEmp = new UsuarioController();
$dadosEmp = $ctrlEmp->RetornarDadosCadastraisController();

$cliCtrl = new ClienteController();
$ctrlProd = new ProdutoController();
$produtos = $ctrlProd->RetornarProdutoController();
$clientes = $cliCtrl->RetornarClienteController();

$ctrl = new VendaController();
$dadosVenda = $ctrl->RetornarDadosVendaController();
if (isset($_GET['VendaID'])) {
    $VendaID = $_GET['VendaID'];
    $vo = new VendaVO;
    $vo->setID($_GET['VendaID']);
    $venda = $ctrl->RetornarVendaController($vo);
    $ProdVenda = $ctrl->RetornaProdVendaController($vo);
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
}else if (isset($_POST['btnFaturar'])) {
    $vo = new VendaVO;
    $vo->setID($_POST['VendaID']);
    $vo->setCliID($_POST['CliID']);
    $vo->setValorTotal($_POST['VendaValor']);
    $ret = $ctrl->FaturarVendaController($vo);

    if ($_POST['btnFaturar'] == 'ajx') {
        echo $ret;
    } else {
        $vendas = $ctrl->RetornarTodasVendaController();
    }
}else if (isset($_POST['btnExcluirItemVenda'])) {
    $vo = new ItensVendaVO;
    $vo->setVendaID($_POST['VendaID']);
    $vo->setProdQtd($_POST['qtd']);
    $vo->setProdVendaID($_POST['ExcluirID']);
    $vo->setProdID($_POST['produto']);
    $ret = $ctrl->ExcluirItemVendaController($vo);

    if ($_POST['btnExcluirItemVenda'] == 'ajx') {
        echo $ret;
    } else {
        $vendas = $ctrl->RetornarTodasVendaController();
    }
}else if (isset($_POST['btn_consultar_venda']) && $_POST['btn_consultar_venda'] == 'ajx') {

    $vo = new VendaVO;
    $vo->setID($_POST['VendaID']);
    $vendas = $ctrl->RetornarTodasVendaController();?>

<table class="table table-hover" id="tabela_result_venda">
                                <thead>
                                    <tr>
                                        <th>Ação</th>
                                        <th>Nome do cliente</th>
                                        <th>Dt Venda</th>
                                        <th>Valor</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php for ($i = 0; $i < count($vendas); $i++) { ?>
                                        <tr>
                                            <td>
                                                <?php if ($vendas[$i]['VendaFaturado'] == 'N') { ?>
                                                    <a href="venda.php?VendaID=<?= $vendas[$i]['VendaID'] ?>"><i class="fas fa-edit"></i></a>
                                                    <?php foreach ($dadosVenda as $dv) {
                                                        if ($dv['VendaID'] == $vendas[$i]['VendaID']) {
                                                            $prodVenda = $dv['ItensVendaID'];
                                                           
                                                        }
                                                    } ?>
                                                    <?php if ($prodVenda == '') { ?>
                                                        <a href="#" onclick="ExcluirModal('<?= $vendas[$i]['VendaID'] ?>','<?= $vendas[$i]['nomeCliente'] ?>')" data-toggle="modal" data-target="#modalExcluir"><i style="color:red" class="fas fa-trash-alt"></i></a>
                                                    <?php } ?>
                                                    <a href="itens_venda.php?VendaID=<?= $vendas[$i]['VendaID'] ?>"><i style="color:purple" title="Inserir os Itens da venda" class="fas fa-list"></i></a>
                                                <?php } ?>
                                                <a href="print_venda.php?VendaID=<?= $vendas[$i]['VendaID'] ?>"><i style="color:black" title="Imprimir venda" class="fas fa-print"></i></a>
                                            </td>
                                            <td><?= $vendas[$i]['CliNome'] ?></td>
                                            <td><?= Util::ExibirDataBr($vendas[$i]['VendaDT']) ?></td>
                                           
                                            <td><?= Util::FormatarValor($vendas[$i]['VendaValorTotal']) ?></td>

                                            <td><?=
                                              ($vendas[$i]['VendaFaturado'] == "S" ? '<span class="btn btn-success btn-xs">Faturado</span>' : '<span onclick="faturarVenda(' . $vendas[$i]['VendaID'] . ',' . $vendas[$i]['VendaCliID'] . ',' . $vendas[$i]['VendaValorTotal'] . ')" class="btn btn-warning btn-xs">Faturar?</span>') ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>






<?php }else if (isset($_POST['btn_consultar_item_venda']) && $_POST['btn_consultar_item_venda'] == 'ajx') {

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
