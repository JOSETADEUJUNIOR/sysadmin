<?php
include_once '_include_autoload.php';

use Src\Controller\GarantiaController;
use Src\VO\GarantiaVO;
use Src\_public\Util;

Util::VerLogado();

$ctrl = new GarantiaController();
$garantia = $ctrl->RetornarGarantiaController();
if (isset($_POST['btn_cadastrar'])) {
    $vo = new GarantiaVO;
    $vo->setID($_POST['grtID']);
    $vo->setNome($_POST['nome']);
    $vo->setTexto($_POST['editor']);

    $ret = $ctrl->CadastrarGarantiaController($vo);
    $garantia = $ctrl->RetornarGarantiaController();
}
