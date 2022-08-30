<?php

namespace Src\Model;
use Src\Model\Conexao;
use Src\VO\CidadeVO;
use Src\Model\SQL\Cidade;

class CidadeDAO extends Conexao{

    private $conexao;

    public function __construct()
    {
        $this->conexao = parent::retornaConexao();
    }

    public function CadastrarCidadeDAO(CidadeVO $vo): int
    {
        $sql = $this->conexao->prepare(Cidade::InserirCidade());
        $sql->bindValue(1, $vo->getNomeCidade());
        $sql->bindValue(2, $vo->getEstadoID());

        try{

            $sql->execute();
            return 1;
        } catch (\Exception $ex){
            $vo->setmsg_erro($ex->getMessage());
            parent::GravarLogErro($vo);
            return -1;
        }
    }

    public function RetornarCidadeDAO()
    {
        $sql = $this->conexao->prepare(Cidade::RetornarCidade());
        $sql->execute();
        return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function AlterarCidadeDAO(CidadeVO $vo): int
    {
        $sql = $this->conexao->prepare(Cidade::AlterarCidade());
        $sql->bindValue(1, $vo->getNomeCidade());
        $sql->bindValue(2, $vo->getEstadoID());

        try {
            return 1;
        } catch (\Exception $ex) {
            $vo->setmsg_erro($ex->getMessage());
            parent::GravarLogErro($vo);
            return -2;
        }
        
    }

    public function ExcluirCidadeDAO(CidadeVO $vo): int
    {
        $sql = $this->conexao->prepare(Cidade::ExcluirCidade());
        $sql->bindValue(1, $vo->getID());

        try {
            return 1;
        } catch (\Exception $ex) {
            $vo->setmsg_erro($ex->getMessage());
            parent::GravarLogErro($vo);
            return -2;
        }

    }
    


}