function RetornarMsg(n) {


    var msg = "";

    switch (n) {
        case -8:
            msg = "Para cancelar, precisa excluir produtos e serviços da OS!";
            break;
        case -7:
            msg = "Os sem *valor, não será possível faturar!";
            break;
        case -6:
            msg = "E-mail digitado já existe!";
            break;
        case -5:
            msg = "Senhas não conferem!";
            break;
        case -4:
            msg = "Login ou senha inválidos!";
            break;
        case -2:
            msg = "Erro ao tentar excluir, itens em uso";
            break;
        case -1:
            msg = "ocorreu um erro na operação, tente mais tarde";
            break;
        case 0:
            msg = "Preencher o(s) campo(s) obrigatorio(s)";
            break;
        case 1:
            msg = "Ação realizada com sucesso";
            break;
        default:
            break;
    }

    return msg;
}

function MensagemCamposObrigatorios() {
    toastr.warning(RetornarMsg(0));
}
function MensagemSucesso() {
    toastr.success(RetornarMsg(1));
}
function MensagemErro() {
    toastr.error(RetornarMsg(-1));
}
function MensagemExcluirErro() {
    toastr.error(RetornarMsg(-2));
}
function MensagemLogin() {
    toastr.warning(RetornarMsg(-4));
}
function MensagemSenhaDiferente() {
    toastr.warning(RetornarMsg(-5));
}
function MensagemEmailExiste() {
    toastr.warning(RetornarMsg(-6));
}
function MensagemFaturarSemValor() {
    toastr.warning(RetornarMsg(-7));
}
function MensagemLimparOs() {
    toastr.warning(RetornarMsg(-8));
}



