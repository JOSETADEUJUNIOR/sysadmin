<?php

namespace Src\VO;

Use Src\_public\Util;

class EstadoVO{

private $id;
private $nome_estado;
private $sigla_estado;

public function setID($id){

    $this->id = $id;
}

public function getID(){
    return $this->id;
}

public function setNomeEstado($nome_estado){

    $this->nome_estado = Util::TratarDados($nome_estado);
}

public function getNomeEstado(){
    return $this->nome_estado;
}

public function setSiglaEstado($sigla_estado){

    $this->sigla_estado = $sigla_estado;
}

public function getSiglaEstado(){
    return $this->sigla_estado;
}


}