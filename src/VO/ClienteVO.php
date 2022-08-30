<?php

namespace Src\VO;
use Src\_public\Util;
use Src\VO\LogErro;

class CLienteVO extends LogErro{

private $CliID;
private $CliNome;
private $CliDtNasc;
private $CliTelefone;
private $CliEmail;
private $CliCep;
private $CliEndereco;
private $CliNumero;
private $CliBairro;
private $CliCidade;
private $CliEstado;
private $CliDescricao;
private $CliEmpID;
private $CliStatus;



public function setID($id){

    $this->CliID = $id;
}

public function getID(){
    return $this->CliID;
}

public function setNome($nome){

    $this->CliNome = Util::TratarDados($nome);
}

public function getNome(){
    return $this->CliNome;
}
public function setDtNasc($dtnasc){

    $this->CliDtNasc = Util::TratarDados($dtnasc);
}

public function getDtNasc(){
    return $this->CliDtNasc;
}
public function setTelefone($tel){

    $this->CliTelefone = Util::TratarDados($tel);
}

public function getTelefone(){
    return $this->CliTelefone;
}

public function setEmail($email){

    $this->CliEmail = Util::TratarDados($email);
}

public function getEmail(){
    return $this->CliEmail;
}

public function setCep($cep){

    $this->CliCep = Util::TratarDados($cep);
}

public function getCep(){
    return $this->CliCep;
}
public function setEndereco($end){

    $this->CliEndereco = Util::TratarDados($end);
}

public function getEndereco(){
    return $this->CliEndereco;
}
public function setNumero($num){

    $this->CliNumero = Util::TratarDados($num);
}

public function getNumero(){
    return $this->CliNumero;
}
public function setBairro($bairro){

    $this->CliBairro = Util::TratarDados($bairro);
}

public function getBairro(){
    return $this->CliBairro;
}

public function setCidade($cidade){

    $this->CliCidade = Util::TratarDados($cidade);
}

public function getCidade(){
    return $this->CliCidade;
}

public function setEstado($estado){

    $this->CliEstado = Util::TratarDados($estado);
}

public function getEstado(){
    return $this->CliEstado;
}

public function setDescricao($desc){

    $this->CliDescricao = Util::TratarDados($desc);
}

public function getDescricao(){
    return $this->CliDescricao;
}

public function setEmpID($empID){

    $this->CliEmpID = Util::TratarDados($empID);
}

public function getEmpID(){
    return $this->CliEmpID;
}

public function setStatus($status){

    $this->CliStatus = Util::TratarDados($status);
}

public function getStatus(){
    return $this->CliStatus;
}








}