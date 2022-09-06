<?php

namespace Src\Model;

use Src\Model\Conexao;
use Src\VO\LancamentoVO;
use Src\Model\SQL\Financeiro;
use Src\Model\SQL\Os;
use Src\_public\Util;


class FinanceiroDAO extends Conexao
{

    private $conexao;

    public function __construct()
    {
        $this->conexao = parent::retornaConexao();
    }



    public function AlterarReceitaLancamentoDAO(LancamentoVO $vo): int
    {

        $sql = $this->conexao->prepare(Financeiro::AlterarReceitaLancamentoSQL());
        $sql->bindValue(1, $vo->getDescricao());
        $sql->bindValue(2, $vo->getValor());
        $sql->bindValue(3, $vo->getDtVencimento());
        $sql->bindValue(4, $vo->getDtPagamento());
        $sql->bindValue(5, $vo->getFormPgto());
        $sql->bindValue(6, $vo->getTipo());
        $sql->bindValue(7, $vo->getClienteID());
        $sql->bindValue(8, Util::CodigoEmpresa());
        $sql->bindValue(9, Util::CodigoLogado());
        $sql->bindValue(10, $vo->getID());


        try {
            $sql->execute();
            return 1;
        } catch (\Exception $ex) {
            $vo->setmsg_erro($ex->getMessage());
            parent::GravarLogErro($vo);
            return -1;
        }
    }


    public function AlterarDespesaLancamentoDAO(LancamentoVO $vo): int
    {

        $sql = $this->conexao->prepare(Financeiro::AlterarDespesaLancamentoSQL());
        $sql->bindValue(1, $vo->getDescricao());
        $sql->bindValue(2, $vo->getValor());
        $sql->bindValue(3, $vo->getDtVencimento());
        $sql->bindValue(4, $vo->getDtPagamento());
        $sql->bindValue(5, $vo->getFormPgto());
        $sql->bindValue(6, $vo->getTipo());
        $sql->bindValue(7, $vo->getClienteID());
        $sql->bindValue(8, Util::CodigoEmpresa());
        $sql->bindValue(9, Util::CodigoLogado());
        $sql->bindValue(10, $vo->getID());


        try {
            $sql->execute();
            return 1;
        } catch (\Exception $ex) {
            $vo->setmsg_erro($ex->getMessage());
            parent::GravarLogErro($vo);
            return -1;
        }
    }

    public function ExcluirLancamentoDAO(LancamentoVO $vo): int
    {

        $sql = $this->conexao->prepare(Financeiro::BuscarOsFaturadaSQL());
        $sql->bindValue(1, $vo->getID());
        $sql->execute();

        $OsID = $sql->fetchAll(\PDO::FETCH_ASSOC);

        if (count($OsID) > 0) {
            $sql = $this->conexao->prepare(Os::FaturarOsSQL());
            $sql->bindValue(1, 'N');
            $sql->bindValue(2, '');
            $sql->bindValue(3, Util::CodigoEmpresa());
            $sql->bindValue(4, $OsID[0]['OsID']);
            $sql->execute();
        }

        $sql = $this->conexao->prepare(Financeiro::ExcluirLancamentoSQL());
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







    public function InserirLancamentoDAO(LancamentoVO $vo): int
    {

        $sql = $this->conexao->prepare(Financeiro::InserirLancamentoSQL());
        $sql->bindValue(1, $vo->getDescricao());
        $sql->bindValue(2, $vo->getValor());
        $sql->bindValue(3, $vo->getDtVencimento());
        $sql->bindValue(4, $vo->getDtPagamento());
        $sql->bindValue(5, $vo->getBaixado());
        $sql->bindValue(6, $vo->getFormPgto());
        $sql->bindValue(7, $vo->getTipo());
        $sql->bindValue(8, $vo->getClienteID());
        $sql->bindValue(9, Util::CodigoEmpresa());
        $sql->bindValue(10, Util::CodigoLogado());

        try {
            $sql->execute();
            return 1;
        } catch (\Exception $ex) {
            $vo->setmsg_erro($ex->getMessage());
            parent::GravarLogErro($vo);
            return -1;
        }
    }

    public function RetornaLancamentoDAO($tipo, $dtInicio, $dtFinal): array
    {

        $sql = $this->conexao->prepare(Financeiro::RetornaLancamentoSQL($tipo, $dtInicio, $dtFinal));
        $sql->bindValue(1, Util::CodigoEmpresa());
        $sql->execute();
        return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function RetornaTodosLancamentoDAO(): array
    {

        $sql = $this->conexao->prepare(Financeiro::RetornaTodosLancamentoSQL());
        $sql->bindValue(1, Util::CodigoEmpresa());
        $sql->execute();
        return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }
}
