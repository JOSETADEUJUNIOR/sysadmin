<?php

namespace Src\VO;

use Src\_public\Util;
use Src\VO\LogErro;

class ProdutoVO extends LogErro
{

    private $ProdID;
    private $ProdDescricao;
    private $ProdDtCriacao;
    private $ProdCodBarra;
    private $ProdValorCompra;
    private $ProdValorVenda;
    private $ProdEstoqueMin;
    private $ProdEstoque;
    private $Imagem;
    private $ImagemPath;


    public function setID($p)
    {

        $this->ProdID = $p;
    }

    public function getID()
    {
        return $this->ProdID;
    }

    public function setDescricao($p)
    {

        $this->ProdDescricao = Util::TratarDados($p);
    }

    public function getDescricao()
    {
        return $this->ProdDescricao;
    }

    public function setDtCriacao($p)
    {

        $this->ProdDtCriacao = Util::TratarDados($p);
    }

    public function getDtCriacao()
    {
        return $this->ProdDtCriacao;
    }

    public function setCodBarra($p)
    {

        $this->ProdCodBarra = Util::TratarDados($p);
    }

    public function getCodBarra()
    {
        return $this->ProdCodBarra;
    }

    public function setValorCompra($p)
    {

        $this->ProdValorCompra = Util::TratarDados($p);
    }

    public function getValorCompra()
    {
        return $this->ProdValorCompra;
    }

    public function setValorVenda($p)
    {

        $this->ProdValorVenda = Util::TratarDados($p);
    }

    public function getValorVenda()
    {
        return $this->ProdValorVenda;
    }

    public function setEstoqueMin($p)
    {

        $this->ProdEstoqueMin = Util::TratarDados($p);
    }

    public function getEstoqueMin()
    {
        return $this->ProdEstoqueMin;
    }

    public function setEstoque($p)
    {

        $this->ProdEstoque = Util::TratarDados($p);
    }

    public function getEstoque()
    {
        return $this->ProdEstoque;
    }

    public function setImagem($p)
    {

        $this->Imagem = Util::TratarDados($p);
    }

    public function getImagem()
    {
        return $this->Imagem;
    }

    public function setImagemPath($p)
    {

        $this->ImagemPath = Util::TratarDados($p);
    }

    public function getImagemPath()
    {
        return $this->ImagemPath;
    }
}
