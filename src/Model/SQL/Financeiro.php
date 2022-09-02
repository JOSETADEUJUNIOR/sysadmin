<?php

namespace Src\Model\SQL;


class Financeiro
{

    public static function InserirLancamentoSQL()
    {
        $sql = 'INSERT into tb_lancamentos (LancDescricao, LancValor, LancDtVencimento, LancDtPagamento, LancBaixado, LancFormPgto, Tipo, LancClienteID, LancEmpID, LancUserID) VALUES (?,?,?,?,?,?,?,?,?,?)';
        return $sql;
    }
}
