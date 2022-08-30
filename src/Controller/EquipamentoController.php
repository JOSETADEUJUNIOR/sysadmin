<?php

namespace Src\Controller;

use Src\Model\EquipamentoDAO;
use Src\VO\EquipamentoVO;
use Src\_public\Util;

class EquipamentoController{

    private $dao;

    public function __construct(){
        $this->dao = new EquipamentoDAO;
    }

    public function CadastrarEquipamentoController(EquipamentoVO $vo):int
    {
        if (empty($vo->getIdentificacao()) || empty($vo->getDescricao()) || empty($vo->getTipoEquipID()) || empty($vo->getModeloEquipID()) )

            return 0;
       
        $vo->setfuncao(CADASTRO_EQUIPAMENTO);
        $vo->setIdLogado(Util::CodigoLogado());

        return $this->dao->CadastrarEquipamentoDAO($vo);
       
    }

    public function ConsultarEquipamentoController($BuscarTipo, $filtro_palavra): array
    {
        if (empty(trim($filtro_palavra))) {
            return 0;
        }
        return $this->dao->ConsultarEquipamentoDAO($BuscarTipo, $filtro_palavra);
    }

    public function DetalharEquipamentoController($id)
    {
        if (empty(trim($id))) {
            return 0;
        }
        return $this->dao->DetalharEquipamentoDAO($id);
    }

}
