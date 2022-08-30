<?php

require_once dirname(__DIR__, 3) . '/vendor/autoload.php';

use Src\Controller\AlocarEquipamentoController;
use Src\VO\AlocarVO;

$alocar = new AlocarEquipamentoController;

if(isset($_POST['btn_cadastrar'])):
    $vo = new AlocarVO;
    #$vo->setSituacao($_POST['situacao']);
    #$vo->setDataAlocacao($_POST['data_alocacao']);
    #$vo->setDataRemocao($_POST['data_remocao']);
    $vo->setEquipamentoID($_POST['equipamento']);
    $vo->setSetorID($_POST['setor']);
    $ret = $alocar->CadastrarLocacao($vo);

endif;

