<?php require_once dirname(__DIR__, 2) . '/Resource/dataview/index_dataview.php';

use Mpdf\Tag\Input;
use Src\_public\Util; ?>

<!DOCTYPE html>
<html>

<head>
  <?php include_once PATH_URL . '/Template/_includes/_head.php' ?>
</head>

<body class="hold-transition sidebar-mini">
  <!-- Site wrapper -->
  <div class="wrapper">
    <!-- Navbar -->
    <?php
    include_once PATH_URL . '/Template/_includes/_topo.php';
    include_once PATH_URL . '/Template/_includes/_menu.php'
    ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Dashboard</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <?php $totalOS=0; $ValorTotal=0; for ($i = 0; $i < count($os); $i++) {
          if ($os[$i]['OsFaturado']=='S') {
          $totalOS = $totalOS + count($os[$i]['OsID']);
          $ValorTotal = $ValorTotal + $os[$i]['OsValorTotal'];
            
          }
        } ?>
        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                  <div class="inner">
                    <h3><span><?= 'R$: ' . Util::FormatarValor($ValorTotal) ?></span></h3>

                    <p> Valor Total de OS </p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-bag"></i>
                  </div>
                  <a href="ordem_servico.php" class="small-box-footer">Mais Informações <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>

              <!-- ./col -->
              <?php for ($i = 0; $i < count($vendas); $i++) {
                if ($vendas[$i]['VendaDT'] == date('Y-m-d')) {
                  $valorVenda = $valorVenda + $vendas[$i]['VendaValorTotal'];
                }
              } ?>
              <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                  <div class="inner">
                    <h3>R$: <?= Util::FormatarValor($valorVenda) ?> <sup style="font-size: 20px"></sup></h3>

                    <p>Vendas do dia</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                  </div>
                  <a href="venda.php" class="small-box-footer">Mais Informações <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <!-- ./col -->
             <?php $receita=0; $despesa=0; for ($i=0; $i < count($lancamentos) ; $i++) { 
                if ($lancamentos[$i]['Tipo']==1) {

                  $receita = $receita + $lancamentos[$i]['LancValor'];
                }else if ($lancamentos[$i]['Tipo']==2) {
                  $despesa = $despesa + $lancamentos[$i]['LancValor'];  
                }
             }?>
              
              <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                  <div class="inner">
                    <h3><?= Util::FormatarValor($receita) ?></h3>
                    <p>Contas a Receber</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                  </div>
                  <a href="financeiro.php" class="small-box-footer">Mais Informações <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                  <div class="inner">
                    <h3><?= Util::FormatarValor($despesa) ?></h3>
                    <p>Contas a Pagar</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                  </div>
                  <a href="#" class="small-box-footer">Mais Informações <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <!-- ./col -->
            </div>
            <div id="divload"></div>
        </section>
        <!-- /.content -->



        <section class="content">
          <div class="container-fluid">
            <div class="row">


              <div class="col-md-6">
                <!-- LINE CHART -->

                <!-- /.card -->

                <!-- BAR CHART -->
                <div class="card card-success">
                  <div class="card-header">
                    <h3 class="card-title">Vendas por Mês</h3>

                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                      </button>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="chart">
                      <div class="chartjs-size-monitor">
                        <div class="chartjs-size-monitor-expand">
                          <div class=""></div>
                        </div>
                        <div class="chartjs-size-monitor-shrink">
                          <div class=""></div>
                        </div>
                      </div>
                      <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 658px;" width="658" height="250" class="chartjs-render-monitor"></canvas>
                    </div>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->

                <!-- STACKED BAR CHART -->

                <!-- /.card -->

              </div>

              <div class="col-md-6">
                <!-- AREA CHART -->

                <!-- /.card -->

                <!-- DONUT CHART -->
                <div class="card card-danger">
                  <div class="card-header">
                    <h3 class="card-title">Despesas</h3>

                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                      </button>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="chartjs-size-monitor">
                      <div class="chartjs-size-monitor-expand">
                        <div class=""></div>
                      </div>
                      <div class="chartjs-size-monitor-shrink">
                        <div class=""></div>
                      </div>
                    </div>
                    <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 658px;" width="658" height="250" class="chartjs-render-monitor"></canvas>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->


              </div>
              <!-- /.col (LEFT) -->

              <!-- /.col (RIGHT) -->
            </div>
            <!-- /.row -->
          </div><!-- /.container-fluid -->
        </section>


        <div class="col-md-12">
          <!-- USERS LIST -->

          <div class="card">
            <div class="card-header border-transparent">
              <h3 class="card-title">Ultimas Vendas</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <div class="table-responsive">


                <table class="table m-0">
                  <thead>
                    <tr>
                      <th>ID Venda</th>
                      <th>Cliente</th>
                      <th>Valor</th>

                    </tr>
                  </thead>
                  <tbody>
                    <?php for ($i = 0; $i < count($vendas); $i++) { ?>
                      <tr>
                        <td><a href="print_venda.php?VendaID=<?= $vendas[$i]['VendaID'] ?>" target="_blank"><?= $vendas[$i]['VendaID'] ?></a></td>
                        <td><?= $vendas[$i]['CliNome'] ?></td>
                        <td><span class="badge badge-success"><?= $vendas[$i]['VendaValorTotal'] ?></span></td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
              <a href="venda.php" class="btn btn-sm btn-secondary float-right">Ver todas as vendas</a>
            </div>
            <!-- /.card-footer -->
          </div>
        </div>
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Produtos Recentes adicionados</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <!-- /.card-header -->
            <?php for ($i = 0; $i < count($produto); $i++) { ?>
              <div class="card-body p-0">
                <ul class="products-list product-list-in-card pl-2 pr-2">
                  <li class="item">
                    <div class="product-img">
                      <td><a href="../../Resource/dataview/<?= $produto[$i]['ProdImagemPath'] ?>" target="_blank" rel="noopener noreferrer"><img src="../../Resource/dataview/<?= $produto[$i]['ProdImagemPath'] ?>" alt="<?= $produto[$i]['ProdImagemPath'] ?>" class="brand-image img-circle elevation-3" width="50px" height="50px"></a></td>
                    </div>
                    <div class="product-info">
                      <a href="javascript:void(0)" class="product-title"><?= $produto[$i]['ProdNome'] ?>
                        <span class="badge badge-warning float-right"><?= Util::FormatarValor($produto[$i]['ProdValorVenda']) ?></span></a>
                      <span class="product-description">
                        <?= $produto[$i]['ProdDescricao'] ?>
                      </span>
                    </div>
                  </li>
                </ul>
              <?php } ?>
              </div>
              <!-- /.card-body -->
              <div class="card-footer text-center">
                <a href="produto.php" class="uppercase">Ver todos os produtos</a>
              </div>
              <!-- /.card-footer -->
          </div>



<input type="hidden" id="receita" name="receita" value="<?=$receita?>">
<input type="hidden" id="despesa" name="despesa" value="<?=$despesa?>">
          <!--/.card -->
        </div>

    </div>

    </div>


    </div>
    <!-- /.content-wrapper -->
    <?php include_once PATH_URL . '/Template/_includes/_footer.php' ?>
    <!-- /.control-sidebar -->
  <!-- ./wrapper -->

  <!-- jQuery -->
  <?php include_once PATH_URL . '/Template/_includes/_scripts.php' ?>
  <?php include_once PATH_URL . '/Template/_includes/_msg.php' ?>
  <script src="../../Resource/ajax/tipo-equipamento-ajx.js"></script>

  <script src="../../Template/plugins/chart.js/Chart.min.js"></script>

  
  <script>
    $(function() {

      var areaChartCanvas = $('#barChart').get(0).getContext('2d')

      var areaChartData = {
      
        
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
        datasets: [{
            label: 'Digital Goods',
            backgroundColor: 'rgba(60,141,188,0.9)',
            borderColor: 'rgba(60,141,188,0.8)',
            pointRadius: false,
            pointColor: '#3b8bba',
            pointStrokeColor: 'rgba(60,141,188,1)',
            pointHighlightFill: '#fff',
            pointHighlightStroke: 'rgba(60,141,188,1)',
            data: [28, 48, 40, 19, 86, 27, 90]
          },
          {
            label: 'Electronics',
            backgroundColor: 'rgba(210, 214, 222, 1)',
            borderColor: 'rgba(210, 214, 222, 1)',
            pointRadius: false,
            pointColor: 'rgba(210, 214, 222, 1)',
            pointStrokeColor: '#c1c7d1',
            pointHighlightFill: '#fff',
            pointHighlightStroke: 'rgba(220,220,220,1)',
            data: [65, 59, 80, 81, 56, 55, 40]
          },
        ]
      }

      var areaChartOptions = {
        maintainAspectRatio: false,
        responsive: true,
        legend: {
          display: false
        },
        scales: {
          xAxes: [{
            gridLines: {
              display: false,
            }
          }],
          yAxes: [{
            gridLines: {
              display: false,
            }
          }]
        }
      }

      // This will get the first returned node in the jQuery collection.








      var barChartCanvas = $('#barChart').get(0).getContext('2d')
      var barChartData = $.extend(true, {}, areaChartData)
      var temp0 = areaChartData.datasets[0]
      var temp1 = areaChartData.datasets[1]
      barChartData.datasets[0] = temp1
      barChartData.datasets[1] = temp0

      var barChartOptions = {
        responsive: true,
        maintainAspectRatio: false,
        datasetFill: false
      }

      new Chart(barChartCanvas, {
        type: 'bar',
        data: barChartData,
        options: barChartOptions
      })

      //---------------------
      //- STACKED BAR CHART -
      //---------------------


      //-------------
      //- DONUT CHART -
      //-------------
      // Get context with jQuery - using jQuery's .get() method.

      //-------------


      //---------------------
      //- STACKED BAR CHART -
      //---------------------

    })
  </script>

  <script>
    $(function() {
      /* ChartJS
       * -------
       * Here we will create a few charts using ChartJS
       */

      //--------------
      //- AREA CHART -
      //--------------

      // Get context with jQuery - using jQuery's .get() method.
      var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
      var receita = $("#receita").val();
      var despesa = $("#despesa").val();
      var donutData = {
        labels: [
          'Credito',
          'Debito',
          
        ],
        datasets: [{
          data: [receita,despesa],
          backgroundColor: ['#00a65a','#f56954'],
        }]
      }
      var donutOptions = {
        maintainAspectRatio: false,
        responsive: true,
      }
      //Create pie or douhnut chart
      // You can switch between pie and douhnut using the method below.
      new Chart(donutChartCanvas, {
        type: 'doughnut',
        data: donutData,
        options: donutOptions
      })

      //-------------
      //- PIE CHART -
      //-------------
      // Get context with jQuery - using jQuery's .get() method.
      var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
      var pieData = donutData;
      var pieOptions = {
        maintainAspectRatio: false,
        responsive: true,
      }
      //Create pie or douhnut chart
      // You can switch between pie and douhnut using the method below.
      new Chart(pieChartCanvas, {
        type: 'pie',
        data: pieData,
        options: pieOptions
      })


    })
  </script>
</body>

</html>