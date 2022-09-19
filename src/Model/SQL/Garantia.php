<?php

namespace Src\Model\SQL;


class Garantia
{

    public static function InserirGarantia()
    {
        $sql = 'INSERT into tb_garantia_os (grtNome, grtText, grtEmpID) VALUES (?,?,?)';
        return $sql;
    }
    public static function AlterarGarantia()
    {
        $sql = 'UPDATE tb_garantia_os set grtNome = ?, grtText = ? WHERE grtEmpID = ? and grtID = ?';
        return $sql;
    }

    public static function RetornarGarantia()
    {
        $sql = 'SELECT grtID, grtNome, grtText
                    FROM tb_garantia_os Where grtEmpID = ?';
        return $sql;
    }
}
