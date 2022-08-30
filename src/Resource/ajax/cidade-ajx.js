function ConsultarCidade() {
    $.ajax({
        type: "POST",
        url: BASE_URL_AJAX("cidade_dataview"),
        data: {
            btn_consultar: 'ajx'
        }, success: function (tabela_preenchida) {
            $("#table_result_cidade").html(tabela_preenchida);
        }
    })
}

function Excluir() {
    let id = $("#ExcluirID").val();

    $.ajax({
        type: "POST",
        url: BASE_URL_AJAX("cidade_dataview"),
        data: {
            btn_excluir: 'ajx',
            ExcluirID: id
        }, success: function (ret) {
            $("#modalExcluir").modal("hide");
            if (ret == 1) {
                MensagemSucesso();
                ConsultarCidade();
            } else {
                MensagemExcluirErro();
            }
        }
    })
    return false;
}

function AlterarCidade() {
    let nomeCidade = $("#AlteraNome").val();
    let id = $("AlterarID").val();
    $.ajax({
        type: "POST",
        url: BASE_URL_AJAX("cidade_dataview"),
        data: {
            btn_alterar: 'ajx',
            AlteraID: id,
            AlteraNome: nomeCidade
        }, success: function (ret) {
            if (ret == 1) {
                MensagemSucesso();
                ConsultarCidade();
            } else {
                MensagemErro();
            }
        }
    })
    return false;
}

function CadastrarCidade(id_form) {
    
    if (NotificarCampos(id_form)) {

        let nomeCidade = $("#nome_cidade").val();
        let estadoID = $("#estado").val();
        
        $.ajax({
            type: "POST",
            url: BASE_URL_AJAX("cidade_dataview"),
            data: {
                btn_cadastrar: 'ajx',
                nome_cidade: nomeCidade,
                estado_id: estadoID
            }, success: function (ret) {
                RemoverLoad();
                if (ret == 1) {
                    MensagemSucesso();
                    LimparCampos(id_form);
                    ConsultarCidade();
                } else {
                    MensagemErro();
                }
            }
        })
    }
    return false;
}