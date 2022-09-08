<?php require_once dirname(__DIR__, 2) . '/Resource/dataview/Venda_dataview.php';

use Src\_public\Util; ?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>sysAdmin | Pagamento</title>
  <!-- Tell the browser to be responsive to screen width -->

  <head>
    <?php include_once PATH_URL . '/Template/_includes/_head.php' ?>

  </head>
</head>

<body>
  <div class="wrapper">
    <!-- Main content -->
    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-12">
          <h2 class="page-header">
            <img class="profile-user-img img-fluid img-circle" src="../../Resource/dataview/<?= $dadosEmp[0]['EmpLogoPath'] ?>" alt="User profile picture"> <?php echo $dadosEmp[0]['EmpNome'] ?> .
            <small class="float-right">Data: <?php echo date('d/m/Y') ?></small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          Dados Empresa
          <address>
            <strong><?= $dadosEmp[0]['EmpNome'] . ' - </strong> [' . $dadosEmp[0]['EmpCNPJ'] . ']' ?><br>
              <?= $dadosEmp[0]['EmpEnd'] . ', ' . $dadosEmp[0]['EmpNumero'] ?><br>
              <?= 'Cep: ' . $dadosEmp[0]['EmpCep'] . ' - ' . $dadosEmp[0]['EmpCidade'] ?><br>
              Telefone: <?= $dadosEmp[0]['telefone'] ?><br>
              Email: <?= $dadosEmp[0]['login'] ?>
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          Dados Cliente
          <address>
            <strong>Nome: </strong> <?= ($venda[0]['CliNome'] != '' ? $venda[0]['CliNome'] : '') ?><br>
            <?= ($venda[0]['CliEndereco'] != '' ? $venda[0]['CliEndereco'] . ', ' . $venda[0]['CliNumero'] : '') ?><br>
            <?= ($venda[0]['CliBairro'] != '' ? $venda[0]['CliBairro'] . ', ' . $venda[0]['CliCidade'] : '') ?><br>
            Telefone: <?= ($venda[0]['CliTelefone'] != '' ? $venda[0]['CliTelefone'] : '') ?> <br>
            Email: <?= ($venda[0]['CliEmail'] != '' ? $venda[0]['CliEmail'] : '') ?>
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <b>Ordem #<?= ($venda[0]['VendaID'] != '' ? '00' . $venda[0]['VendaID'] : '') ?></b><br>
          <br>
          <b>Data da Venda: </b><?= ($venda[0]['VendaDT'] != '' ? Util::ExibirDataBr($venda[0]['VendaDT']) : '') ?> <br>

        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">




        <div class="col-12 table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th colspan="2">Produto/Serviço</th>
                <th>Tipo</th>
                <th>Quantidade</th>
                <th>Valor</th>
                <th>Valor Total</th>

              </tr>
            </thead>
            <tbody>
              <?php $subTotal = 0;
              for ($i = 0; $i < count($ProdVenda); $i++) {
                if ($ProdVenda[$i]['ItensProdID'] != '') {
                  $subTotal = $subTotal + $ProdVenda[$i]['ProdValorVenda'] ?>
                  <tr>
                    <td colspan="2"><?= $ProdVenda[$i]['ProdDescricao'] ?></td>
                    <td><span> Produto</span></td>
                    <td><?= $ProdVenda[$i]['ItensQtd'] ?></td>
                    <td><?= $ProdVenda[$i]['ProdValorVenda'] ?></td>
                    <td><?= $ProdVenda[$i]['ItensSubTotal'] ?></td>


                  </tr>
              <?php }
              } ?>

            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <!-- accepted payments column -->
        <div class="col-6">
          <p class="lead">Formas de Pagamento:</p>
          <img src="../../Template/dist/img/credit/visa.png" alt="Visa">
          <img src="../../Template/dist/img/credit/mastercard.png" alt="Mastercard">
          <img src="../../Template/dist/img/credit/american-express.png" alt="American Express">
          <img src="../../Template/dist/img/credit/paypal2.png" alt="Paypal">
        </div>
        <!-- /.col -->
        <div class="col-6">
          <p class="lead">Valor a ser pago em: <?= date('d/m/Y') ?></p>

          <div class="table-responsive">
            <table class="table">
              <tr>
                <th style="width:50%">Subtotal Produtos:</th>
                <td><?= ($subTotal != '' ? Util::FormatarValor($subTotal) : '0,00') ?></td>
              </tr>
              <tr>
                <th>Total Produtos:</th>
                <td><?= ($venda[0]['VendaValorTotal'] != '' ? Util::FormatarValor($venda[0]['VendaValorTotal']) : '') ?></td>
              </tr>
              <tr>
                <th>Desconto:</th>
                <td><?= ($venda[0]['VendaDesconto'] != '' ? Util::FormatarValor($venda[0]['VendaDesconto']) : '') ?></td>
              </tr>
              <tr>
                <th>Total Venda:</th>
                <td><?= ($venda[0]['VendaValorTotal'] != '' ? Util::FormatarValor($venda[0]['VendaValorTotal'] - $venda[0]['VendaDesconto']) : '') ?></td>
              </tr>
            </table>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- ./wrapper -->

  <script type="text/javascript">
    window.addEventListener("load", window.print());
  </script>
</body>

</html>