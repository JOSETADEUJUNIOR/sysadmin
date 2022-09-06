<?php require_once dirname(__DIR__, 2) . '/Resource/dataview/produto_dataview.php'; use Src\_public\Util;


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
    <td align="center" colspan="4"><strong>Relação de Produtos</strong></td>
  </tr>
  <tr>
    <td><strong>Descricao</strong></td>
    <td><strong>Valor Compra</strong></td>
    <td><strong>Valor Venda</strong></td>
    <td><strong>Estoque</strong></td>
  </tr>
  <?php for ($i = 0; $i < count($produto); $i++) { ?>
    <?php

    $ProdutoZ++; $TotValorCompra = $TotValorCompra + $produto[$i]['ProdValorCompra'];$TotValorVenda = $TotValorVenda + $produto[$i]['ProdValorVenda']; ?>
    <tr>
      <td style="font-size: 12px;"><?= $produto[$i]['ProdDescricao'] ?></td>
      <td style="font-size: 12px;"><?= Util::FormatarValor($produto[$i]['ProdValorCompra']) ?></td>
      <td style="font-size: 12px;"><?= Util::FormatarValor($produto[$i]['ProdValorVenda']) ?></td>
      <td style="font-size: 12px;"><?= $produto[$i]['ProdEstoque'] ?></td>
    </tr>
  <?php   } ?>
</table>
<p style="font-size:12px" align="right">Total Valor Compra: <?= Util::FormatarValor($TotValorCompra) ?></p>
<p style="font-size:12px" align="right">Total Valor Venda: <?= Util::FormatarValor($TotValorVenda) ?></p>
<p style="font-size:12px" align="right">Total de Registros: <?= $ProdutoZ ?></p>

</body>

</html>
<?php
// Require composer autoload
$arquivo = "pdfProdutos.pdf";

$html = ob_get_clean();
$html = ($html);
// Create an instance of the class:
$mpdf = new Mpdf\Mpdf();
$mpdf->SetHeader('Relação de Produtos');
// Write some HTML code:
$mpdf->WriteHTML($html);

// Output a PDF file directly to the browser
$mpdf->Output($arquivo, 'I');
