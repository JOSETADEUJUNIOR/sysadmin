<?php

namespace Src\Controller;

use Src\Model\CidadeDAO;
use Src\VO\CidadeVO;
use Src\_public\Util;

class CidadeController {

    private $dao;

    public function __construct()
    {
        $this->dao = new CidadeDAO;
    }

    public function CadastrarCidadeController(CidadeVO $vo) : int
    {
        if (empty($vo->getNomeCidade()))
        {
            return 0;
        }
            $vo->setfuncao(CADASTRO_CIDADE);
            $vo->setIdLogado(Util::CodigoLogado());

        return $this->dao->CadastrarCidadeDAO($vo);
    }

    public function RetornarCidadeController(): array
    {
        return $this->dao->RetornarCidadeDAO();
    }

    public function AlterarCidadeController(CidadeVO $vo): int
    {
        if (empty($vo->getNomeCidade())) 
            {
                return 0;
            }
            $vo->setfuncao(ALTERA_CIDADE);
            $vo->setIdLogado(Util::CodigoLogado());
        return $this->dao->AlterarCidadeDAO($vo);
    }
    public function ExcluirCidadeController(CidadeVO $vo): int
    {
        if (empty($vo->getID()))
            return 0;
        
            $vo->setfuncao(EXCLUI_CIDADE);
            $vo->setIdLogado(Util::CodigoLogado());
        return $this->dao->ExcluirCidadeDAO($vo);
    }
}