<?php

namespace Src\Model;

use Src\Model\Conexao;
use Src\VO\LancamentoVO;
use Src\Model\SQL\Financeiro;
use Src\_public\Util;


class FinanceiroDAO extends Conexao
{

    private $conexao;

    public function __construct()
    {
        $this->conexao = parent::retornaConexao();
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
}
