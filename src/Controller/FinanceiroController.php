<?php

namespace Src\Controller;

use Src\Model\FinanceiroDAO;
use Src\VO\LancamentoVO;
use Src\_public\Util;


class FinanceiroController{

    private $dao;

    public function __construct()
    {
        $this->dao = new FinanceiroDAO;

    }
    
    public function InserirLancamentoController(LancamentoVO $vo) : int
    {
        if (empty($vo->getDescricao()))
            return 0;
        
            $vo->setfuncao(CADASTRO_LANCAMENTO);
            $vo->setIdLogado(Util::CodigoLogado());

        return $this->dao->InserirLancamentoDAO($vo);

    }
    
    
}