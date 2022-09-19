<?php

namespace Src\Controller;

use Src\Model\GarantiaDAO;
use Src\VO\GarantiaVO;
use Src\_public\Util;


class GarantiaController{

    private $dao;

    public function __construct()
    {
        $this->dao = new GarantiaDAO;

    }
    
    public function CadastrarGarantiaController(GarantiaVO $vo) : int
    {
        if (empty($vo->getNome()))
            return 0;
        
            $vo->setfuncao(CADASTRO_SETOR);
            $vo->setIdLogado(Util::CodigoLogado());

        return $this->dao->CadastrarGarantiaDAO($vo);

    }
    public function RetornarGarantiaController() : array
    {
        return $this->dao->RetornarGarantiaDAO();
    }

   
}