<?php

namespace Src\Controller;

use Src\Model\VendaDAO;
use Src\VO\VendaVO;
use Src\VO\ItensVendaVO;
use Src\_public\Util;

class VendaController
{

    private $dao;

    public function __construct()
    {
        $this->dao = new VendaDAO;
    }

    public function CadastrarVendaController(VendaVO $vo): int
    {
        if (empty($vo->getCliID()))
            return 0;

        $vo->setfuncao(CADASTRO_VENDA);
        $vo->setIdLogado(Util::CodigoLogado());

        return $this->dao->CadastrarVendaDAO($vo);
    }
    public function AlterarVendaController(VendaVO $vo): int
    {
        if (empty($vo->getCliID()))
            return 0;

        $vo->setfuncao(CADASTRO_VENDA);
        $vo->setIdLogado(Util::CodigoLogado());

        return $this->dao->AlterarVendaDAO($vo);
    }

    public function ExcluirItemVendaController(ItensVendaVO $vo)
    {
        return $this->dao->ExcluirItemVendaDAO($vo);
    }

    public function RetornarVendaController(VendaVO $vo): array
    {

        $vo->setfuncao(CADASTRO_VENDA);
        $vo->setIdLogado(Util::CodigoLogado());

        return $this->dao->RetornarVendaDAO($vo);
    }
    public function RetornarTodasVendaController(): array
    {

        return $this->dao->RetornarTodasVendaDAO();
    }

    public function InserirItemVendaController(ItensVendaVO $vo): int
    {
        if (empty($vo->getProdQtd()))
            return 0;

        $vo->setfuncao(CADASTRO_OS);
        $vo->setIdLogado(Util::CodigoLogado());

        return $this->dao->InserirItemVendaDAO($vo);
    }
    public function RetornaProdVendaController(VendaVO $vo): array
    {
        $vo->setfuncao(CADASTRO_OS);
        $vo->setIdLogado(Util::CodigoLogado());

        return $this->dao->RetornarProdVendaDAO($vo);
    }
}
