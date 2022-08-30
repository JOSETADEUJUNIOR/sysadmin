<?php

namespace Src\VO;


use Src\_public\Util;

class ChamadoVO
{
    private $id;
    private $data_abertura;
    private $descricao_problema;
    private $data_atendimento;
    private $data_encerramento;
    private $laudo_tecnico;
    private $funcionario_id;
    private $tecnico_atendimento;
    private $tecnico_encerramento;
    


    # Get Set id da locação
    public function setId($id)
    {

        $this->idid = $id;
    }

    public function getId()
    {

        return $this->id;
    }

    # Get Set id da locação
    public function setDataAbertura($data_abertura)
    {

        $this->data_abertura = $data_abertura;
    }

    public function getDataAbertura()
    {

        return $this->data_abertura;
    }


    # Get Set id da locação
    public function setDescrciaoProblema($descricao_problema)
    {

        $this->descricao_problema = $descricao_problema;
    }

    public function getDescrciaoProblema()
    {

        return $this->descricao_problema;
    }


    # Get Set id da locação
    public function setDataAtendimento($data_atendimento)
    {

        $this->data_atendimento = $data_atendimento;
    }

    public function getDataAtendimento()
    {

        return $this->data_atendimento;
    }


    # Get Set id da locação
    public function setDataEnceramento($data_encerramento)
    {

        $this->data_encerramento = $data_encerramento;
    }

    public function getDataEncerramento()
    {

        return $this->data_encerramento;
    }


    # Get Set id da locação
    public function setLaudoTecnico($laudo_tecnico)
    {

        $this->laudo_tecnico = $laudo_tecnico;
    }

    public function getLaudoTecnico()
    {

        return $this->laudo_tecnico;
    }
    
    # Get Set id da locação
    public function setFuncionarioID($funcionario_id)
    {

        $this->funcionario_id = $funcionario_id;
    }

    public function getFuncionarioID()
    {

        return $this->funcionario_id;
    }

    # Get Set id da locação
    public function setTecnicoAtendimento($tecnico_atendomento)
    {

        $this->tecnico_atendomento = $tecnico_atendomento;
    }

    public function getTecnicoAtendimento()
    {

        return $this->tecnico_atendomento;
    }

    # Get Set id da locação
    public function setTecnicoEncerramento($tecnico_encerramento)
    {

        $this->tecnico_encerramento = $tecnico_encerramento;
    }

    public function getTecnicoEncerramento()
    {

        return $this->tecnico_encerramento;
    }

}
