<?php

namespace Src\VO;

use Src\_public\Util;
use Src\VO\EmpresaVO;

class UsuarioVO extends EmpresaVO
{

    private $idUser;
    private $tipo;
    private $nome;
    private $login;
    private $senha;
    private $status;
    private $telefone;
    private $UserLogo;
    private $UserLogoPath;


    public function setId($id)
    {
        $this->idUser = $id;
    }

    public function getId()
    {
        return $this->idUser;
    }
    # get set Tipo
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }

    public function getTipo()
    {
        return $this->tipo;
    }
    # get set Nome
    public function setNome($nome)
    {
        $this->nome = Util::TratarDados($nome);
    }

    public function getNome()
    {
        return $this->nome;
    }
    # get set Login
    public function setLogin($login)
    {
        $this->login = Util::TratarDados($login);
    }

    public function getLogin()
    {
        return $this->login;
    }
    # get set Senha
    public function setSenha($senha)
    {
        $this->senha = Util::TratarDados($senha);
    }

    public function getSenha()
    {
        return $this->senha;
    }
    # get set Status
    public function setStatus($status)
    {
        $this->status = Util::TratarDados($status);
    }

    public function getStatus()
    {
        return $this->status;
    }
    # get set Telefone
    public function setTelefone($telefone)
    {
        $this->telefone = Util::TratarDados($telefone);
    }

    public function getTelefone()
    {
        return $this->telefone;
    }
    public function setUserLogo($UserLogo){
        $this->UserLogo = $UserLogo;
    }
    public function getUserLogo(){
        return $this->UserLogo;
    }
    public function setLogoPath($UserLogoPath){
        $this->UserLogoPath = $UserLogoPath;
    }
    public function getLogoPath(){
        return $this->UserLogoPath;
    }
}
