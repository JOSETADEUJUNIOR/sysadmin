<?php

namespace Src\Controller;

use Src\Model\ClienteDAO;
use Src\VO\ClienteVO;
use Src\_public\Util;


class ClienteController{

    private $dao;

    public function __construct()
    {
        $this->dao = new ClienteDAO;

    }
    
    public function CadastrarClienteController(ClienteVO $vo) : int
    {
        if (empty($vo->getNome()))
            return 0;
        
            $vo->setfuncao(CADASTRO_CLIENTE);
            $vo->setIdLogado(Util::CodigoLogado());

        return $this->dao->CadastrarClienteDAO($vo);

    }
    
    public function FiltrarClienteController($nome_filtro)
    {
        return $this->dao->FiltrarClienteDAO($nome_filtro);

    }
    
    public function RetornarClienteController() : array
    {
        return $this->dao->RetornaClienteDAO();
    }

    public function AlterarClienteController(ClienteVO $vo): int
    {
        if (empty($vo->getNome()))
            return 0;

            $vo->setfuncao(ALTERA_CLIENTE);
            $vo->setIdLogado(Util::CodigoLogado());
        return $this->dao->AlterarClienteDAO($vo);
    }

    public function ExcluirClienteController(ClienteVO $vo): int
    {
        if (empty($vo->getID()))
            return 0;
        
            $vo->setfuncao(EXCLUI_SETOR);
            $vo->setIdLogado(Util::CodigoLogado());
        return $this->dao->ExcluirClienteDAO($vo);
    }
}