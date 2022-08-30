<?php

namespace Src\VO;


use Src\_public\Util;

class FuncionarioVO
{
    private $id;
    private $tipo;
    private $setor;
    private $nome;
    private $sobrenome;
    private $email;
    private $telefone;
    private $endereco;
    


    # Get Set ID
    public function setId($id)
    {

        $this->idid = $id;
    }

    public function getId()
    {

        return $this->id;
    }

    # Get Set Identificacao
    public function setTipo($tipo)
    {

        $this->tipo = Util::TratarDados($tipo);
    }

    public function getTipo()
    {

        return $this->tipo;
    }


    # Get Set da descricao
    public function setSetor($setor)
    {

        $this->setor = Util::TratarDados($setor);
    }

    public function getSetor()
    {

        return $this->setor;
    }


    # Get Set ID do Tipo do Equip
    public function setNome($nome)
    {

        $this->nome = $nome;
    }

    public function getNome()
    {

        return $this->nome;
    }


    # Get Set modelo equip ID
    public function setSobreNome($sobrenome)
    {

        $this->sobrenome = $sobrenome;
    }

    public function getSobreNome()
    {

        return $this->sobrenome;
    }

    public function setTelefone($telefone)
    {

        $this->telefone = $telefone;
    }

    public function getTelefone()
    {

        return $this->telefone;
    }
    public function setEmail($email)
    {

        $this->email = $email;
    }
    public function getEmail()
    {

        return $this->email;
    }
    public function setEndereco($endereco)
    {

        $this->endereco = $endereco;
    }
    public function getEndereco()
    {

        return $this->endereco;
    }


}
