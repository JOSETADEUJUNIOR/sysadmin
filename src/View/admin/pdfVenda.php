<?php require_once dirname(__DIR__, 2) . '/Resource/dataview/Venda_dataview.php'; use Src\_public\Util;


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
    <th><img src="../../Resource/dataview/<?= $dadosEmp[0]['EmpLogoPath'] ?>" height="100px" width="150px" alt="Photo 2" class="img-fluid"></th>
    <th colspan="5">
      <p><?= $dadosEmp[0]['EmpNome'] ?></p>
      <p><?= $dadosEmp[0]['EmpCNPJ'] ?></p>
      <p><?= $dadosEmp[0]['EmpEnd'] ?></p>
    </th>
  </tr>
  <tr>
    <td align="center" colspan="6"><strong>Relação de Vendas</strong></td>
  </tr>
  <tr>
    <td colspan="2"><strong>Cliente</strong></td>
    <td><strong>Data Venda</strong></td>
    <td><strong>Valor</strong></td>
    <td><strong>Desconto</strong></td>
    <td><strong>Total</strong></td>
  </tr>
  <?php for ($i = 0; $i < count($vendas); $i++) { ?>
    <?php

    $vendasZ++; $TotValor = $TotValor + ($vendas[$i]['VendaValorTotal'] - $vendas[$i]['VendaDesconto']);?>
    <tr>
      <td colspan="2" style="font-size: 12px;"><?= $vendas[$i]['CliNome'] ?></td>
      <td style="font-size: 12px;"><?= Util::ExibirDataBr($vendas[$i]['VendaDT']) ?></td>
      <td style="font-size: 12px;"><?= Util::FormatarValor($vendas[$i]['VendaValorTotal']) ?></td>
      <td style="font-size: 12px;"><?= Util::FormatarValor($vendas[$i]['VendaDesconto']) ?></td>
      <td style="font-size: 12px;"><?= Util::FormatarValor($vendas[$i]['VendaValorTotal'] - $vendas[$i]['VendaDesconto']) ?></td>
      
    </tr>
  <?php   } ?>
</table>
<p style="font-size:12px" align="right">Total Valor Venda: <?= Util::FormatarValor($TotValor) ?></p>
<p style="font-size:12px" align="right">Total de Registros: <?= $vendasZ ?></p>

</body>

</html>
<?php
// Require composer autoload
$arquivo = "ordem.pdf";

$html = ob_get_clean();
$html = ($html);
// Create an instance of the class:
$mpdf = new Mpdf\Mpdf();
$mpdf->SetHeader('Relação de Vendas');
// Write some HTML code:
$mpdf->WriteHTML($html);

// Output a PDF file directly to the browser
$mpdf->Output($arquivo, 'I');
