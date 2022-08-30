<?php

namespace Src\Model\SQL;


class Cidade
{

    public static function InserirCidade()
    {
        $sql = 'INSERT into tb_cidade (nome_cidade, estado_id) VALUES (?,?)';
        return $sql;
    }

    public static function RetornarCidade()
    {
        $sql = 'SELECT tb_cidade.id, nome_cidade, estado_id
                    FROM tb_cidade
                        INNER JOIN tb_estado on
                                tb_cidade.id = tb_estado.id';
        return $sql;
    }

    public static function AlterarCidade()
    {
        $sql = 'UPDATE tb_cidade set nome_cidade = ?, estado_id = ? where id = ?';
        return $sql;

    }

    public static function ExcluirCidade()
    {
        $sql = 'DELETE FROM tb_cidade where id = ?';
        return $sql;

    }
}
