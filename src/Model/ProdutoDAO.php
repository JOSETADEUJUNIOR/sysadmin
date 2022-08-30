<?php

namespace Src\Model;

use Src\Model\Conexao;
use Src\VO\ProdutoVO;
use Src\Model\SQL\Produto;
use Src\_public\Util;


class ProdutoDAO extends Conexao
{

    private $conexao;

    public function __construct()
    {
        $this->conexao = parent::retornaConexao();
    }

    public function RetornaProdutoDAO(): array
    {
        $sql = $this->conexao->prepare(Produto::RetornarProdutoSQL());
        $sql->bindValue(1, Util::CodigoEmpresa());
        $sql->execute();
        return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function AlterarProdutoDAO(ProdutoVO $vo): int
    {
        if ($vo->getImagem() == '') {

            $sql = $this->conexao->prepare(Produto::AlterarProdutoSISQL());
            $sql->bindValue(1, $vo->getDescricao());
            $sql->bindValue(2, $vo->getDtCriacao());
            $sql->bindValue(3, $vo->getCodBarra());
            $sql->bindValue(4, $vo->getValorCompra());
            $sql->bindValue(5, $vo->getValorVenda());
            $sql->bindValue(6, $vo->getEstoqueMin());
            $sql->bindValue(7, $vo->getEstoque());
            $sql->bindValue(8, Util::CodigoEmpresa());
            $sql->bindValue(9, Util::CodigoLogado());
            $sql->bindValue(10, $vo->getID());
        } else {
            $sql = $this->conexao->prepare(Produto::AlterarProdutoSQL());
            $sql->bindValue(1, $vo->getDescricao());
            $sql->bindValue(2, $vo->getDtCriacao());
            $sql->bindValue(3, $vo->getCodBarra());
            $sql->bindValue(4, $vo->getValorCompra());
            $sql->bindValue(5, $vo->getValorVenda());
            $sql->bindValue(6, $vo->getEstoqueMin());
            $sql->bindValue(7, $vo->getEstoque());
            $sql->bindValue(8, $vo->getImagem());
            $sql->bindValue(9, $vo->getImagemPath());
            $sql->bindValue(10, Util::CodigoEmpresa());
            $sql->bindValue(11, Util::CodigoLogado());
            $sql->bindValue(12, $vo->getID());
        }
        try {
            $sql->execute();
            return 1;
        } catch (\Exception $ex) {
            $vo->setmsg_erro($ex->getMessage());
            parent::GravarLogErro($vo);
            return -2;
        }
    }

    public function CadastrarProdutoDAO(ProdutoVO $vo): int
    {
        $sql = $this->conexao->prepare(Produto::InserirProdutoSQL());
        $sql->bindValue(1, $vo->getDescricao());
        $sql->bindValue(2, $vo->getDtCriacao());
        $sql->bindValue(3, $vo->getCodBarra());
        $sql->bindValue(4, $vo->getValorCompra());
        $sql->bindValue(5, $vo->getValorVenda());
        $sql->bindValue(6, $vo->getEstoqueMin());
        $sql->bindValue(7, $vo->getEstoque());
        $sql->bindValue(8, $vo->getImagem());
        $sql->bindValue(9, $vo->getImagemPath());
        $sql->bindValue(10, Util::CodigoEmpresa());
        $sql->bindValue(11, Util::CodigoLogado());

        try {
            $sql->execute();
            return 1;
        } catch (\Exception $ex) {
            $vo->setmsg_erro($ex->getMessage());
            parent::GravarLogErro($vo);
            return -2;
        }
    }

    public function ExcluirProdutoDAO(ProdutoVO $vo): int
    {
        $sql = $this->conexao->prepare(Produto::ExcluirProdutoSQL());
        $sql->bindValue(1, $vo->getID());

        try {
            $sql->execute();
            return 1;
        } catch (\Exception $ex) {
            $vo->setmsg_erro($ex->getMessage());
            parent::GravarLogErro($vo);
            return -2;
        }
    }

    public function FiltrarProdutoDAO($nome_filtro)
    {
        $sql = $this->conexao->prepare(Produto::FiltrarProdutoSQL($nome_filtro));
        $sql->bindValue(1, Util::CodigoEmpresa());
        if (!empty($nome_filtro)) {
            $sql->bindValue(2, "%" . $nome_filtro . "%");
            $sql->bindValue(3, "%" . $nome_filtro . "%");
        }
        $sql->execute();
        return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }
}
