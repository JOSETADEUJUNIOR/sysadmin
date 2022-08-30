<?php

namespace Src\Controller;

use Src\Model\AlocarDAO;
use Src\VO\AlocarVO;


class AlocarEquipamentoController
{

    public function CadastrarLocacao(AlocarVO $vo): int
    {
        //if (empty($vo->getSituacao()) || empty($vo->getDataAlocacao()) || empty($vo->getDataRemocao()) || empty($vo->getEquipamentoID()) || empty($vo->getSetorID())) :
        if (empty($vo->getEquipamentoID()) || empty($vo->getSetorID())) :
            return 0;
        endif;
        return 1;
    }
}
