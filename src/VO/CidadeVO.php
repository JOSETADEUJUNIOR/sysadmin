<?php

namespace Src\VO;

Use Src\_public\Util;

class CidadeVO extends LogErro{

private $id;
private $nome_cidade;
private $estado_id;

public function setID($id){

    $this->id = $id;
}

public function getID(){
    return $this->id;
}

public function setNomeCidade($nome_cidade){

    $this->nome_cidade = $nome_cidade;
}

public function getNomeCidade(){
    return $this->nome_cidade;
}

public function setEstadoID($estado_id){

    $this->estado_id = $estado_id;
}

public function getEstadoID(){
    return $this->estado_id;
}


}