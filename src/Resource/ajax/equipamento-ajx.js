
function ConsultarEquipamentos(id_form) {
    if (NotificarCampos(id_form)) {
    let tipo = $("#tipo").val();
    let filtro_palavra = $("#filtro_palavra").val();
    $.ajax({
        type: "POST",
        url: BASE_URL_AJAX("equipamento_dataview"),
        data: {
            btn_consultar: 'ajx',
            BuscarTipo: tipo,
            filtro_palavra: filtro_palavra
        }, success: function (tabela_preenchida) {
          if (tabela_preenchida !="") {
            $("#tabela_result_equipamento").html(tabela_preenchida);
            $("#divResult").show();
          }else{
            $("#tabela_result_equipamento").html('');
            $("#divResult").hide();
          }
          
        }
    })
}
return false;
}

function Excluir(){
    let id = $("#ExcluirID").val();
    $.ajax({
        type: "POST",
        url: BASE_URL_AJAX("modelo_dataview"),
        data: {
            btnExcluir: 'ajx',
            ExcluirID: id
        }, success: function(ret){
            $("#modalExcluir").modal("hide");
            if(ret == 1) {
                MensagemSucesso();
                ConsultarModelo();
            }else{
                MensagemExcluirErro();
            }
        }
    })
    return false;
}

function AlterarModelo() {
    let nome = $("#AlteraNome").val();
    let id = $("#AlteraID").val();
    $.ajax({
        type: "POST",
        url: BASE_URL_AJAX("modelo_dataview"),
        data: {
            btnAlterar: 'ajx',
            AlteraID: id,
            AlteraNome: nome
        },
        success: function (ret) {
            $("#alterarModelo").modal("hide");
            if (ret == 1) {
                MensagemSucesso();
                ConsultarModelo();

            } else {
                MensagemErro();
            }
        }
    })
    return false;
}


function CadastrarEquipamento(id_form) {

    if (NotificarCampos(id_form)) {

        let modelo = $("#modelo").val();
        let tipoequip = $("#tipo").val();
        let identificacao = $("#identificacao").val();
        let descricao = $("#descricao").val();


        $.ajax({
            type: "POST",
            url: BASE_URL_AJAX("equipamento_dataview"),
            data: {
                btn_cadastrar: 'ajx',
                modelo: modelo,
                tipoequip: tipoequip,
                identificacao: identificacao,
                descricao: descricao
            },
            success: function (ret) {
                RemoverLoad();
                if (ret == 1) {
                    MensagemSucesso();
                    LimparCampos(id_form);
                 
                } else {
                    MensagemErro();
                }
            }
        })
    }
    return false;
}


