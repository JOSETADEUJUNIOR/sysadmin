<?php

require_once dirname(__DIR__, 3) . '/vendor/autoload.php';

use Src\Controller\FuncionarioController;
use Src\VO\FuncionarioVO;

$funcionario = new FuncionarioController;

if (isset($_POST['btn_cadastrar'])):

    $vo = new FuncionarioVO;
    $vo->setTipo($_POST['tipo']);
    $vo->setSetor($_POST['setor']);
    $vo->setNome($_POST['nome']);
    $vo->setSobreNome($_POST['sobrenome']);
    $vo->setTelefone($_POST['telefone']);
    $vo->setEmail($_POST['email']);
    $vo->setEndereco($_POST['endereco']);
    $ret = $funcionario->CadastrarFuncionario($vo);
   

endif;