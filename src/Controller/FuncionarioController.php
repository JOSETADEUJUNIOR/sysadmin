<?php

namespace Src\Controller;

use Src\Model\FuncionarioDAO;
use Src\VO\FuncionarioVO;

class FuncionarioController{

    public function CadastrarFuncionario(FuncionarioVO $vo):int
    {
        if(empty($vo->getSetor($_POST['setor'])) || empty($vo->getTipo($_POST['tipo'])) || empty($vo->getNome($_POST['nome'])) || empty($vo->getSobreNome($_POST['sobrenome'])) || empty($vo->getEmail($_POST['email'])) || empty($vo->getTelefone($_POST['telefone'])) || empty($vo->getEndereco($_POST['endereco']))):

            return 0;
        endif;
        return 1;
    }
}

