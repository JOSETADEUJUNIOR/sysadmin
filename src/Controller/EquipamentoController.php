<?php

namespace Src\Controller;

use Src\Model\EquipamentoDAO;
use Src\VO\EquipamentoVO;
use Src\_public\Util;
use Src\VO\AlocarVO;

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

    public function AlocarEquipamentoController(AlocarVO $vo): int
    {
        if (empty($vo->getEquipamentoID())) 
            return 0 ;
            
            $vo->setfuncao(CADASTRO_ALOCAR);
            $vo->setDataAlocacao(Util::DataAtual());
            $vo->setSituacao(SITUACAO_ALOCADO);
            $vo->setIdLogado(Util::CodigoLogado());
            

        return $this->dao->AlocarEquipamentoDAO($vo);
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

    public function RetornarEquipamentoController()
    {
        return $this->dao->RetornarEquipamentoDAO();
    }

}
