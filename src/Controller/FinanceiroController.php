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

    public function AlterarReceitaLancamentoController(LancamentoVO $vo) : int
    {
        if (empty($vo->getDescricao()))
            return 0;
        
            $vo->setfuncao(CADASTRO_LANCAMENTO);
            $vo->setIdLogado(Util::CodigoLogado());

        return $this->dao->AlterarReceitaLancamentoDAO($vo);

    }

    public function AlterarDespesaLancamentoController(LancamentoVO $vo) : int
    {
        if (empty($vo->getDescricao()))
            return 0;
        
            $vo->setfuncao(CADASTRO_LANCAMENTO);
            $vo->setIdLogado(Util::CodigoLogado());

        return $this->dao->AlterarDespesaLancamentoDAO($vo);

    }

    public function ExcluirLancamentoController(LancamentoVO $vo): int
    {
        if (empty($vo->getID()))
            return 0;
        
            $vo->setfuncao(EXCLUI_LANCAMENTO);
            $vo->setIdLogado(Util::CodigoLogado());
        return $this->dao->ExcluirLancamentoDAO($vo);
    }


    public function RetornaLancamentoController($tipo, $dtInicio, $dtFinal): array
    {
        
        return $this->dao->RetornaLancamentoDAO($tipo, $dtInicio, $dtFinal);
    }
    
    
}