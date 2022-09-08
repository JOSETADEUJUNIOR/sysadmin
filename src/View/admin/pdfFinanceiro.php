<?php require_once dirname(__DIR__, 2) . '/Resource/dataview/financeiro_dataview.php';

use Src\_public\Util;


ob_start();
?>
<style>
  table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
  }

  td,
  th {
    border: 1px solid black;
    text-align: left;
    padding: 8px;
  }

  tr:nth-child(even) {
    background-color: #dddddd;
  }
</style>


<table style="width:100%">
  <tr>
    <th><img src="../../Resource/dataview/<?= $empresa[0]['EmpLogoPath'] ?>" height="100px" width="150px" alt="Photo 2" class="img-fluid"></th>
    <th colspan="7">
      <p><?= $empresa[0]['EmpNome'] ?></p>
      <p><?= $empresa[0]['EmpCNPJ'] ?></p>
      <p><?= $empresa[0]['EmpEnd'] ?></p>
    </th>
  </tr>
  <tr>
    <td align="center" colspan="8"><strong>Relação de Lançamentos</strong></td>
  </tr>
  <tr>
    <td colspan="1"><strong>Cliente</strong></td>
    <td colspan="4"><strong>Descricao</strong></td>
    <td colspan="1"><strong>Data Venc.</strong></td>
    <td colspan="1"><strong>Tipo</strong></td>
    <td colspan="1"><strong>Valor</strong></td>

  </tr>
  <?php $TotalLancamentosZ=0; $TotReceita=0;$TotDespesa=0; for ($i = 0; $i < count($TotalLancamentos); $i++){ ?>
    <?php

    $TotalLancamentosZ++;
    if ($TotalLancamentos[$i]['Tipo']==1) {
      $TotReceita = $TotReceita + $TotalLancamentos[$i]['LancValor']; 
    }else if ($TotalLancamentos[$i]['Tipo']==2) {
      $TotDespesa = $TotDespesa + $TotalLancamentos[$i]['LancValor']; 
    }?>
    <tr>
      <td colspan="1" style="font-size: 12px;"><?= $TotalLancamentos[$i]['CliNome'] ?></td>
      <td colspan="4" style="font-size: 12px;"><?= $TotalLancamentos[$i]['LancDescricao'] ?></td>
      <td colspan="1" style="font-size: 12px;"><?= Util::ExibirDataBr($TotalLancamentos[$i]['LancDtVencimento']) ?></td>
      <td colspan="1" style="font-size: 12px;"><?= ($TotalLancamentos[$i]['Tipo']==1?'Receita':'<span style="color:red">Despesa</span>') ?></td>
      <td colspan="1" style="font-size: 12px;"><?= Util::FormatarValor($TotalLancamentos[$i]['LancValor']) ?></td>

    </tr>
  <?php   } ?>
</table>
<p style="font-size:12px" align="right">Total Valor Receitas: <?= Util::FormatarValor($TotReceita) ?></p>
<p style="font-size:12px;color:red;" align="right">Total Valor Despesas: <?= Util::FormatarValor($TotDespesa) ?></p>
<p style="font-size:12px" align="right">Saldo: <?= Util::FormatarValor($TotReceita - $TotDespesa) ?></p>
<p style="font-size:12px" align="right">Total de Registros: <?= $TotalLancamentosZ ?></p>

</body>

</html>
<?php
// Require composer autoload
$arquivo = "lancamentos.pdf";

$html = ob_get_clean();
$html = ($html);
// Create an instance of the class:
$mpdf = new Mpdf\Mpdf();
$mpdf->SetHeader('Relação de Lançamentos');
// Write some HTML code:
$mpdf->WriteHTML($html);

// Output a PDF file directly to the browser
$mpdf->Output($arquivo, 'I');
