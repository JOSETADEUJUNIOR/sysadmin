<?php require_once dirname(__DIR__, 2) . '/Resource/dataview/servico_dataview.php';

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
    <th colspan="5">
      <p><?= $empresa[0]['EmpNome'] ?></p>
      <p><?= $empresa[0]['EmpCNPJ'] ?></p>
      <p><?= $empresa[0]['EmpEnd'] ?></p>
    </th>
  </tr>
  <tr>
    <td align="center" colspan="6"><strong>Relação de Produtos</strong></td>
  </tr>
  <tr>
    <td><strong>Serviço</strong></td>
    <td colspan="4"><strong>Descrição</strong></td>
    <td colspan="1"><strong>Valor do Serviço</strong></td>
  </tr>
  <?php for ($i = 0; $i < count($servico); $i++) { ?>
    <?php

    $servicoZ++;
    $TotValor = $TotValor + $servico[$i]['ServValor']; ?>
    <tr>
      <td style="font-size: 12px;"><?= $servico[$i]['ServNome'] ?></td>
      <td colspan="4" style="font-size: 12px;"><?= $servico[$i]['ServDescricao'] ?></td>
      <td colspan="1" style="font-size: 12px;"><?= Util::FormatarValor($servico[$i]['ServValor']) ?></td>

    </tr>
  <?php   } ?>
</table>
<p style="font-size:12px" align="right">Total Valor dos Serviços: <?= Util::FormatarValor($TotValor) ?></p>
<p style="font-size:12px" align="right">Total de Registros: <?= $servicoZ ?></p>

</body>

</html>
<?php
// Require composer autoload
$arquivo = "pdf";

$html = ob_get_clean();
$html = ($html);
// Create an instance of the class:
$mpdf = new Mpdf\Mpdf();
$mpdf->SetHeader('Relação de Serviços');
// Write some HTML code:
$mpdf->WriteHTML($html);

// Output a PDF file directly to the browser
$mpdf->Output($arquivo, 'I');
