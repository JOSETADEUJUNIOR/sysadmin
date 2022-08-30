<?php require_once dirname(__DIR__, 3) . '/vendor/autoload.php';
use Src\_public\Util;
?>

<footer class="main-footer">
  <div class="float-right d-none d-sm-block">
    <b>Version</b> 3.0.1
  </div>
  <strong>Copyright &copy; 2022-<?= date('Y').'- '.Util::CodigoLogado().$_SESSION['nome']?>.</strong> Todos os direitos reservados.
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>