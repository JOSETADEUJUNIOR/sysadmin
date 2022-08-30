<?php
include_once '_include_autoload.php';

use Src\Controller\UsuarioController;
use Src\VO\UsuarioVO;
use Src\_public\Util;

Util::VerLogado();

$ctrl = new UsuarioController();

if (isset($_POST['btnAlterarUser'])){
    $vo = new UsuarioVO;
    $vo->setNome($_POST['nome']);
    $vo->setLogin($_POST['login']);
    $vo->setSenha($_POST['senha']);
    $vo->setTelefone($_POST['telefone']);
    $arquivos = $_FILES['arquivos'];

    if ($arquivos['size'] > 2097152)
        die("Arquivo muito grande !! Max: 2MB");

    $pasta = "arquivos/";
    @mkdir($pasta);
    $nomeDoArquivo = $arquivos['name'];
    $novoNomeDoArquivo = uniqid();
    $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));
    if ($extensao != "jpg" && $extensao != "png" && $extensao != "jpeg" && $extensao != '')
        die("Tipo de arquivo não aceito");

    $path = $pasta . $novoNomeDoArquivo . "." . $extensao;
    $deu_certo = move_uploaded_file($arquivos["tmp_name"], $path);
    $vo->setUserLogo($nomeDoArquivo);
    $vo->setLogoPath($path);
    
    $ret = $ctrl->AlterarUsuarioController($vo);

    if ($_POST['btnAlterarUser'] == 'ajx') {
        echo $ret;
    } else {
        $user = $ctrl->RetornarDadosUsuarioController();
    }


} else if (isset($_POST['btnConsultarUsuario']) && $_POST['btnConsultarUsuario'] == 'ajx') {

    $user = $ctrl->RetornarDadosUsuarioController(); ?>

<div class="card card-primary card-outline">
    <div class="card-body box-profile">
        <div class="text-center">
            <img class="profile-user-img img-fluid img-circle" src="../../Resource/dataview/<?= $user[0]['UserLogoPath']?>" alt="User profile picture">
        </div>

        <h3 class="profile-username text-center"><?= $user[0]['nome'] ?></h3>

        <p class="text-muted text-center"><?= $user[0]['tipo'] ?></p>

        <ul class="list-group list-group-unbordered mb-3">
            <li class="list-group-item">
                <b>Telefone</b> <a class="float-right"><?= $user[0]['telefone'] ?></a>
            </li>
            <li class="list-group-item">
                <b>E-mail</b> <a class="float-right"><?= $user[0]['login'] ?></a>
            </li>
            <li class="list-group-item">
            <b>Status</b> <a class="float-right"><?= ($user[0]['status']==1?'<small class="btn btn-success btn-xs">Ativo</small>':'<small class="btn btn-danger btn-xs">Inativo</small>') ?></a>
            </li>
        </ul>
        <a href="#" onclick="AlterarUsuarioModal('<?= $user[0]['EmpID'] ?>', '<?= $user[0]['nome'] ?>','<?= $user[0]['login'] ?>','<?= $user[0]['senha'] ?>','<?= $user[0]['telefone'] ?>','<?= $user[0]['UserLogo'] ?>','<?= $user[0]['UserLogoPath'] ?>')" data-toggle="modal" data-target="#alterarUsuario" class="btn btn-primary btn-block">Alterar Dados Usuario</a>
    </div>
    <!-- /.card-body -->
</div>
    <?php } else {
    $dados = $ctrl->RetornarDadosCadastraisController();
    $user = $ctrl->RetornarDadosUsuarioController();
    
}  

if (isset($_POST['btnAlterar'])) {
    $vo = new UsuarioVO;
    $vo->setNomeEmpresa($_POST['EmpNome']);
    $vo->setCNPJ($_POST['EmpCNPJ']);
    $vo->setEndereco($_POST['EmpEnd']);
    $vo->setCep($_POST['EmpCep']);
    $vo->setNumero($_POST['EmpNumero']);
    $vo->setCidade($_POST['EmpCidade']);
    $arquivos = $_FILES['arquivos'];

    if ($arquivos['size'] > 2097152)
        die("Arquivo muito grande !! Max: 2MB");

    $pasta = "arquivos/";
    @mkdir($pasta);
    $nomeDoArquivo = $arquivos['name'];
    $novoNomeDoArquivo = uniqid();
    $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));
    if ($extensao != "jpg" && $extensao != "png" && $extensao != "jpeg" && $extensao != '')
        die("Tipo de arquivo não aceito");

    $path = $pasta . $novoNomeDoArquivo . "." . $extensao;
    $deu_certo = move_uploaded_file($arquivos["tmp_name"], $path);
    $vo->setEmpLogo($nomeDoArquivo);
    $vo->setLogoPath($path);

    $ret = $ctrl->AlterarEmpresaController($vo);

    if ($_POST['btnAlterar'] == 'ajx') {
        echo $ret;
    } else {
        $dados = $ctrl->RetornarDadosCadastraisController();
    }
} else if (isset($_POST['btnConsultar']) && $_POST['btnConsultar'] == 'ajx') {

    $dados = $ctrl->RetornarDadosCadastraisController(); ?>

    <div class="card card-primary" id="table_result_Empresa">
        <div class="card-header">
            <h3 class="card-title">Informações da Empresa</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-4">
                    <div class="position-relative">
                        <img src="../../Resource/dataview/<?= $dados[0]['EmpLogoPath'] ?>" heigth="180px" width="120px" alt="Photo 2" class="img-fluid">

                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body ">
            <strong><i class="fas fa-book mr-1"></i>Dados Cadastrais</strong>

            <p class="text-muted">
                <?= $dados[0]['EmpNome'] . ' - ' . $dados[0]['EmpCNPJ'] ?>
            </p>

            <hr>

            <strong><i class="fas fa-map-marker-alt mr-1"></i> Endereço</strong>

            <p class="text-muted"><?= 'Endereço: ' . $dados[0]['EmpEnd'] . ', ' . $dados[0]['EmpNumero'] . ' - ' . $dados[0]['EmpCidade'] ?></p>

            <hr>

            <strong><i class="fas fa-pencil-alt mr-1"></i> Quantidade de Usuários</strong>

            <p class="text-muted">
                <span class="tag tag-danger">10 Usuários</span>

            </p>

            <hr>

            <strong><i class="far fa-file-alt mr-1"></i> Observações</strong>

            <p class="text-muted">Vencimento da Lincença: 10/08/2022.</p>
            <a href="#" onclick="AlterarEmpresaModal('<?= $dados[0]['EmpID'] ?>', '<?= $dados[0]['EmpNome'] ?>','<?= $dados[0]['EmpCNPJ'] ?>','<?= $dados[0]['EmpEnd'] ?>','<?= $dados[0]['EmpCep'] ?>','<?= $dados[0]['EmpNumero'] ?>','<?= $dados[0]['EmpCidade'] ?>','<?= $dados[0]['EmpLogo'] ?>')" data-toggle="modal" data-target="#alterarEmpresa" class="btn btn-primary btn-block">Alterar Dados</a>
        </div>
        <!-- /.card-body -->
    </div>
    </div>

<?php } else {
    $dados = $ctrl->RetornarDadosCadastraisController();
    $user = $ctrl->RetornarDadosUsuarioController();
    
} ?>