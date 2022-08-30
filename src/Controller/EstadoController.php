<?php

namespace Src\Controller;

use Src\Model\EstadoDAO;
use Src\VO\EstadoVO;

class EstadoController{

    public function CadastrarEstado(EstadoVO $vo):int
    {
        if(empty($vo->getNomeEstado())):

            return 0;
        endif;
        return 1;
    }
}

