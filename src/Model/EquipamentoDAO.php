<?php

namespace Src\Model;

use Src\Model\Conexao;
use Src\VO\EquipamentoVO;
use Src\Model\SQL\EquipamentoSQL;



class EquipamentoDAO extends Conexao
{

    private $conexao;

    public function __construct()
    {
        $this->conexao = parent::retornaConexao();
    }
    public function CadastrarEquipamentoDAO(EquipamentoVO $vo): int
    {
        $sql = $this->conexao->prepare(EquipamentoSQL::InserirEquipamentoSQL());
        $sql->bindValue(1, $vo->getIdentificacao());
        $sql->bindValue(2, $vo->getDescricao());
        $sql->bindValue(3, $vo->getTipoEquipID());
        $sql->bindValue(4, $vo->getModeloEquipID());

        try {
            $sql->execute();
            return 1;
        } catch (\Exception $ex) {
            $vo->setmsg_erro($ex->getMessage());
            parent::GravarLogErro($vo);
            return -1;
        }
    }

    public function ConsultarEquipamentoDAO($BuscarTipo, $filtro_palavra): array
    {
        
            $sql = $this->conexao->prepare(EquipamentoSQL::ConsultarEquipamentoBuscaSQL($BuscarTipo, $filtro_palavra));
            $sql->bindValue(1, "%" . $filtro_palavra . "%");
            $sql->execute();
            return $sql->fetchAll(\PDO::FETCH_ASSOC); 
        
    }

    public function DetalharEquipamentoDAO($id)
    {
        
            $sql = $this->conexao->prepare(EquipamentoSQL::DetalharEquipamentoSQL());
            $sql->bindValue(1, $id);
            $sql->execute();
            return $sql->fetchAll(\PDO::FETCH_ASSOC); 
        
    }
}
