<?php

namespace Src\Model\SQL;


class Cliente
{

    public static function InserirClienteSQL()
    {
        $sql = 'INSERT into tb_cliente (CliNome, CliDtNasc, CliTelefone, CliEmail, CliCep, CliEndereco, CliNumero, CliBairro, CliCidade, CliEstado, CliDescricao, CliEmpID, CliStatus, CliUserID) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)';
        return $sql;
    }

    public static function FiltrarClienteSQL($nome_filtro)
    {
        $sql = 'SELECT CliID, CliNome, CliDtNasc, CliTelefone, CliEmail, CliCep, CliEndereco, CliNumero, CliBairro, CliCidade, CliEstado, CliDescricao, CliEmpID, CliStatus FROM tb_cliente WHERE CliEmpID = ?';
        if (!empty($nome_filtro)) {
            $sql = $sql . ' And CliNome LIKE ?';
        }
        return $sql;
    }

    public static function RetornarClienteSQL()
    {
        $sql = 'SELECT CliID, CliNome, CliDtNasc, CliTelefone, CliEmail, CliCep, CliEndereco, CliNumero, CliBairro, CliCidade, CliEstado, CliDescricao, CliEmpID, CliStatus
                    FROM tb_cliente Where CliEmpID = ?';
        return $sql;
    }

    public static function AlterarClienteSQL()
    {
        $sql = 'UPDATE tb_cliente set CliNome = ?, CliDtNasc = ?, CliTelefone = ?, CliEmail = ?, CliCep = ?, CliEndereco = ?, CliNumero = ?, CliBairro = ?, CliCidade = ?, CliEstado = ?, CliDescricao = ?, CliEmpID = ?, CliStatus = ?, CliUserID = ? where CliID = ?';
        return $sql;
    }

    public static function ExcluirClienteSQL()
    {
        $sql = 'DELETE FROM tb_cliente where CliID = ?';
        return $sql;
    }
}
