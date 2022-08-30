<?php

namespace Src\Model;

use Src\Model\Conexao;
use Src\VO\ServicoVO;
use Src\Model\SQL\Servico;
use Src\_public\Util;

class ServicoDAO extends Conexao
{

    private $conexao;

    public function __construct()
    {
        $this->conexao = parent::retornaConexao();
    }

    public function CadastrarServico(ServicoVO $vo): int
    {
        $sql = $this->conexao->prepare(Servico::InserirServico());
        $sql->bindValue(1, $vo->getNome());
        $sql->bindValue(2, $vo->getValor());
        $sql->bindValue(3, $vo->getDescricao());
        $sql->bindValue(4, Util::CodigoEmpresa());
        $sql->bindValue(5, Util::CodigoLogado());

        try {
            $sql->execute();
            return 1;
        } catch (\Exception $ex) {

            $vo->setmsg_erro($ex->getMessage());
            parent::GravarLogErro($vo);
            return -1;
        }
    }

    public function RetornarServicoDAO()
    {
        $sql = $this->conexao->prepare(Servico::RetornarServico());
        $sql->execute();
        return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function AlterarServicoDAO(ServicoVO $vo): int
    {
        $sql = $this->conexao->prepare(Servico::AlterarServico());
        $sql->bindValue(1, $vo->getNome());
        $sql->bindValue(2, $vo->getValor());
        $sql->bindValue(3, $vo->getDescricao());
        $sql->bindValue(4, Util::CodigoEmpresa());
        $sql->bindValue(5, Util::CodigoLogado());
        $sql->bindValue(6, $vo->getID());
        try {
            $sql->execute();
            return 1;
        } catch (\Exception $ex) {
            $vo->setmsg_erro($ex->getMessage());
            parent::GravarLogErro($vo);
            return -2;
        }
    }

    public function FiltrarServicoDAO($nome_filtro)
    {
        $sql = $this->conexao->prepare(Servico::FiltrarServicoSQL($nome_filtro));
        $sql->bindValue(1, Util::CodigoEmpresa());
        if (!empty($nome_filtro)) {
            $sql->bindValue(2, "%" . $nome_filtro . "%");
            $sql->bindValue(3, "%" . $nome_filtro . "%");
            $sql->bindValue(4, "%" . $nome_filtro . "%");
        }
        $sql->execute();
        return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function ExcluirServicoDAO(ServicoVO $vo): int
    {
        $sql = $this->conexao->prepare(Servico::ExcluirServico());
        $sql->bindValue(1, $vo->getID());

        try {
            $sql->execute();
            return 1;
        } catch (\Exception $ex) {
            $vo->setmsg_erro($ex->getMessage());
            parent::GravarLogErro($vo);
            return -2;
        }
    }
}
