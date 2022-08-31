<?php

namespace Src\Model\SQL;


class Os
{

    public static function InserirOsSQL()
    {
        $sql = 'INSERT into tb_os (OsDtInicial, OsDtFinal, OsGarantia, OsDescProdServ, OsDefeito, OsObs, OsCliID, OsTecID, OsStatus, OsLaudoTec, OsEmpID) VALUES (?,?,?,?,?,?,?,?,?,?,?)';
        return $sql;
    }
    public static function RetornarOsSQL()
    {
        $sql = 'SELECT OsID, OsDtInicial, OsDtFinal, OsGarantia, OsDescProdServ, OsDefeito, OsObs, OsCliID,tb_cliente.CliNome as nomeCliente, OsTecID, OsStatus, OsLaudoTec, OsValorTotal, OsFaturado FROM tb_os
                Inner Join tb_cliente on tb_cliente.CliID = tb_os.OsCliID

             WHERE OsEmpID = ? ';
        return $sql;
    }
    public static function RetornarOrdemSQL()
    {
        $sql = 'SELECT OsID, OsDtInicial, OsDtFinal, OsGarantia, OsDescProdServ, OsDefeito, OsObs, OsCliID,tb_cliente.CliNome as nomeCliente, CliTelefone, CliEmail, CliCep, CliEndereco, CliNumero, CliBairro, CliCidade, OsTecID, OsStatus, OsLaudoTec, OsValorTotal, OsFaturado, ProdOsID, ProdValorVenda, ProdOsQtd, ProdOsProdID, ProdDescricao, ProdOsSubTotal  
        FROM tb_os
        Inner Join tb_cliente on tb_cliente.CliID = tb_os.OsCliID
        left Join tb_produto_os on tb_produto_os.ProdOs_osID = tb_os.OsID
        left Join tb_produto on tb_produto.ProdID = tb_produto_os.ProdOsProdID
        
   
     WHERE OsEmpID = ? And OsID = ?';
        return $sql;
    }

    public static function RetornarOrdemFaturadoSQL()
    {
        $sql = 'SELECT OsID, OsFaturado  
                    FROM tb_os
                        WHERE OsEmpID = ? And OsID = ?';
        return $sql;
    }

    public static function RetornarProdOrdemSQL()
    {
        $sql = 'SELECT OsID, ProdOsID, ProdValorVenda, ProdOsQtd, ProdOsProdID, ProdDescricao, ProdOsSubTotal  
        FROM tb_os
        Inner Join tb_cliente on tb_cliente.CliID = tb_os.OsCliID
        left Join tb_produto_os on tb_produto_os.ProdOs_osID = tb_os.OsID
        left Join tb_produto on tb_produto.ProdID = tb_produto_os.ProdOsProdID
        
   
     WHERE OsEmpID = ? And OsID = ?';
        return $sql;
    }
    public static function RetornarServOrdemSQL()
    {
        $sql = 'SELECT OsID, ServOsID, ServValor, ServOsQtd, ServOsServID, ServNome, ServOsSubTotal  
        FROM tb_os
        Inner Join tb_cliente on tb_cliente.CliID = tb_os.OsCliID
        left Join tb_servico_os on tb_servico_os.ServOs_osID = tb_os.OsID
        left Join tb_servico on tb_servico.ServID = tb_servico_os.ServOsServID
        
   
     WHERE OsEmpID = ? And OsID = ?';
        return $sql;
    }


    public static function RetornarOrdemServSQL()
    {
        $sql = 'SELECT OsID, OsDtInicial, OsDtFinal, OsGarantia, OsDescProdServ, OsDefeito, OsObs, OsCliID,tb_cliente.CliNome as nomeCliente, OsTecID, OsStatus, OsLaudoTec, OsValorTotal, OsFaturado, ServOsQtd, ServOsProdID, ServNome, ServOsSubTotal  
        FROM tb_os
        Inner Join tb_cliente on tb_cliente.CliID = tb_os.OsCliID
        left Join tb_servico_os on tb_servico_os.ServOs_osID = tb_os.OsID
        left Join tb_servico on tb_servico.ServID = tb_servico_os.ServOsServID
      
   
     WHERE OsEmpID = ? And OsID = ?';
        return $sql;
    }

    public static function ExcluirItemOS()
    {
        $sql = 'DELETE FROM tb_produto_os WHERE ProdOsID = ?';
        return $sql;
    }
    public static function ExcluirOS()
    {
        $sql = 'DELETE FROM tb_os WHERE OsID = ?';
        return $sql;
    }
    public static function ExcluirServOS()
    {
        $sql = 'DELETE FROM tb_servico_os WHERE ServOsID = ?';
        return $sql;
    }

    public static function BuscarItemSQL()
    {
        $sql = 'SELECT ProdEstoque, ProdValorVenda
                     FROM tb_produto
                        WHERE ProdID = ? And ProdEmpID = ?';
        return $sql;
    }
    public static function BuscarServSQL()
    {
        $sql = 'SELECT ServValor
                     FROM tb_servico
                        WHERE ServID = ? And ServEmpID = ?';
        return $sql;
    }

    public static function AtualizaItemSQL()
    {
        $sql = 'UPDATE tb_produto set ProdEstoque = ProdEstoque - ?
                        WHERE ProdID = ? And ProdEmpID = ?';
        return $sql;
    }
    public static function AtualizaExcluiItemSQL()
    {
        $sql = 'UPDATE tb_produto set ProdEstoque = ProdEstoque + ?
                        WHERE ProdID = ? And ProdEmpID = ?';
        return $sql;
    }



    public static function AlterarOsSQL()
    {
        $sql = 'UPDATE tb_os set OsDtInicial = ?, OsDtFinal = ?, OsGarantia = ?, OsDescProdServ = ?, OsDefeito = ?, OsObs = ?, OsCliID = ?, OsTecID = ?, OsStatus = ?, OsLaudoTec = ?, OsEmpID = ? WHERE OsID = ?';
        return $sql;
    }
    public static function FaturarOsSQL()
    {
        $sql = 'UPDATE tb_os set OsFaturado = ? WHERE OsEmpID = ? AND OsID = ?';
        return $sql;
    }

    public static function InserirItemOsSQL()
    {
        $sql = "INSERT into tb_produto_os (ProdOsQtd, ProdOs_osID, ProdOsProdID, ProdOsSubTotal, ProdOsEmpID) VALUES (?,?,?,?,?)";
        return $sql;
    }

    public static function AtualizaTotalOsSQL()
    {
        $sql = 'UPDATE tb_os set OsValorTotal = OsValorTotal + ? WHERE OsID = ? and OsEmpID = ?';
        return $sql;
    }
    public static function AtualizaExclusaoValorOsSQL()
    {
        $sql = 'UPDATE tb_os set OsValorTotal = OsValorTotal - ? WHERE OsID = ? and OsEmpID = ?';
        return $sql;
    }


    public static function InserirServOsSQL()
    {
        $sql = "INSERT into tb_servico_os (ServOsQtd, ServOs_osID, ServOsServID, ServOsSubTotal, ServOsEmpID) VALUES (?,?,?,?,?)";
        return $sql;
    }
}
