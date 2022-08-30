<?php

require_once dirname(__DIR__, 3) . '/vendor/autoload.php';

use Src\Controller\EstadoController;
use Src\VO\EstadoVO;

$estado = new EstadoController;

if (isset($_POST['btn_cadastrar'])):
$vo = new EstadoVO;
$vo->setNomeEstado($_POST['estado']);
$ret = $estado->CadastrarEstado($vo);

endif;
