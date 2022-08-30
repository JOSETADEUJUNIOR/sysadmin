<?php

namespace Src\Model;
use Src\Model\Conexao;
use Src\VO\UsuarioVO;
use Src\Model\SQL\Usuario;
use Src\_public\Util;


class UsuarioDAO extends Conexao{

    private $conexao;
    
    public function __construct()
    {
        $this->conexao = parent::retornaConexao();

    }

    public function ValidarEmailDAO(UsuarioVO $vo):bool
    {
        $sql = $this->conexao->prepare(Usuario::ValidarEmail());
        $sql->bindValue(1, $vo->getLogin());
        $sql->execute();

        $login_user = $sql->fetchAll(\PDO::FETCH_ASSOC);

        if (count($login_user) > 0) {
            return true;
        }else{
           return false;
        }
        
    }

    public function ValidarLoginDAO(UsuarioVO $vo)
    {
        $sql = $this->conexao->prepare(Usuario::ValidarLogin());
        $sql->bindValue(1, $vo->getLogin());
        $sql->bindValue(2, $vo->getSenha());
        $sql->execute();

       return $sql->fetchAll(\PDO::FETCH_ASSOC);

       
    }

    public function RetornaDadosCadastraisDAO(): array
    {
        $sql = $this->conexao->prepare(Usuario::RetornarDadosCadastrais());
        $sql->bindValue(1, Util::CodigoLogado());
        $sql->execute();
        return $sql->fetchAll(\PDO::FETCH_ASSOC);

    }
    public function RetornaDadosUsuarioDAO(): array
    {
        $sql = $this->conexao->prepare(Usuario::RetornarDadosUsuarioSQL());
        $sql->bindValue(1, Util::CodigoLogado());
        $sql->execute();
        return $sql->fetchAll(\PDO::FETCH_ASSOC);

    }
    public function AlterarEmpresaDAO(UsuarioVO $vo):int
    {
        if ($vo->getEmpLogo()=='') {
        
        $sql = $this->conexao->prepare(Usuario::AlterarEmpresaSLSQL());
        $sql->bindValue(1, $vo->getNomeEmpresa());
        $sql->bindValue(2, $vo->getCNPJ());
        $sql->bindValue(3, $vo->getEndereco());
        $sql->bindValue(4, $vo->getCep());
        $sql->bindValue(5, $vo->getNumero());
        $sql->bindValue(6, $vo->getCidade());
        $sql->bindValue(7, Util::CodigoEmpresa());
        }else {
            
        
        $sql = $this->conexao->prepare(Usuario::AlterarEmpresaSQL());
        $sql->bindValue(1, $vo->getNomeEmpresa());
        $sql->bindValue(2, $vo->getCNPJ());
        $sql->bindValue(3, $vo->getEndereco());
        $sql->bindValue(4, $vo->getCep());
        $sql->bindValue(5, $vo->getNumero());
        $sql->bindValue(6, $vo->getCidade());
        $sql->bindValue(7, $vo->getEmpLogo());
        $sql->bindValue(8, $vo->getLogoPath());
        $sql->bindValue(9, Util::CodigoEmpresa());
    }
        try {
            $sql->execute();
            return 1;
        } catch (\Exception $ex) {
            $vo->setmsg_erro($ex->getMessage());
            parent::GravarLogErro($vo);
            return -2;
        }


    }

    public function AlterarUsuarioDAO(UsuarioVO $vo):int
    {
        if ($vo->getUserLogo()==''){

            $sql = $this->conexao->prepare(Usuario::AlterarUsuarioSLSQL());
            $sql->bindValue(1, $vo->getNome());
            $sql->bindValue(2, $vo->getLogin());
            $sql->bindValue(3, $vo->getSenha());
            $sql->bindValue(4, $vo->getTelefone());
            $sql->bindValue(5, Util::CodigoLogado());
        }else{

            $sql = $this->conexao->prepare(Usuario::AlterarUsuarioSQL());
            $sql->bindValue(1, $vo->getNome());
            $sql->bindValue(2, $vo->getLogin());
            $sql->bindValue(3, $vo->getSenha());
            $sql->bindValue(4, $vo->getTelefone());
            $sql->bindValue(5, $vo->getUserLogo());
            $sql->bindValue(6, $vo->getLogoPath());
            $sql->bindValue(7, Util::CodigoLogado());

        }
            try{
                $sql->execute();
                return 1;
            }catch (\Exception $ex){
                $vo->setmsg_erro($ex->getMessage());
                parent::GravarLogErro($vo);
                return -2;
            }
        }   
            
    
    public function CadastrarUsuarioDAO(UsuarioVO $vo):int
    {
        $sql = $this->conexao->prepare(Usuario::InserirEmpresa());
        $sql->bindValue(1, date("Y-m-d"));
        $sql->execute();

        $idEmp = $this->conexao->lastInsertId();

        $sql = $this->conexao->prepare(Usuario::InserirUsuario());
        $sql->bindValue(1, $vo->getTipo());
        $sql->bindValue(2, $vo->getNome());
        $sql->bindValue(3, $vo->getLogin());
        $sql->bindValue(4, $vo->getSenha());
        $sql->bindValue(5, $vo->getStatus());
        $sql->bindValue(6, $vo->getTelefone());
        $sql->bindValue(7, $idEmp);
        $sql->execute();
        
        try {
            return 1;
        } catch (\Exception $ex) {
            $vo->setmsg_erro($ex->getMessage());
            parent::GravarLogErro($vo);
            return -2;
        }

    }

    

}