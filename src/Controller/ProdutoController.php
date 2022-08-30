<?php

namespace Src\Controller;

use Src\Model\ProdutoDAO;
use Src\VO\ProdutoVO;
use Src\_public\Util;


class ProdutoController
{

    private $dao;

    public function __construct()
    {
        $this->dao = new ProdutoDAO;
    }

    public function CadastrarProduto(ProdutoVO $vo): int
    {
        if (empty($vo->getDescricao()))
            return 0;

        $vo->setfuncao(CADASTRO_PRODUTO);
        $vo->setIdLogado(Util::CodigoLogado());

        return $this->dao->CadastrarProdutoDAO($vo);
    }

    public function AlterarProdutoController(ProdutoVO $vo): int
    {
        if (empty($vo->getDescricao()))
            return 0;

        $vo->setfuncao(ALTERA_PRODUTO);
        $vo->setIdLogado(Util::CodigoLogado());

        return $this->dao->AlterarProdutoDAO($vo);
    }

    public function RetornarProdutoController(): array
    {
        return $this->dao->RetornaProdutoDAO();
    }

    public function FiltrarProdutoController($nome_filtro)
    {
        return $this->dao->FiltrarProdutoDAO($nome_filtro);
    }

    public function ExcluirProdutoController(ProdutoVO $vo): int
    {
        if (empty($vo->getID()))
            return 0;

        $vo->setfuncao(EXCLUI_PRODUTO);
        $vo->setIdLogado(Util::CodigoLogado());
        return $this->dao->ExcluirProdutoDAO($vo);
    }
}
