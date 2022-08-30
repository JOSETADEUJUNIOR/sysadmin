<?php require_once dirname(__DIR__, 2) . '/Resource/dataview/cliente_dataview.php';


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
    <th colspan="3">
      <p><?= $empresa[0]['EmpNome'] ?></p>
      <p><?= $empresa[0]['EmpCNPJ'] ?></p>
      <p><?= $empresa[0]['EmpEnd'] ?></p>
    </th>
  </tr>
  <tr>
    <td align="center" colspan="4"><strong>Relação de Clientes</strong></td>
  </tr>
  <tr>
    <td><strong>Nome</strong></td>
    <td><strong>Telefone</strong></td>
    <td><strong>Endereço</strong></td>
    <td><strong>Email</strong></td>
  </tr>
  <?php for ($i = 0; $i < count($cliente); $i++) { ?>
    <?php

    $ClienteZ++ ?>
    <tr>
      <td style="font-size: 12px;"><?= $cliente[$i]['CliNome'] ?></td>
      <td style="font-size: 12px;"><?= $cliente[$i]['CliTelefone'] ?></td>
      <td style="font-size: 12px;"><?= $cliente[$i]['CliEndereco'] ?></td>
      <td style="font-size: 12px;"><?= $cliente[$i]['CliEmail'] ?></td>
    </tr>
  <?php   } ?>
</table>
<p style="font-size:12px" align="right">Total de Registros: <?= $ClienteZ ?></p>

</body>

</html>
<?php
// Require composer autoload
$arquivo = "pdf.pdf";

$html = ob_get_clean();
$html = ($html);
// Create an instance of the class:
$mpdf = new Mpdf\Mpdf();
$mpdf->SetHeader('Relação de Clientes');
// Write some HTML code:
$mpdf->WriteHTML($html);

// Output a PDF file directly to the browser
$mpdf->Output($arquivo, 'I');
