<?php
include_once '_include_autoload.php';

use Src\Controller\ProdutoController;
use Src\Controller\UsuarioController;
use Src\VO\ProdutoVO;
use Src\_public\Util;

Util::VerLogado();
$ctrlEmpresa = new UsuarioController();
$empresa = $ctrlEmpresa->RetornarDadosCadastraisController();

$ctrl = new ProdutoController();


if (isset($_GET['EstoqMin'])) {
    $prods = $ctrl->RetornarProdutoController();
    foreach ($prods as $prod) {

        if ($prod['ProdEstoque'] == 0 || $prod['ProdEstoque'] <= $prod['ProdEstoqueMin']) {

            $produtos[] = $prod;
        }
    }
    $produto = $produtos;
}

else if (isset($_POST['btn_cadastrar'])) {
    $vo = new ProdutoVO;
    $vo->setDescricao($_POST['ProdDescricao']);
    $vo->setDtCriacao($_POST['ProdDtCad']);
    $vo->setCodBarra($_POST['ProdCodBarra']);
    $vo->setValorCompra($_POST['ProdValorCompra']);
    $vo->setValorVenda($_POST['ProdValorVenda']);
    $vo->setEstoqueMin($_POST['ProdEstoqueMin']);
    $vo->setEstoque($_POST['ProdEstoque']);
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
    $vo->setImagem($nomeDoArquivo);
    $vo->setImagemPath($path);
    $ret = $ctrl->CadastrarProduto($vo);

    if ($_POST['btn_cadastrar'] == 'ajx') {
        echo $ret;
    }
}
else if (isset($_POST['btn_alterar'])) {
    $vo = new ProdutoVO;
    $vo->setID($_POST['AlteraID']);
    $vo->setDescricao($_POST['AlteraProdDescricao']);
    $vo->setDtCriacao($_POST['AlteraProdDtCad']);
    $vo->setCodBarra($_POST['AlteraProdCodBarra']);
    $vo->setValorCompra($_POST['AlteraProdValorCompra']);
    $vo->setValorVenda($_POST['AlteraProdValorVenda']);
    $vo->setEstoqueMin($_POST['AlteraProdEstoqueMin']);
    $vo->setEstoque($_POST['AlteraProdEstoque']);
    $arquivos = $_FILES['Alteraarquivos'];

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
    $vo->setImagem($nomeDoArquivo);
    $vo->setImagemPath($path);
    $ret = $ctrl->AlterarProdutoController($vo);

    if ($_POST['btn_alterar'] == 'ajx') {
        echo $ret;
    } else {
        $produto = $ctrl->RetornarProdutoController();
    }
} else if (isset($_POST['btnExcluir'])) {
    $vo = new ProdutoVO;
    $vo->setID($_POST['ExcluirID']);
    $ret = $ctrl->ExcluirProdutoController($vo);

    if ($_POST['btnExcluir'] == 'ajx') {
        echo $ret;
    } else {
        $produto = $ctrl->RetornarProdutoController();
    }
} else if (isset($_POST['btnFiltrar']) && isset($_POST['FiltrarNome'])) {
    $nome_filtro = $_POST['FiltrarNome'];
    $produto = $ctrl->FiltrarProdutoController($nome_filtro);

    if (count($produto) > 0) { ?>
        <table class="table table-hover" id="tabela_result_produto">
            <thead>
                <tr>
                    <th>Ação</th>
                    <th>Codigo Barras</th>
                    <th>Descrição</th>
                    <th>Valor Compra</th>
                    <th>Valor Venda</th>
                    <th>Estoque Mínimo</th>
                    <th>Estoque</th>

                </tr>
            </thead>
            <tbody>
                <?php for ($i = 0; $i < count($produto); $i++) { ?>
                    <tr>
                        <td>
                            <a href="#" onclick="AlterarProdutoModal('<?= $produto[$i]['ProdID'] ?>', '<?= $produto[$i]['ProdDescricao'] ?>','<?= $produto[$i]['ProdDtCriacao'] ?>','<?= $produto[$i]['ProdCodBarra'] ?>','<?= $produto[$i]['ProdValorCompra'] ?>','<?= $produto[$i]['ProdValorVenda'] ?>','<?= $produto[$i]['ProdEstoqueMin'] ?>','<?= $produto[$i]['ProdEstoque'] ?>','<?= $produto[$i]['ProdImagem'] ?>')" data-toggle="modal" data-target="#alterarProduto"><i class="fas fa-edit"></i></a>
                            <a href="#" onclick="ExcluirModal('<?= $produto[$i]['ProdID'] ?>', '<?= $produto[$i]['ProdDescricao'] ?>')" data-toggle="modal" data-target="#modalExcluir"><i style="color:red" class="fas fa-trash-alt"></i></a>
                            <a href="relProdutoBarras.php?codbarras=<?= $produto[$i]['ProdCodBarra'] . '&nomeProduto=' . $produto[$i]['ProdDescricao'] ?>" target="_blank"><i title="Emitir Codigo de Barras" style=" color:red; font-size:14px; margin-left:1px" class="fa fa-barcode"></i></a>
                        </td>
                        <td><?= $produto[$i]['ProdCodBarra'] ?></td>
                        <td><?= $produto[$i]['ProdDescricao'] ?></td>
                        <td><?= $produto[$i]['ProdValorCompra'] ?></td>
                        <td><?= $produto[$i]['ProdValorVenda'] ?></td>
                        <td><?= $produto[$i]['ProdEstoqueMin'] ?></td>
                        <td><?= $produto[$i]['ProdEstoque'] ?></td>
                        <td><a href="../../Resource/dataview/<?= $produto[$i]['ProdImagemPath'] ?>" target="_blank" rel="noopener noreferrer"><img src="../../Resource/dataview/<?= $produto[$i]['ProdImagemPath'] ?>" alt="<?= $produto[$i]['ProdImagemPath'] ?>" class="brand-image img-circle elevation-3" width="50px" height="50px"></a></td>


                    </tr>
                <?php } ?>
            </tbody>
        </table>

    <?php } else {
        echo '<h4><center>Nenhum registro encontrado!</center><h4>';
    }
} else if (isset($_POST['btn_consultar']) && $_POST['btn_consultar'] == 'ajx') {
    $produto = $ctrl->RetornarProdutoController(); ?>

    <table class="table table-hover" id="tabela_result_produto">
        <thead>
            <tr>
                <th>Ação</th>
                <th>Codigo Barras</th>
                <th>Descrição</th>
                <th>Valor Compra</th>
                <th>Valor Venda</th>
                <th>Estoque Mínimo</th>
                <th>Estoque</th>
                <th>Imagem</th>

            </tr>
        </thead>
        <tbody>
            <?php for ($i = 0; $i < count($produto); $i++) { ?>
                <tr>
                    <td>
                        <a href="#" onclick="AlterarProdutoModal('<?= $produto[$i]['ProdID'] ?>', '<?= $produto[$i]['ProdDescricao'] ?>','<?= $produto[$i]['ProdDtCriacao'] ?>','<?= $produto[$i]['ProdCodBarra'] ?>','<?= $produto[$i]['ProdValorCompra'] ?>','<?= $produto[$i]['ProdValorVenda'] ?>','<?= $produto[$i]['ProdEstoqueMin'] ?>','<?= $produto[$i]['ProdEstoque'] ?>','<?= $produto[$i]['ProdImagem'] ?>')" data-toggle="modal" data-target="#alterarProduto"><i class="fas fa-edit"></i></a>
                        <a href="#" onclick="ExcluirModal('<?= $produto[$i]['ProdID'] ?>', '<?= $produto[$i]['ProdDescricao'] ?>')" data-toggle="modal" data-target="#modalExcluir"><i style="color:red" class="fas fa-trash-alt"></i></a>
                        <a href="relProdutoBarras.php?codbarras=<?= $produto[$i]['ProdCodBarra'] . '&nomeProduto=' . $produto[$i]['ProdDescricao'] ?>" target="_blank"><i title="Emitir Codigo de Barras" style=" color:red; font-size:14px; margin-left:1px" class="fa fa-barcode"></i></a>
                    </td>
                    <td><?= $produto[$i]['ProdCodBarra'] ?></td>
                    <td><?= $produto[$i]['ProdDescricao'] ?></td>
                    <td><?= $produto[$i]['ProdValorCompra'] ?></td>
                    <td><?= $produto[$i]['ProdValorVenda'] ?></td>
                    <td><?= $produto[$i]['ProdEstoqueMin'] ?></td>
                    <td><?= $produto[$i]['ProdEstoque'] ?></td>
                    <td><a href="../../Resource/dataview/<?= $produto[$i]['ProdImagemPath'] ?>" target="_blank" rel="noopener noreferrer"><img src="../../Resource/dataview/<?= $produto[$i]['ProdImagemPath'] ?>" alt="<?= $produto[$i]['ProdImagemPath'] ?>" class="brand-image img-circle elevation-3" width="50px" height="50px"></a></td>


                </tr>
            <?php } ?>
        </tbody>
    </table>

<?php } else {
    $produto = $ctrl->RetornarProdutoController();
} ?>