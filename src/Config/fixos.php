<?php

#FUNÇÕES 

const CADASTRO_TIPO_EQUIPAMENTO = "CadastrarTipoEquipamento";
const ALTERAR_TIPO_EQUIPAMENTO = "AlterarTipoEquipamentoController";
const EXCLUIR_TIPO_EQUIPAMENTO = "ExcluirTipoEquipamento";
const CADASTRO_ALOCAR = 'AlocarEquipamentoController';

const CADASTRO_SETOR = 'CadastrarSetor';
const ALTERA_SETOR = 'AlterarSetor';
const EXCLUI_SETOR = 'ExcluirSetorController';

const CADASTRO_PRODUTO = 'CadastrarProdutoController';
const ALTERA_PRODUTO = 'AlterarProdutoController';
const EXCLUI_PRODUTO = 'ExcluirProdutoController';

const CADASTRO_SERVICO = 'CadastrarServicoController';
const ALTERA_SERVICO = 'AlterarServicoController';
const EXCLUI_SERVICO = 'ExcluirServicoController';

const CADASTRO_LANCAMENTO = 'InserirLancamentoController';
const EXCLUI_LANCAMENTO = 'ExcluirLancamentoController';


const CADASTRO_VENDA = 'CadastrarVendaController';
const FATURA_VENDA = 'FaturarVendaController';
const EXCLUI_VENDA = 'ExcluirVendaController';
const EXCLUI_ITEM_VENDA = 'ExcluirItemVendaController';



const CADASTRO_OS = 'CadastrarOsController';
const ALTERA_OS = 'AlterarOsController';
const FATURA_OS = 'FaturarOsController';
const EXCLUI_OS = 'ExcluirOsController';
const EXCLUI_ITEM_OS = 'ExcluirItemOSController';
const CADASTRO_ANX_OS = 'InserirAnxOrdemController';
const EXCLUIR_ANX = 'ExcluirAnxOSController';


const CADASTRO_CIDADE = 'CadastrarCidadeController';
const ALTERA_CIDADE = 'AlterarCidadeController';
const EXCLUI_CIDADE = 'ExcluirCidadeController';

const CADASTRO_EQUIPAMENTO = 'CadastrarEquipamentoController';
const ALTERA_EQUIPAMENTO = 'AlterarEquipamentoController';
const EXCLUI_EQUIPAMENTO = 'ExcluirEquipamentoController';

const CADASTRO_CLIENTE = 'CadastrarClienteController';
const ALTERA_CLIENTE = 'AlterarClienteController';
const EXCLUI_CLIENTE = 'ExcluirClienteController';

# DADOS COMBO FILTRO
const FILTRO_TIPO = 1;
const FILTRO_MODELO = 2;
const FILTRO_IDENTIFICACAO = 3;
const FILTRO_DESCRICAO = 4;

const FILTRO_ORCAMENTO = "O";
const FILTRO_ABERTA = "A";
const FILTRO_ANDAMENTO = "EA";
const FILTRO_FINALIZADA = "F";
const FILTRO_CANCELADA = "C";

# Tipo de lançamento
const LANCAMENTO_RECEITA = 1;
const LANCAMENTO_DESPESA = 2;


const SITUACAO_ALOCADO = 1;
const SITUACAO_REMOVIDO = 2;
const SITUACAO_MANUTENCAO = 3;

const CADASTRO_USUARIO = 'CadastrarUsuarioController';

const CADASTRO_GARANTIA = 'CadastrarGarantiaController';

const ALTERA_EMPRESA = 'AlterarEmpresaController';

const ALTERA_USUARIO = 'AlterarUsuarioController';


const CADASTRO_MODELO = 'CadastrarModelo';
const EXCLUIR_MODELO = 'ExcluirModeloController';
const ALTERAR_MODELO = 'AlterarModeloController';

define ('PATH_URL', $_SERVER["DOCUMENT_ROOT"] . '/sysadmin/src/');
