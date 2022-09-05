<?php

namespace Src\VO;

use Src\_public\Util;
use Src\VO\LancamentoVO;

class VendaVO extends LancamentoVO
{

    private $VendaID;
    private $VendaDT;
    private $VendaValorTotal;
    private $VendaDesconto;
    private $VendaFaturado;
    private $VendaCliID;
    private $VendaLancamentoID;
    
    public function setID($id)
    {

        $this->VendaID = $id;
    }

    public function getID()
    {
        return $this->VendaID;
    }

    public function setDtVenda($p)
    {

        $this->VendaDT = Util::TratarDados($p);
    }

    public function getDtVenda()
    {
        return $this->VendaDT;
    }

    public function setValorTotal($p)
    {

        $this->VendaValorTotal = Util::TratarDados($p);
    }

    public function getValorTotal()
    {
        return $this->VendaValorTotal;
    }

    public function setDesconto($p)
    {

        $this->VendaDesconto = Util::TratarDados($p);
    }

    public function getDesconto()
    {
        return $this->VendaDesconto;
    }

    public function setFaturado($p)
    {

        $this->VendaFaturado = Util::TratarDados($p);
    }

    public function getFaturado()
    {
        return $this->VendaFaturado;
    }

    public function setCliID($p)
    {

        $this->VendaCliID = Util::TratarDados($p);
    }

    public function getCliID()
    {
        return $this->VendaCliID;
    }

    public function setLancamentoID($p)
    {

        $this->VendaLancamentoID = Util::TratarDados($p);
    }

    public function getLancamentoID()
    {
        return $this->VendaLancamentoID;
    }
}
