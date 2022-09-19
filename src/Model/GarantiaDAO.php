<?php

namespace Src\Model;

use Src\Model\Conexao;
use Src\VO\GarantiaVO;
use Src\Model\SQL\Garantia;
use Src\_public\Util;

class GarantiaDAO extends Conexao
{

    private $conexao;

    public function __construct()
    {
        $this->conexao = parent::retornaConexao();
    }

    public function CadastrarGarantiaDAO(GarantiaVO $vo): int
    {
        if ($vo->getID() == 0) {
            $sql = $this->conexao->prepare(Garantia::InserirGarantia());
            $sql->bindValue(1, $vo->getNome());
            $sql->bindValue(2, $vo->getTexto());
            $sql->bindValue(3, Util::CodigoEmpresa());
        } else {
            $sql = $this->conexao->prepare(Garantia::AlterarGarantia());
            $sql->bindValue(1, $vo->getNome());
            $sql->bindValue(2, $vo->getTexto());
            $sql->bindValue(3, Util::CodigoEmpresa());
            $sql->bindValue(4, $vo->getID());
        }


        try {
            $sql->execute();
            return 1;
        } catch (\Exception $ex) {

            $vo->setmsg_erro($ex->getMessage());
            parent::GravarLogErro($vo);
            return -1;
        }
    }

    public function RetornarGarantiaDAO()
    {
        $sql = $this->conexao->prepare(Garantia::RetornarGarantia());
        $sql->bindValue(1, Util::CodigoEmpresa());
        $sql->execute();
        return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }
}
