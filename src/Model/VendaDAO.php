<?php

namespace Src\Model;

use Src\Model\Conexao;
use Src\VO\VendaVO;
use Src\VO\ItensVendaVO;
use Src\Model\SQL\Venda;
use Src\_public\Util;

class VendaDAO extends Conexao
{
    private $conexao;

    public function __construct()
    {
        $this->conexao = parent::retornaConexao();
    }

    public function CadastrarVendaDAO(VendaVO $vo): int
    {
        $sql = $this->conexao->prepare(Venda::InserirVendaSQL());
        $sql->bindValue(1, $vo->getDtVenda());
        $sql->bindValue(2, $vo->getCliID());
        $sql->bindValue(3, Util::CodigoEmpresa());
        $sql->bindValue(4, Util::CodigoLogado());

        try {
            $sql->execute();
            return 1;
        } catch (\Exception $ex) {

            $vo->setmsg_erro($ex->getMessage());
            parent::GravarLogErro($vo);
            return -1;
        }
    }

    public function AlterarVendaDAO(VendaVO $vo): int
    {
        $sql = $this->conexao->prepare(Venda::AlterarVendaSQL());
        $sql->bindValue(1, $vo->getDtVenda());
        $sql->bindValue(2, $vo->getCliID());
        $sql->bindValue(3, Util::CodigoEmpresa());
        $sql->bindValue(4, Util::CodigoLogado());
        $sql->bindValue(5, $vo->getID());

        try {
            $sql->execute();
            return 1;
        } catch (\Exception $ex) {

            $vo->setmsg_erro($ex->getMessage());
            parent::GravarLogErro($vo);
            return -1;
        }
    }


    public function ExcluirItemVendaDAO(ItensVendaVO $vo)
    {

        $sql = $this->conexao->prepare(Venda::BuscarItemVendaSQL());
        $sql->bindValue(1, $vo->getProdID());
        $sql->bindValue(2, Util::CodigoEmpresa());
        $sql->execute();

        $dadosItem = $sql->fetchAll(\PDO::FETCH_ASSOC);
        $valor = $dadosItem[0]['ProdValorVenda'];
        $qtd = $vo->getProdQtd();

        $sql = $this->conexao->prepare(Venda::AtualizaExcluiItemVendaSQL());

        $sql->bindValue(1, $qtd);
        $sql->bindValue(2, $vo->getProdID());
        $sql->bindValue(3, Util::CodigoEmpresa());
        $sql->execute();

        $sql = $this->conexao->prepare(Venda::ExcluirItemVenda());
        $sql->bindValue(1, $vo->getProdID());

        $sql->execute();


        $SubTotal = $valor * $qtd;

        try {
            $sql->execute();

            $sql = $this->conexao->prepare(Venda::AtualizaExclusaoValorVendaSQL());
            $sql->bindValue(1, $SubTotal);
            $sql->bindValue(2, $vo->getVendaID());
            $sql->bindValue(3, Util::CodigoEmpresa());
            $sql->execute();


            return 1;
        } catch (\Exception $ex) {
            $vo->setmsg_erro($ex->getMessage());
            parent::GravarLogErro($vo);
            return -2;
        }
    }



    public function RetornarVendaDAO(VendaVO $vo): array
    {
        $sql = $this->conexao->prepare(Venda::RetornarVendaSQL());
        $sql->bindValue(1, Util::CodigoEmpresa());
        $sql->bindValue(2, $vo->getID());
        $sql->execute();
        return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function RetornarTodasVendaDAO(): array
    {
        $sql = $this->conexao->prepare(Venda::RetornarTodasVendaSQL());
        $sql->bindValue(1, Util::CodigoEmpresa());
        $sql->execute();
        return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function InserirItemVendaDAO(ItensVendaVO $vo): int
    {
        $sql = $this->conexao->prepare(Venda::BuscarItemVendaSQL());
        $sql->bindValue(1, $vo->getProdID());
        $sql->bindValue(2, Util::CodigoEmpresa());
        $sql->execute();

        $dadosItem = $sql->fetchAll(\PDO::FETCH_ASSOC);
        $estoque = $dadosItem[0]['ProdEstoque'];
        $valor = $dadosItem[0]['ProdValorVenda'];
        $qtd = $vo->getProdQtd();
        if ($estoque < $qtd) {
            return -13;
        }

        $sql = $this->conexao->prepare(Venda::AtualizaItemVendaSQL());

        $sql->bindValue(1, $qtd);
        $sql->bindValue(2, $vo->getProdID());
        $sql->bindValue(3, Util::CodigoEmpresa());
        $sql->execute();

        $SubTotal = $valor * $qtd;

        $sql = $this->conexao->prepare(Venda::InserirItemVendaSQL());
        $sql->bindValue(1, $SubTotal);
        $sql->bindValue(2, $vo->getProdQtd());
        $sql->bindValue(3, $vo->getVendaID());
        $sql->bindValue(4, $vo->getProdID());
        $sql->bindValue(5, Util::CodigoEmpresa());


        try {
            $sql->execute();

            $sql = $this->conexao->prepare(Venda::AtualizaTotalVendaSQL());
            $sql->bindValue(1, $SubTotal);
            $sql->bindValue(2, $vo->getVendaID());
            $sql->bindValue(3, Util::CodigoEmpresa());
            $sql->execute();

            return 1;
        } catch (\Exception $ex) {

            $vo->setmsg_erro($ex->getMessage());
            parent::GravarLogErro($vo);
            return -1;
        }
    }

    public function RetornarProdVendaDAO(VendaVO $vo): array
    {
        $sql = $this->conexao->prepare(Venda::RetornarProdVendaSQL());
        $sql->bindValue(1, Util::CodigoEmpresa());
        $sql->bindValue(2, $vo->getID());
        $sql->execute();
        return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }
}
