<?php
include_once '_include_autoload.php';
use Src\_public\Util;

Util::VerLogado();

use Src\Controller\ClienteController;
use Src\Controller\FinanceiroController;
use Src\VO\LancamentoVO;

use Src\Controller\UsuarioController;
$ctrlEmpresa = new UsuarioController();
$empresa = $ctrlEmpresa->RetornarDadosCadastraisController();

$ctrlCliente = new ClienteController();
$cliente = $ctrlCliente->RetornarClienteController();

$ctrl = new FinanceiroController();
$TotalLancamentos = $ctrl->RetornaTodosLancamentoController();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

if (isset($_POST['btn_inserir'])) {
    $vo = new LancamentoVO;
    $vo->setID($_POST['ID']);
    $vo->setDescricao($_POST['descricao']);
    $vo->setClienteID($_POST['cliente']);
    $vo->setValor($_POST['valor']);
    $vo->setDtVencimento($_POST['dtVencimento']);
    $vo->setDtPagamento($_POST['dtPgto']);
    $vo->setFormPgto($_POST['formPgto']);
    $vo->setTipo($_POST['tipo']);
    $ret = $ctrl->InserirLancamentoController($vo);
    if ($_POST['btn_inserir'] == 'ajx') {
        echo $ret;
    }
}

else if (isset($_POST['btn_alterar'])) {
    $vo = new LancamentoVO;
    $vo->setID($_POST['ID']);
    $vo->setDescricao($_POST['descricao']);
    $vo->setClienteID($_POST['cliente']);
    $vo->setValor($_POST['valor']);
    $vo->setDesconto($_POST['desconto']);
    $vo->setDtVencimento($_POST['dtVencimento']);
    $vo->setDtPagamento($_POST['dtPgto']);
    $vo->setFormPgto($_POST['formPgto']);
    $vo->setTipo($_POST['tipo']);
    $ret = $ctrl->AlterarReceitaLancamentoController($vo);
    if ($_POST['btn_alterar'] == 'ajx') {
        echo $ret;
    }
}
else if (isset($_POST['btn_alterar_desp'])) {
    $vo = new LancamentoVO;
    $vo->setID($_POST['ID']);
    $vo->setDescricao($_POST['descricao']);
    $vo->setClienteID($_POST['cliente']);
    $vo->setValor($_POST['valor']);
    $vo->setDtVencimento($_POST['dtVencimento']);
    $vo->setDtPagamento($_POST['dtPgto']);
    $vo->setFormPgto($_POST['formPgto']);
    $vo->setTipo($_POST['tipo']);
    $ret = $ctrl->AlterarDespesaLancamentoController($vo);
    if ($_POST['btn_alterar_desp'] == 'ajx') {
        echo $ret;
    }
}
else if (isset($_POST['btnExcluir'])) {
    $vo = new LancamentoVO;
    $vo->setID($_POST['ExcluirID']);
    $ret = $ctrl->ExcluirLancamentoController($vo);

    if ($_POST['btnExcluir'] == 'ajx') {
        echo $ret;
    } else {
        $TotalLancamentos = $ctrl->RetornaTodosLancamentoController();

    }
}





else if (isset($_POST['btn_consultar']) && $_POST['btn_consultar'] == 'ajx') {
    $tipo = $_POST['tipo'];
    $dtInicio = $_POST['dtInicio'];
    $dtFinal = $_POST['dtFinal'];
    $lancamentos = $ctrl->RetornaLancamentoController($tipo, $dtInicio, $dtFinal);

    if ($lancamentos) { ?>
<div class="card-body" id="tabela_result_financeiro">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Lançamentos realizados</h3>


                                </div>
                                <!-- /.card-header -->
                                <div class="card-body table-responsive p-0">
                
<table class="table table-hover ">
        <thead>
            <tr>
                <th>Cliente</th>
                <th>Descrição</th>
                <th>Data Vencimento</th>
                <th>Data Pagamento/Recebimento</th>
                <th>Tipo</th>
                <th>Valor</th>
                <th>Ação</th>

            </tr>
        </thead>
        <tbody>
            <?php foreach ($lancamentos as $lanc) {
               if ($lanc['Tipo']==1) {
                   $totReceita = $totReceita + $lanc['LancValor'];  
                }else {
                   $totDespesa = $totDespesa + $lanc['LancValor'];  
                }
                $Total = $totReceita - $totDespesa;
            ?>
            <tr>
                    
                    <td><?= $lanc['CliNome'] ?></td>
                    <td><?= $lanc['LancDescricao'] ?></td>
                    <td><?= Util::ExibirDataBr($lanc['LancDtVencimento']) ?></td>
                    <td><?= Util::ExibirDataBr($lanc['LancDtPagamento']) ?></td>
                    <td><?= ($lanc['Tipo']==1?'<span class="btn btn-success btn-xs">Receita</span>':'<span class="btn btn-danger btn-xs">Despesa</span>') ?></td>
                    <td><?= $lanc['LancValor'] ?></td>
                    <td>
                    <?php if ($lanc['Tipo']==1) {?>
                        <a href="#" onclick="ModalFatura('<?= $lanc['LancID'] ?>','<?= $lanc['LancDescricao'] ?>','<?= $lanc['LancClienteID'] ?>','<?= $lanc['LancValor'] ?>','<?= $lanc['LancDtVencimento'] ?>','<?= $lanc['LancDtPgto'] ?>')" data-toggle="modal" data-target="#Alterafatura"><i class="fas fa-edit"></i></a>
                        <?php } else if($lanc['Tipo']==2){ ?>
                            
                            <a href="#" onclick="ModalDespesa('<?= $lanc['LancID'] ?>','<?= $lanc['LancDescricao'] ?>','<?= $lanc['LancClienteID'] ?>','<?= $lanc['LancValor'] ?>','<?= $lanc['LancDtVencimento'] ?>','<?= $lanc['LancDtPgto'] ?>')" data-toggle="modal" data-target="#alterar_despesa"><i class="fas fa-edit"></i></a>

                            <?php }?>       
                        
                            <a href="#" onclick="ExcluirModal('<?= $lanc['LancID'] ?>', '<?= $lanc['CliNome'] ?>')" data-toggle="modal" data-target="#modalExcluir"><i style="color:red" class="fas fa-trash-alt"></i></a>
                    </td>
                </tr>
            <?php } ?>

        </tbody>
        <tfoot>
    	<tr>
    		<td colspan="5" style="text-align: right; color: green"> <strong>Total Receitas:</strong></td>
    		<td colspan="2" style="text-align: left; color: green"><strong>R$ <?= Util::FormatarValor($totReceita)?></strong></td>
    	</tr>
    	<tr>
    		<td colspan="5" style="text-align: right; color: red"> <strong>Total Despesas:</strong></td>
    		<td colspan="2" style="text-align: left; color: red"><strong>R$ <?=  Util::FormatarValor($totDespesa)?></strong></td>
    	</tr>
    	<tr>
    		<td colspan="5" style="text-align: right"> <strong>Saldo:</strong></td>
    		<td colspan="2" style="text-align: left;"><strong>R$ <?= Util::FormatarValor($Total)?></strong></td>
    	</tr>
    </tfoot>
    </table>
                        </div>
                        </div>
                        </div>
                        </div>
                        </div>    
<?php } else {
        echo '<h4><center>Nenhum registro encontrado!</center><h4>';
    }
} ?>