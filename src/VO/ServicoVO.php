<?php

namespace Src\VO;
use Src\_public\Util;
use Src\VO\LogErro;

class ServicoVO extends LogErro{

private $Servid;
private $ServNome;
private $ServValor;
private $ServDescricao;

public function setID($p){

    $this->Servid = $p;
}

public function getID(){
    return $this->Servid;
}

public function setNome($p){

    $this->ServNome = Util::TratarDados($p);
}

public function getNome(){
    return $this->ServNome;
}

public function setValor($p){

    $this->ServValor = Util::TratarDados($p);
}

public function getValor(){
    return $this->ServValor;
}

public function setDescricao($p){

    $this->ServDescricao = Util::TratarDados($p);
}

public function getDescricao(){
    return $this->ServDescricao;
}


}