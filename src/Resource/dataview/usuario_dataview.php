<?php
include_once '_include_autoload.php';

use Src\Controller\UsuarioController;
use Src\VO\UsuarioVO;
use Src\_public\Util;
$ctrl = new UsuarioController();

if (isset($_POST['btn_cadastrar'])) {
    $vo = new UsuarioVO;
    $vo->setTipo('1');
    $vo->setNome($_POST['nome']);
    $vo->setLogin($_POST['login']);
    $vo->setSenha($_POST['senha']);
    $vo->setStatus('1');
    $vo->setTelefone($_POST['telefone']);
   
    $ret = $ctrl->CadastrarUsuarioController($vo);
    
    if ($_POST['btn_cadastrar'] == 'ajx') {
        echo 1;
    }else {
        echo -2;
    }
}
if (isset($_POST['btn_login'])){

    $vo = new UsuarioVO;
    $vo->setLogin($_POST['login']);
    $vo->setSenha($_POST['senha']);
    $ret = $ctrl->ValidarLoginController($vo);
        if (count($ret)==0) {
           $ret = -4;
            return $ret;
         }else{
             $id = $ret[0]['id'];
             $nome = $ret[0]['nome'];
             $empID = $ret[0]['UserEmpID'];
     
             Util::CriarSessao($nome, $id, $empID);
             header('location: index.php');
             exit;
     
         }
    
    
    }
