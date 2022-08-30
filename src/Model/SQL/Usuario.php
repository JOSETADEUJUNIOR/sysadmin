<?php

namespace Src\Model\SQL;

class Usuario
{


    public static function ValidarEmail()
    {
        $sql = 'SELECT login from tb_usuario where login = ? ';
        return $sql;
    }

    public static function InserirEmpresa()
    {
        $sql = 'INSERT INTO tb_empresa (EmpDtCadastro) VALUES (?)';
        return $sql;
    }
    public static function InserirUsuario()
    {
        $sql = 'INSERT INTO tb_usuario (tipo,nome,login,senha,status,telefone,UserEmpID) VALUES (?,?,?,?,?,?,?)';
        return $sql;
    }

    public static function ValidarLogin()
    {
        $sql = 'SELECT id, nome, UserEmpID
                    FROM tb_usuario WHERE login = ? and senha = ?';
        return $sql;
    }
    public static function AlterarEmpresaSQL()
    {
        $sql = 'UPDATE tb_empresa set EmpNome = ?, EmpCNPJ = ?, EmpEnd = ?,
                                      EmpCep = ?, EmpNumero = ?, EmpCidade = ?, EmpLogo = ?, EmpLogoPath = ? WHERE EmpID = ? ';
        return $sql;
    }

    public static function AlterarEmpresaSLSQL()
    {
        $sql = 'UPDATE tb_empresa set EmpNome = ?, EmpCNPJ = ?, EmpEnd = ?,
                                      EmpCep = ?, EmpNumero = ?, EmpCidade = ? WHERE EmpID = ? ';
        return $sql;
    }

    public static function AlterarUsuarioSLSQL()
    {
        $sql = 'UPDATE tb_usuario set nome = ?, login = ?, 
                                      senha = ?, telefone = ? WHERE id = ?';
        return $sql;
    }

    public static function AlterarUsuarioSQL()
    {
        $sql = 'UPDATE tb_usuario set nome = ?, login = ?, 
                                      senha = ?, telefone = ?, USerLogo = ?, UserLogoPath = ? WHERE id = ?';
        return $sql;
    }



    public static function RetornarDadosCadastrais()
    {
        $sql =  'SELECT EmpID, id, EmpNome, EmpEnd, EmpCNPJ, EmpEnd, EmpCep, EmpNumero, EmpCidade, EmpStatus, EmpLogo, 
	                    EmpLogoPath,
                        case tipo
                            When 1 Then \'Administrador\'
                            When 2 Then \'funcionario\'
                            When 3 Then \'Tecnico\'
                            End as tipo,
                        nome, login, senha, telefone
                 FROM tb_empresa
		         INNER JOIN tb_usuario on
			            tb_empresa.EmpID = tb_usuario.UserEmpID WHERE id = ?';

        return $sql;
    }
    public static function RetornarDadosUsuarioSQL()
    {
        $sql =  'SELECT id,  
                        case tipo
                            When 1 Then \'Administrador\'
                            When 2 Then \'funcionario\'
                            When 3 Then \'Tecnico\'
                            End as tipo,
                            nome, login, senha, status, telefone, UserLogo, UserLogoPath
                 FROM tb_usuario
		            WHERE id = ?';

        return $sql;
    }
}
