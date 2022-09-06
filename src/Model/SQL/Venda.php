<?php

namespace Src\Model\SQL;


class Venda
{

    public static function InserirVendaSQL()
    {
        $sql = 'INSERT into tb_vendas (VendaDT, VendaCliID, VendaEmpID, VendaUserID) VALUES (?,?,?,?)';
        return $sql;
    }

    public static function AlterarVendaSQL()
    {
        $sql = 'UPDATE tb_vendas set VendaDT = ?, VendaCliID = ?, VendaEmpID = ?, VendaUserID = ?
                 WHERE VendaID = ?';
        return $sql;
    }

    public static function FaturarVendaSQL()
    {
        $sql = 'UPDATE tb_vendas set VendaFaturado = ?, VendaLancamentoID= ? WHERE VendaEmpID = ? AND VendaID = ?';
        return $sql;
    }

    public static function RetornarVendaFaturadoSQL()
    {
        $sql = 'SELECT VendaID, VendaFaturado  
                    FROM tb_vendas
                        WHERE VendaEmpID = ? And VendaID = ?';
        return $sql;
    }
    public static function RetornarVendaSQL()
    {
        $sql = 'SELECT VendaID, VendaDT, VendaValorTotal, ItensVendaID, VendaFaturado, VendaCliID, CliNome, CliTelefone, CliEmail, CliCep, CliEndereco, CliNumero, CliBairro, CliCidade VendaEmpID, VendaUserID, ProdDescricao, ItensQtd
                   FROM tb_vendas
                         INNER JOIN tb_cliente on tb_vendas.VendaCliID = tb_cliente.CliID 
                         Left JOIN tb_Itens_venda on tb_Itens_venda.ItensVendaID = tb_vendas.VendaID
                         Left JOIN tb_produto on tb_produto.ProdID = tb_Itens_venda.ItensProdID
                         WHERE VendaEmpID = ? AND VendaID = ?';
        return $sql;
    }
    public static function RetornarTodasVendaSQL()
    {
        $sql = 'SELECT VendaID, VendaDT, VendaFaturado, VendaValorTotal, VendaCliID, CliNome, VendaEmpID, VendaUserID
                   FROM tb_vendas
                        INNER JOIN tb_cliente on tb_vendas.VendaCliID = tb_cliente.CliID    
                     WHERE VendaEmpID = ?';
        return $sql;
    }



    public static function RetornarDadosVenda()
    {
        $sql = 'SELECT VendaID, ItensVendaID

        FROM tb_vendas
            Left JOIN tb_Itens_venda on tb_vendas.VendaID = tb_Itens_venda.ItensVendaID 
                 WHERE VendaEmpID = ?';
        return $sql;
    }





    public static function RetornarProdVendaSQL()
    {
        $sql = 'SELECT VendaID, ItensID, ProdValorVenda, ItensQtd, ItensProdID, ProdDescricao, ItensSubTotal  
	                FROM tb_vendas
                        Inner Join tb_cliente on tb_cliente.CliID = tb_vendas.VendaCliID
                        left Join tb_Itens_venda on tb_Itens_venda.ItensVendaID = tb_vendas.VendaID
                        left Join tb_produto on tb_produto.ProdID = tb_Itens_venda.ItensProdID
                          WHERE VendaEmpID = ? And VendaID = ?';
        return $sql;
    }

    public static function BuscarItemVendaSQL()
    {
        $sql = 'SELECT ProdEstoque, ProdValorVenda
                        from tb_produto WHERE ProdID = ? AND ProdEmpID = ?';
        return $sql;
    }
    public static function AtualizaTotalVendaSQL()
    {
        $sql = 'UPDATE tb_vendas set VendaValorTotal = VendaValorTotal + ? WHERE VendaID = ? and VendaEmpID = ?';
        return $sql;
    }
    public static function AtualizaItemVendaSQL()
    {
        $sql = 'UPDATE tb_produto set ProdEstoque = ProdEstoque - ?
                        WHERE ProdID = ? And ProdEmpID = ?';
        return $sql;
    }

    public static function AtualizaExcluiItemVendaSQL()
    {
        $sql = 'UPDATE tb_produto set ProdEstoque = ProdEstoque + ?
                        WHERE ProdID = ? And ProdEmpID = ?';
        return $sql;
    }
    public static function ExcluirItemVenda()
    {
        $sql = 'DELETE FROM tb_Itens_venda WHERE ItensID = ?';
        return $sql;
    }

    public static function AtualizaExclusaoValorVendaSQL()
    {
        $sql = 'UPDATE tb_vendas set VendaValorTotal = VendaValorTotal - ? WHERE VendaID = ? and VendaEmpID = ?';
        return $sql;
    }


    public static function InserirItemVendaSQL()
    {
        $sql = 'INSERT into tb_Itens_venda (ItensSubTotal, ItensQtd, ItensVendaID, ItensProdID, ItensEmpID) VALUES (?,?,?,?,?)';
        return $sql;
    }
}
