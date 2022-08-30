<?php

require_once dirname(__DIR__, 2) . '/Resource/dataview/usuario_dataview.php';?>
<!DOCTYPE html>
<html>

<head>
    
    <?php include_once PATH_URL . '/Template/_includes/_head.php' ?>
</head>
<body class="hold-transition register-page">
<div class="register-box col-md-6">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="../../index2.html" class="h1"><b>Sysvenda</b><?= date("Y")?></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Realizar o cadastro</p>

      <form id="form_cadastro" method="post" action="cadastro.php">
        <div class="input-group mb-3">
          <input name="nome" id="nome" type="text" class="form-control" placeholder="Nome">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" name="login" id="login" class="form-control" placeholder="Login">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="senha" id="senha" class="form-control" placeholder="Senha">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="resenha" id="resenha" class="form-control" placeholder="Confirme a senha">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="phone" name="telefone" id="telefone" class="form-control" placeholder="Telefone">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-phone"></span>
            </div>
          </div>
        </div>
        <div class="row">
          
          <!-- /.col -->
          <div class="col-md-12">
            <button class="btn btn-success col-md-12" name="btn_cadastrar" onclick="return CadastrarUsuario('form_cadastro')">Registrar</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      

      <a href="login.php" class="text-center">já tenho cadastro</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->

    <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <?php include_once PATH_URL . '/Template/_includes/_scripts.php' ?>
    <?php include_once PATH_URL . '/Template/_includes/_msg.php' ?>

    <script src="../../Resource/ajax/cadastro-ajx.js"></script>
</body>
</html>
