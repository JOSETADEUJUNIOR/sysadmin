
function ConsultarProduto() {
    $.ajax({
        type: "POST",
        url: BASE_URL_AJAX("produto_dataview"),
        data: {
            btn_consultar: 'ajx'
        }, success: function (tabela_preenchida) {
            $("#tabela_result_produto").html(tabela_preenchida);
        }
    })
}

function Excluir() {
    let id = $("#ExcluirID").val();
    $.ajax({
        type: "POST",
        url: BASE_URL_AJAX("produto_dataview"),
        data: {
            btnExcluir: 'ajx',
            ExcluirID: id
        }, success: function (ret) {
            $("#modalExcluir").modal("hide");
            if (ret == 1) {
                MensagemSucesso();
                ConsultarProduto();
            } else {
                MensagemExcluirErro();
            }
        }
    })
    return false;
}

function AlterarProduto(id_form) {
    if (NotificarCampos(id_form)) {


        var formData = new FormData();
        formData.append("AlteraID", $("#AlteraID").val());
        formData.append("AlteraProdDescricao", $("#alteradesc").val());
        formData.append("AlteraProdDtCad", $("#alteradtcad").val());
        formData.append("AlteraProdCodBarra", $("#alterabarra").val());
        formData.append("AlteraProdValorCompra", $("#alteravcomp").val());
        formData.append("AlteraProdValorVenda", $("#alteravvend").val());
        formData.append("AlteraProdEstoque", $("#alteraest").val());
        formData.append("AlteraProdEstoqueMin", $("#alteraestmin").val());
        formData.append("Alteraarquivos", $("#alteraimg").prop("files")[0]);
        formData.append("btn_alterar", 'ajx');
        $.ajax({
            type: "POST",
            url: BASE_URL_AJAX("produto_dataview"),
            data:
                formData,
            processData: false,
            contentType: false,
            success: function (ret) {
                RemoverLoad();
                $("#alterarProduto").modal("hide");
                if (ret == 1) {
                    MensagemSucesso();
                    ConsultarProduto();

                } else {
                    MensagemErro();
                }
            }
        })
    }
    return false;
}

function CadastrarProduto(id_form) {

    if (NotificarCampos(id_form)) {


        var formData = new FormData();
        formData.append("ProdCodBarra", $("#codBarra").val());
        formData.append("ProdDescricao", $("#descricao").val());
        formData.append("ProdDtCad", $("#dtCad").val());
        formData.append("ProdValorCompra", $("#valorCompra").val());
        formData.append("ProdValorVenda", $("#valorVenda").val());
        formData.append("ProdEstoque", $("#estoque").val());
        formData.append("ProdEstoqueMin", $("#estoqueMin").val());

        formData.append("arquivos", $("#ProdImagem").prop("files")[0]);
        formData.append("btn_cadastrar", 'ajx');
        $.ajax({
            type: "POST",
            url: BASE_URL_AJAX("produto_dataview"),
            data:
                formData,
            processData: false,
            contentType: false,
            success: function (ret) {
                RemoverLoad();
                if (ret == 1) {
                    MensagemSucesso();
                    LimparCampos();
                    ConsultarProduto();
                    $("#CadProduto").addClass('collapsed-card');
                    $("#CadProdutoBody").hide();

                } else {
                    MensagemErro();
                }
            }
        })
    }
    return false;
}








function CadastrarServico(id_form) {

    if (NotificarCampos(id_form)) {

        let ServNome = $("#nomeServico").val();
        let ServValor = $("#valorServico").val();
        let ServDescricao = $("#DescServico").val();
        $.ajax({
            type: "POST",
            url: BASE_URL_AJAX("servico_dataview"),
            data: {
                btn_cadastrar: 'ajx',
                ServNome: ServNome,
                ServValor: ServValor,
                ServDescricao: ServDescricao

            },
            success: function (ret) {
                RemoverLoad();
                if (ret == 1) {
                    MensagemSucesso();
                    LimparCampos(id_form);
                    ConsultarServico();
                    $("#CadServico").addClass('collapsed-card');
                    $("#CadServicoBody").hide();


                } else {
                    MensagemErro();
                }
            }
        })
    }
    return false;
}

function FiltrarProduto(nome_filtro) {
    $.ajax({
        type: "POST",
        url: BASE_URL_AJAX("produto_dataview"),
        data: {
            btnFiltrar: 'ajx',
            FiltrarNome: nome_filtro
        }, success: function (dados) {
            $("#tabela_result_produto").html(dados);
        }
    })
}