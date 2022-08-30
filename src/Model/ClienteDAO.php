<?php

namespace Src\Model;

use Src\Model\Conexao;
use Src\VO\ClienteVO;
use Src\Model\SQL\Cliente;
use Src\_public\Util;


class ClienteDAO extends Conexao
{

    private $conexao;

    public function __construct()
    {
        $this->conexao = parent::retornaConexao();
    }

    public function CadastrarClienteDAO(ClienteVO $vo): int
    {
        $sql = $this->conexao->prepare(Cliente::InserirClienteSQL());
        $sql->bindValue(1, $vo->getNome());
        $sql->bindValue(2, $vo->getDtNasc());
        $sql->bindValue(3, $vo->getTelefone());
        $sql->bindValue(4, $vo->getEmail());
        $sql->bindValue(5, $vo->getCep());
        $sql->bindValue(6, $vo->getEndereco());
        $sql->bindValue(7, $vo->getNumero());
        $sql->bindValue(8, $vo->getBairro());
        $sql->bindValue(9, $vo->getCidade());
        $sql->bindValue(10, $vo->getEstado());
        $sql->bindValue(11, $vo->getDescricao());
        $sql->bindValue(12, Util::CodigoEmpresa());
        $sql->bindValue(13, $vo->getStatus());
        $sql->bindValue(14, Util::CodigoLogado());


        try {
            $sql->execute();
            return 1;
        } catch (\Exception $ex) {
            $vo->setmsg_erro($ex->getMessage());
            parent::GravarLogErro($vo);
            return -1;
        }
    }

    public function FiltrarClienteDAO($nome_filtro)
    {
        $sql = $this->conexao->prepare(Cliente::FiltrarClienteSQL($nome_filtro));
        $sql->bindValue(1, Util::CodigoEmpresa());
        if (!empty($nome_filtro)) {
            $sql->bindValue(2, "%" . $nome_filtro . "%");
        }
        $sql->execute();
        return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }


    public function RetornaClienteDAO()
    {
        $sql = $this->conexao->prepare(Cliente::RetornarClienteSQL());
        $sql->bindValue(1, Util::CodigoEmpresa());
        $sql->execute();
        return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function AlterarClienteDAO(ClienteVO $vo): int
    {
        $sql = $this->conexao->prepare(Cliente::AlterarClienteSQL());
        $sql->bindValue(1, $vo->getNome());
        $sql->bindValue(2, $vo->getDtNasc());
        $sql->bindValue(3, $vo->getTelefone());
        $sql->bindValue(4, $vo->getEmail());
        $sql->bindValue(5, $vo->getCep());
        $sql->bindValue(6, $vo->getEndereco());
        $sql->bindValue(7, $vo->getNumero());
        $sql->bindValue(8, $vo->getBairro());
        $sql->bindValue(9, $vo->getCidade());
        $sql->bindValue(10, $vo->getEstado());
        $sql->bindValue(11, $vo->getDescricao());
        $sql->bindValue(12, Util::CodigoEmpresa());
        $sql->bindValue(13, $vo->getStatus());
        $sql->bindValue(14, Util::CodigoLogado());
        $sql->bindValue(15, $vo->getID());
        try {
            $sql->execute();
            return 1;
        } catch (\Exception $ex) {
            $vo->setmsg_erro($ex->getMessage());
            parent::GravarLogErro($vo);
            return -2;
        }
    }

    public function ExcluirClienteDAO(ClienteVO $vo): int
    {
        $sql = $this->conexao->prepare(Cliente::ExcluirClienteSQL());
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
