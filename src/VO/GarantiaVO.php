<?php

namespace Src\VO;

use Src\_public\Util;
use Src\VO\LogErro;

class GarantiaVO extends LogErro
{

    private $id;
    private $nome;
    private $texto;

    public function setID($id)
    {

        $this->id = $id;
    }

    public function getID()
    {
        return $this->id;
    }

    public function setNome($nome)
    {

        $this->nome = Util::TratarDados($nome);
    }

    public function getNome()
    {
        return $this->nome;
    }
    public function setTexto($texto)
    {

        $this->texto = Util::TratarDados($texto);
    }

    public function getTexto()
    {
        return $this->texto;
    }
}
