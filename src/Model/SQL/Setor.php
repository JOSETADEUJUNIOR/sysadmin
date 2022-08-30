<?php

namespace Src\Model\SQL;


class Setor
{

    public static function InserirSetor()
    {
        $sql = 'INSERT into tb_setor (nome_setor) VALUES (?)';
        return $sql;
    }

    public static function RetornarSetor()
    {
        $sql = 'SELECT id, nome_setor
                    FROM tb_setor';
        return $sql;
    }

    public static function AlterarSetor()
    {
        $sql = 'UPDATE tb_setor set nome_setor = ? where id = ?';
        return $sql;

    }

    public static function ExcluirSetor()
    {
        $sql = 'DELETE FROM tb_setor where id = ?';
        return $sql;

    }
}
