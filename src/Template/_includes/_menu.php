<!-- Main Sidebar Container -->

<?php
require_once dirname(__DIR__, 3) . '/vendor/autoload.php';

use Src\_public\Util;
use Src\Controller\UsuarioController;

if (isset($_GET['close']) && $_GET['close'] == 1) {
  Util::Deslogar();
}

$empresa = new UsuarioController();
$dados = $empresa->RetornarDadosCadastraisController();
?>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index.php" class="brand-link">
    <img src="../../Resource/dataview/<?= $dados[0]['EmpLogoPath'] ?>" alt="<?= $dados[0]['EmpNome'] ?>" class="brand-image img-circle elevation-3">
    <span class="brand-text font-weight-light">Sysvenda - <?= date("Y") ?></span>

  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user (optional) -->


    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="index.php" class="nav-link">
            <i class="nav-icon fa fa-home"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="cliente.php" class="nav-link">
            <i class="nav-icon fa fa-users"></i>
            <p>
              Clientes
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="produto.php" class="nav-link">
            <i class="nav-icon fa fa-barcode"></i>
            <p>
              Produtos
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="servico.php" class="nav-link">
            <i class="nav-icon fa fa-wrench"></i>
            <p>
              Serviços
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-tags"></i>
            <p>
              Ordens de Serviços
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="setor.php" class="nav-link">
                <i class="fa fa-users nav-icon"></i>
                <p>Setor</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="consulta_equipamento.php" class="nav-link">
                <i class="fa fa-barcode nav-icon"></i>
                <p>Equipamento</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="modelo.php" class="nav-link">
                <i class="fa fa-wrench nav-icon"></i>
                <p>Modelo</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="tipoequipamento.php" class="nav-link">
                <i class="fa fa-tags nav-icon"></i>
                <p>Tipo Equipamento</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="ordem_servico.php" class="nav-link">
                <i class="fa fa-book nav-icon"></i>
                <p>O.S</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="venda.php" class="nav-link">
            <i class="nav-icon fa fa-shopping-cart"></i>
            <p>
              Vendas
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="venda.php" class="nav-link">
            <i class="nav-icon fa fa-book"></i>
            <p>
              Financeiro
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-list-alt"></i>
            <p>
              Relatórios
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="pdfCliente.php" target="_blank" class="nav-link">
                <i class="fa fa-users nav-icon"></i>
                <p>Clientes</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="consulta_equipamento.php" class="nav-link">
                <i class="fa fa-barcode nav-icon"></i>
                <p>Produto</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../../index3.html" class="nav-link">
                <i class="fa fa-wrench nav-icon"></i>
                <p>Serviços</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../../index3.html" class="nav-link">
                <i class="fa fa-tags nav-icon"></i>
                <p>Ordens de Serviços</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../../index3.html" class="nav-link">
                <i class="fa fa-shopping-cart nav-icon"></i>
                <p>Vendas</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../../index3.html" class="nav-link">
                <i class="fa fa-book nav-icon"></i>
                <p>Financeiro</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-cogs"></i>
            <p>
              Configurações
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="usuarios.php" class="nav-link">
                <i class="fa fa-users nav-icon"></i>
                <p>Usuarios</p>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>

  <!-- /.sidebar -->
</aside>