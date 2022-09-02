<?php
include_once '_include_autoload.php';

use Src\Controller\ClienteController;
use Src\Controller\FinanceiroController;
use Src\VO\LancamentoVO;
use Src\_public\Util;

Util::VerLogado();

$ctrlCliente = new ClienteController();
$cliente = $ctrlCliente->RetornarClienteController();

$ctrl = new FinanceiroController();

if (isset($_POST['btn_inserir'])) {
    $vo = new LancamentoVO;
    $vo->setDescricao($_POST['descricao']);
    $vo->setClienteID($_POST['cliente']);
    $vo->setValor($_POST['valor']);
    $vo->setDtVencimento($_POST['dtVencimento']);
    $vo->setDtPagamento($_POST['dtPgto']);
    $vo->setFormPgto($_POST['formPgto']);
    $vo->setTipo($_POST['tipo']);
    $ret = $ctrl->InserirLancamentoController($vo);
    if ($_POST['btn_inserir'] == 'ajx') {
        echo $ret;
    }
}
