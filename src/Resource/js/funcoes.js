function load() {
    $("#divload").addClass("overlay").html('<i class="fas fa-2x fa-sync-alt fa-spin"> </i>');
}
function RemoverLoad() {
    $("#divload").removeClass("overlay").html('');
}

function AlterarSetorModal(id, nome) {
    $("#AlteraID").val(id);
    $("#AlteraNome").val(nome);
}
function AlterarModeloModal(id, nome) {
    $("#AlteraID").val(id);
    $("#AlteraNome").val(nome);
}

function ExcluirModal(id, nome) {
    $("#ExcluirID").val(id);
    $("#ExcluirNome").html(nome);
}
function ExcluirModalItem(OsID, id, nome, idProduto, qtd) {
    $("#ExcluirOsID").val(OsID);
    $("#ExcluirID").val(id);
    $("#ExcluirNome").html(nome);
    $("#ExcluirProdID").val(idProduto);
    $("#ExcluirQtd").val(qtd);
}
function ExcluirModalServ(OsID, id, nomeServ, idServ, qtd) {
    $("#ExcluirOsID").val(OsID);
    $("#ExcluirID").val(id);
    $("#ExcluirNomeServ").html(nomeServ);
    $("#ExcluirServID").val(idServ);
    $("#ExcluirQtd").val(qtd);
}

function AlterarTipoEquipamentoModal(id, nome) {
    $("#AlteraID").val(id);
    $("#AlteraNome").val(nome);
}
function AlterarServicoModal(id, nome, valor, descricao) {
    $("#AlteraID").val(id);
    $("#AlteraNome").val(nome);
    $("#AlteraValor").val(valor);
    $("#AlteraDescricao").val(descricao);
}
function AlterarEmpresaModal(id, nome, cnpj, endereco, cep, numero, cidade, EmpLogo) {
    $("#EmpID").val(id);
    $("#nome").val(nome);
    $("#cnpj").val(cnpj);
    $("#endereco").val(endereco);
    $("#cep").val(cep);
    $("#numero").val(numero);
    $("#cidade").val(cidade);
    $("#logo").val(EmpLogo);

}

function AlterarClienteModal(id, nome, dtnascimento, telefone, email, cep, endereco, numero, bairro, cidade, estado, descricao, status) {
    $("#AlteraID").val(id);
    $("#Alteranome").val(nome);
    $("#Alteradtnascimento").val(dtnascimento);
    $("#Alteratelefone").val(telefone);
    $("#Alteraemail").val(email);
    $("#Alteracep").val(cep);
    $("#Alteraendereco").val(endereco);
    $("#Alteranumero").val(numero);
    $("#Alterabairro").val(bairro);
    $("#Alteracidade").val(cidade);
    $("#Alteraestado").val(estado);
    $("#Alteradescricao").val(descricao);
    $("#Alteraativo").val(status);

}
function AlterarOsModal(id, dtInicial, dtFinal, garantia, descriProd, defeito, obs, clienteID, tecnicoID, Status, Laudo, clienteNome) {
    alert(clienteID);
    $("#AlteraID").val(id);
    $("#AlteradtInicial").val(dtInicial);
    $("#AlteradtFinal").val(dtFinal);
    $("#Alteragarantia").val(garantia);
    $("#AlteradescProd").val(descriProd);
    $("#Alteradefeito").val(defeito);
    $("#Alteraobs").val(obs);
    $("#AlteraOscliente").val(clienteID);
    $("#Alteratecnico").val(tecnicoID);
    $("#Alterastatus").val(Status);
    $("#Alteralaudo").val(Laudo);
    $("#NomeCli").val(clienteNome);
    

}

function AlterarUsuarioModal(id, nome, login, senha, telefone, UserLogo) {
    $("#EmpID").val(id);
    $("#nomeUser").val(nome);
    $("#login").val(login);
    $("#senha").val(senha);
    $("#telefone").val(telefone);
    $("#userlogo").val(UserLogo);

}
function AlterarProdutoModal(id, descricao, dtcriacao, codBarra, ValorCompra, ValorVenda, EstoqueMin, Estoque, Imagem) {
    $("#AlteraID").val(id);
    $("#alteradesc").val(descricao);
    $("#alteradtcad").val(dtcriacao);
    $("#alterabarra").val(codBarra);
    $("#alteravcomp").val(ValorCompra);
    $("#alteravvend").val(ValorVenda);
    $("#alteraest").val(Estoque);
    $("#alteraestmin").val(EstoqueMin);
    $("#alteraimg").val(Imagem);


}

function NotificarCampos(form_id) {

    var ret = true;

    $("#" + form_id + " input," + "#" + form_id + " select, " + "#" + form_id + " textarea").each(function () {

        if ($(this).hasClass("obg")) {
            if ($(this).val().trim() == "") {
                ret = false;
                $(this).addClass("is-invalid");
                $(this).focus();
            } else {
                $(this).removeClass("is-invalid").addClass('is-valid');
            }
        }
    });
    if (!ret)
        MensagemCamposObrigatorios();
    else
        load();

    return ret;
}
function LimparCampos(form_id) {

    $("#" + form_id + " input, select, textarea").each(function () {
        $(this).val('');

    });
}

function BASE_URL_AJAX(dataview) {
    return "../../Resource/dataview/" + dataview + ".php";
}

