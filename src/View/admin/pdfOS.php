 <?php require_once dirname(__DIR__, 2) . '/Resource/dataview/Os_dataview.php'; use Src\_public\Util;


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
    <th colspan="4">
      <p><?= $dadosEmp[0]['EmpNome'] ?></p>
      <p><?= $dadosEmp[0]['EmpCNPJ'] ?></p>
      <p><?= $dadosEmp[0]['EmpEnd'] ?></p>
    </th>
  </tr>
  <tr>
    <td align="center" colspan="5"><strong>Relação de Ordens de Serviços</strong></td>
  </tr>
  <tr>

    <td><strong>Cliente</strong></td>
    <td><strong>Numero OS</strong></td>
    <td><strong>Data Entrada</strong></td>
    <td><strong>Data Finalizada</strong></td>
    <td><strong>Valor</strong></td>
  </tr>
  <?php for ($i = 0; $i < count($os); $i++) { ?>
    <?php

    $osZ++; $TotValor = $TotValor + $os[$i]['OsValorTotal'] - $os[$i]['OsDesconto'];?>
    <tr>
      <td style="font-size: 12px;"><?= $os[$i]['nomeCliente'] ?></td>
      <td style="font-size: 12px;"><?= '00'.$os[$i]['OsID'] ?></td>
      <td style="font-size: 12px;"><?= Util::ExibirDataBr($os[$i]['OsDtInicial']) ?></td>
      <td style="font-size: 12px;"><?= Util::ExibirDataBr($os[$i]['OsDtFinal']) ?></td>
      <td style="font-size: 12px;"><?= Util::FormatarValor($os[$i]['OsValorTotal'] - $os[$i]['OsDesconto']) ?></td>
      
    </tr>
  <?php   } ?>
</table>
<p style="font-size:12px" align="right">Total Valor das OS: <?= Util::FormatarValor($TotValor) ?></p>
<p style="font-size:12px" align="right">Total de Registros: <?= $osZ ?></p>

</body>

</html>
<?php
// Require composer autoload
$arquivo = "ordem.pdf";

$html = ob_get_clean();
$html = ($html);
// Create an instance of the class:
$mpdf = new Mpdf\Mpdf();
$mpdf->SetHeader('Relação de OS');
// Write some HTML code:
$mpdf->WriteHTML($html);

// Output a PDF file directly to the browser
$mpdf->Output($arquivo, 'I');
