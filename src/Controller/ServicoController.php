<?php

namespace Src\Controller;

use Src\Model\ServicoDAO;
use Src\VO\ServicoVO;
use Src\_public\Util;


class ServicoController
{

    private $dao;

    public function __construct()
    {
        $this->dao = new ServicoDAO;
    }

    public function CadastrarServico(ServicoVO $vo): int
    {
        if (empty($vo->getNome()))
            return 0;

        $vo->setfuncao(CADASTRO_SERVICO);
        $vo->setIdLogado(Util::CodigoLogado());

        return $this->dao->CadastrarServico($vo);
    }

    public function FiltrarServicoController($nome_filtro)
    {
        return $this->dao->FiltrarServicoDAO($nome_filtro);
    }

    public function RetornarServicoController(): array
    {
        return $this->dao->RetornarServicoDAO();
    }

    public function AlterarServicoController(ServicoVO $vo): int
    {
        if (empty($vo->getNome()))
            return 0;

        $vo->setfuncao(ALTERA_SERVICO);
        $vo->setIdLogado(Util::CodigoLogado());

        return $this->dao->AlterarServicoDAO($vo);
    }

    public function ExcluirServicoController(ServicoVO $vo): int
    {
        if (empty($vo->getID()))
            return 0;

        $vo->setfuncao(EXCLUI_SERVICO);
        $vo->setIdLogado(Util::CodigoLogado());
        return $this->dao->ExcluirServicoDAO($vo);
    }
}
