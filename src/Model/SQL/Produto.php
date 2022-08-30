<?php

namespace Src\Model\SQL;


class Produto
{

    public static function InserirProdutoSQL()
    {
        $sql = 'INSERT into tb_produto (ProdDescricao, ProdDtCriacao, ProdCodBarra, ProdValorCompra, ProdValorVenda, ProdEstoqueMin, ProdEstoque, ProdImagem, ProdImagemPath, ProdEmpID, ProdUserID) VALUES (?,?,?,?,?,?,?,?,?,?,?)';
        return $sql;
    }

    public static function FiltrarProdutoSQL($nome_filtro)
    {
        $sql = 'SELECT ProdDescricao, ProdDtCriacao, ProdCodBarra, ProdValorCompra, ProdValorVenda, ProdEstoqueMin, ProdEstoque, ProdImagem, ProdImagemPath FROM tb_produto WHERE ProdEmpID = ?';
        if (!empty($nome_filtro)) {
            $sql = $sql . ' And ProdDescricao LIKE ? OR ProdCodBarra LIKE ?';
        }
        return $sql;
    }

    public static function RetornarProdutoSQL()
    {
        $sql = 'SELECT ProdID, ProdDescricao, ProdDtCriacao, ProdCodBarra, ProdValorCompra, ProdValorVenda, ProdEstoqueMin, ProdEstoque, ProdImagem, ProdImagemPath, ProdEmpID, ProdUserID
                    FROM tb_produto Where ProdEmpID = ?';
        return $sql;
    }

    public static function AlterarProdutoSISQL()
    {
        $sql = 'UPDATE tb_produto set ProdDescricao = ?, ProdDtCriacao = ?, ProdCodBarra = ?, ProdValorCompra = ?, ProdValorVenda = ?, ProdEstoqueMin = ?, ProdEstoque = ?, ProdEmpID = ?, ProdUserID = ? Where ProdID = ?';
        return $sql;
    }

    public static function AlterarProdutoSQL()
    {
        $sql = 'UPDATE tb_produto set ProdDescricao = ?, ProdDtCriacao = ?, ProdCodBarra = ?, ProdValorCompra = ?, ProdValorVenda = ?, ProdEstoqueMin = ?, ProdEstoque = ?, ProdImagem = ?, ProdImagemPath = ?, ProdEmpID = ?, ProdUserID = ? Where ProdID = ?';
        return $sql;
    }

    public static function ExcluirProdutoSQL()
    {
        $sql = 'DELETE FROM tb_produto where ProdID = ?';
        return $sql;
    }
}
