<?php

namespace Src\Controller;

use Src\Model\OsDAO;
use Src\VO\OsVO;
use Src\_public\Util;
use Src\VO\ProdutoOSVO;
use Src\VO\ServicoOSVO;

class OsController
{

    private $dao;

    public function __construct()
    {
        $this->dao = new OsDAO;
    }

    public function CadastrarOsController(OsVO $vo): int
    {
        if (empty($vo->getDtInicial()))
            return 0;

        $vo->setfuncao(CADASTRO_OS);
        $vo->setIdLogado(Util::CodigoLogado());

        return $this->dao->CadastrarOsDAO($vo);
    }

    public function InserirItemOrdemController(ProdutoOSVO $vo): int
    {
        if (empty($vo->getProdQtd()))
            return 0;

        $vo->setfuncao(CADASTRO_OS);
        $vo->setIdLogado(Util::CodigoLogado());

        return $this->dao->InserirItemOsDAO($vo);
    }
    public function InserirServOrdemController(ServicoOSVO $vo): int
    {
        if (empty($vo->getServQtd()))
            return 0;

        $vo->setfuncao(CADASTRO_OS);
        $vo->setIdLogado(Util::CodigoLogado());

        return $this->dao->InserirServOsDAO($vo);
    }

    public function RetornaOrdem(OsVO $vo): array
    {

        $vo->setfuncao(CADASTRO_OS);
        $vo->setIdLogado(Util::CodigoLogado());

        return $this->dao->RetornarOrdemDAO($vo);
    }
    public function RetornaProdOrdem(OsVO $vo): array
    {

        $vo->setfuncao(CADASTRO_OS);
        $vo->setIdLogado(Util::CodigoLogado());

        return $this->dao->RetornarProdOrdemDAO($vo);
    }
    public function RetornaServOrdem(OsVO $vo): array
    {

        $vo->setfuncao(CADASTRO_OS);
        $vo->setIdLogado(Util::CodigoLogado());

        return $this->dao->RetornarServOrdemDAO($vo);
    }

    public function ExcluirItemOSController(ProdutoOSVO $vo)
    {
        $vo->setfuncao(EXCLUI_ITEM_OS);
        $vo->setIdLogado(Util::CodigoLogado());
        return $this->dao->ExcluirItemOSDAO($vo);
    }
    public function ExcluirOSController(OSVO $vo)
    {
        $vo->setfuncao(EXCLUI_ITEM_OS);
        $vo->setIdLogado(Util::CodigoLogado());
        return $this->dao->ExcluirOSDAO($vo);
    }

 public function ExcluirServOSController(ServicoOSVO $vo)
    {
        $vo->setfuncao(EXCLUI_ITEM_OS);
        $vo->setIdLogado(Util::CodigoLogado());
        return $this->dao->ExcluirServOSDAO($vo);
    }


    public function AlterarOsController(OsVO $vo): int
    {
        if (empty($vo->getDtInicial()))
            return 0;

        $vo->setfuncao(ALTERA_OS);
        $vo->setIdLogado(Util::CodigoLogado());

        return $this->dao->AlterarOsDAO($vo);
    }


    public function RetornarOsController(): array
    {
        return $this->dao->RetornarOsDAO();
    }
    public function RetornarOsServController(): array
    {
        return $this->dao->RetornarOsDAO();
    }
}
