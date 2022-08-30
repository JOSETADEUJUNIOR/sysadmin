
function ConsultarServico() {
    $.ajax({
        type: "POST",
        url: BASE_URL_AJAX("servico_dataview"),
        data: {
            btn_consultar: 'ajx'
        }, success: function (tabela_preenchida) {
            $("#tabela_result_servico").html(tabela_preenchida);
        }
    })
}

function Excluir() {
    let id = $("#ExcluirID").val();
    $.ajax({
        type: "POST",
        url: BASE_URL_AJAX("servico_dataview"),
        data: {
            btnExcluir: 'ajx',
            ExcluirID: id
        }, success: function (ret) {
            $("#modalExcluir").modal("hide");
            if (ret == 1) {
                MensagemSucesso();
                ConsultarServico();
            } else {
                MensagemExcluirErro();
            }
        }
    })
    return false;
}

function AlterarServico() {
    let ServID = $("#AlteraID").val();
    let ServNome = $("#AlteraNome").val();
    let ServValor = $("#AlteraValor").val();
    let ServDescricao = $("#AlteraDescricao").val();

    $.ajax({
        type: "POST",
        url: BASE_URL_AJAX("servico_dataview"),
        data: {
            btnAlterar: 'ajx',
            ServID: ServID,
            ServNome: ServNome,
            ServValor: ServValor,
            ServDescricao: ServDescricao

        },
        success: function (ret) {
            $("#alterarServico").modal("hide");
            if (ret == 1) {
                MensagemSucesso();
                ConsultarServico();

            } else {
                MensagemErro();
            }
        }
    })
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

function FiltrarServico(nome_filtro) {
    $.ajax({
        type: "POST",
        url: BASE_URL_AJAX("servico_dataview"),
        data: {
            btnFiltrar: 'ajx',
            FiltrarNome: nome_filtro
        }, success: function (dados) {
            $("#tabela_result_servico").html(dados);
        }
    })
}