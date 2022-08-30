<?php
require_once dirname(__DIR__, 3) . '/vendor/autoload.php';

use Src\Controller\EquipamentoController;
use Src\VO\EquipamentoVO;
use Src\Controller\TipoEquipamentoController;
use Src\Controller\ModeloController;
use Src\_public\Util;

Util::VerLogado();

if (isset($_GET['id']) &&  is_numeric($_GET['id'])){
    $id = $_GET['id'];
    $ctrl = new EquipamentoController;
    $dados = $ctrl->DetalharEquipamentoController($id);
    
    if (empty($dados)){
        Util::chamarPagina('consultar_equipamento.php');
    }else{
        $tipos = (new TipoEquipamentoController())->RetornarTiposEquipamentosController();
        $modelo = (new ModeloController())->RetornaModeloController();
    }

}

$ctrlTipo = new TipoEquipamentoController();
$ctrlModelo = new ModeloController();

$tipos = $ctrlTipo->RetornarTiposEquipamentosController();
$modelo = $ctrlModelo->RetornaModeloController();
$ctrl = new EquipamentoController;

if (isset($_POST['btn_cadastrar'])) {
    $vo = new EquipamentoVO;
    $vo->setIdentificacao($_POST['identificacao']);
    $vo->setDescricao($_POST['descricao']);
    $vo->setTipoEquipID($_POST['tipoequip']);
    $vo->setModeloEquipID($_POST['modelo']);
    $ret = $ctrl->CadastrarEquipamentoController($vo);

    if (isset($_POST['btn_cadastrar']) && $_POST['btn_cadastrar'] == 'ajx') {
        echo $ret;
    } else {
        echo -1;
    }
} else if (isset($_POST['btn_consultar']) && $_POST['btn_consultar'] == 'ajx') {
    $BuscarTipo = $_POST['BuscarTipo'];
    $filtro_palavra = $_POST['filtro_palavra'];
    $equipamento = $ctrl->ConsultarEquipamentoController($BuscarTipo, $filtro_palavra);



    if (count($equipamento) > 0) { ?>

        <div class="card-body" id="divResult" style="display:none;">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Equipamento Cadastrados</h3>


                        </div>
                        <div class="card-body table-responsive p-0" id="divResult" style="display:none;">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Tipo</th>
                                        <th>Modelo</th>
                                        <th>Identificação</th>
                                        <th>Descrição</th>
                                        <th>Ação</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($equipamento as $equip) { ?>
                                        <tr>
                                            <td><?= $equip['nomeTipo'] ?></td>
                                            <td><?= $equip['nomeModelo'] ?></td>
                                            <td><?= $equip['identificacao'] ?></td>
                                            <td><?= $equip['descricao'] ?></td>
                                            <td>
                                                <a href="equipamento.php?id=<?= $equip['idEquip']?>" class="btn btn-warning btn-xs">Alterar</a>
                                                <a href="#" class="btn btn-danger btn-xs">Excluir</a>
                                            </td>
                                        </tr>
                                    <?php } ?>

                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
        </div>
        </div>
        </div>
        </div>

<?php } else {
        echo '<h4><center>Nenhum registro encontrado!</center><h4>';
    }
} ?>