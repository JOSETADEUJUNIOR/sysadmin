<?php

namespace Src\_public;

class Util
{
    public static function TratarDados($palavra)
    {

        return strip_tags(trim($palavra));
    }


    private static function SetarFusoHorario()
    {
        date_default_timezone_set('America/Sao_Paulo');

    }

    public static function HoraAtual(){
        self::SetarFusoHorario();
        return date('H:i:s');
    }

    public static function debug($array)
    {
        echo '<pre>';
        print_r($array);
        echo '</pre>';
    }

    public static function chamarPagina($pag){

        header("location: $pag");
        exit;
    }
    public static function DataAtual(){
        self::SetarFusoHorario();
        return date('d/m/Y');
    }

    public static function CodigoEmpresa(){
        self::IniciarSessao();
        return $_SESSION['empID'];
    }

    public static function CodigoLogado(){
       
        self::IniciarSessao();
        return $_SESSION['cod'];
    }


    public static function NomeLogado()
    {
        self::IniciarSessao();
        return $_SESSION['nome'];
    }

     //Remove pontuação
     public static function remove_especial_char($string){
      $especiais= Array(".",",",";","!","@","#","%","¨","*","(",")","+","-","=", "§","$","|","\\",":","/","<",">","?","{","}","[","]","&","'",'"',"´","`","?",'“','”','$',"'","'");
      $string = str_replace($especiais,"",strip_tags(trim($string)));
      return $string;
    }

    public static function IniciarSessao()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
    }

    public static function CriarSessao($nome, $id, $empID)
    {
        self::IniciarSessao();
        $_SESSION['cod'] = $id;
        $_SESSION['nome'] = $nome;
        $_SESSION['empID'] = $empID;
    }

    private static function IrTelaLogar()
    {
        header('location: ../../View/admin/login.php');
        exit;
    }

    public static function Deslogar()
    {
        self::IniciarSessao();
        unset($_SESSION['cod']);
        unset($_SESSION['nome']);
        unset($_SESSION['empID']);
        self::IrTelaLogar();
    }

    public static function VerLogado()
    {
        self::IniciarSessao();
        if (!isset($_SESSION['cod']) || $_SESSION['cod'] == '') {
            self::IrTelaLogar();
        }
    }

    
     public static function ExibirDataBr($data){

        if ($data == "") {
            return "";
        }
        else{
        $data_array = explode('-', $data);
        $data_br = $data_array[2]. '/' . $data_array[1] . '/' . $data_array[0];
        
        return $data_br;
    }
    }

}
