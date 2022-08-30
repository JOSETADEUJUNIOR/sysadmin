<?php

require_once dirname(__DIR__, 2) . '/Resource/dataview/usuario_dataview.php';?>
<!DOCTYPE html>
<html>

<head>
    
    <?php include_once PATH_URL . '/Template/_includes/_head.php' ?>
</head>

<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="../../index2.html" class="h1"><b>Sysvenda</b><?= date("Y")?></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Realize o login para iniciar</p>

      <form id="form_login" method="post" action="login.php">
        <div class="input-group mb-3">
          <input type="email" name="login" class="form-control" placeholder="login">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="senha" class="form-control" placeholder="Senha">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          
          <!-- /.col -->
          <div class="col-md-6">
            <button class="btn btn-success col-md-12" name="btn_login" >Logar</button>
          </div>
          <div class="col-md-6">
            <a href="cadastro.php" class="btn btn-warning col-md-12">Cadastrar</a>
          </div>
          <!-- /.col -->
        </div>
      </form>

      
      <!-- /.social-auth-links -->

      
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<?php include_once PATH_URL . '/Template/_includes/_scripts.php' ?>
    <?php include_once PATH_URL . '/Template/_includes/_msg.php' ?>

    <script src="../../Resource/ajax/cadastro-ajx.js"></script>
</body>
</html>
