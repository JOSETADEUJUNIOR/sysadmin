<?php

namespace Src\Controller;

use Src\Model\UsuarioDAO;
use Src\VO\UsuarioVO;
use Src\_public\Util;


class UsuarioController{

    private $dao;

    public function __construct()
    {
        $this->dao = new UsuarioDAO;

    }
    
    public function CadastrarUsuarioController(UsuarioVO $vo) : int
    {
        if (empty($vo->getNome()))
            return 0;
        
            $vo->setfuncao(CADASTRO_USUARIO);
            $vo->setIdLogado(Util::CodigoLogado());

        return $this->dao->CadastrarUsuarioDAO($vo);

    }

    public function AlterarEmpresaController(UsuarioVO $vo):int
    {
        if (empty($vo->getNomeEmpresa()) || empty($vo->getCNPJ())) {
            return 0;
        }
        $vo->setfuncao(ALTERA_EMPRESA);
        $vo->setIdLogado(Util::CodigoLogado());

        return $this->dao->AlterarEmpresaDAO($vo);
    }

    public function AlterarUsuarioController(UsuarioVO $vo):int
    {
        if (empty($vo->getNome()) || empty($vo->getLogin())){
            return 0;
        }

        $vo->setfuncao(ALTERA_USUARIO);
        $vo->setIdLogado(Util::CodigoLogado());

        return $this->dao->AlterarUsuarioDAO($vo);
    }


    public function RetornarDadosCadastraisController() : array
    {
        return $this->dao->RetornaDadosCadastraisDAO();
    }
    
    public function RetornarDadosUsuarioController() : array
    {
        return $this->dao->RetornaDadosUsuarioDAO();
    }

    public function ValidarLoginController(UsuarioVO $vo)
    {
        if (empty($vo->getLogin()) || empty($vo->getSenha())) {
            return 0;
        }

        $vo->setfuncao(CADASTRO_USUARIO);
        $vo->setIdLogado(Util::CodigoLogado());

        return $this->dao->ValidarLoginDAO($vo);
    }
    
}