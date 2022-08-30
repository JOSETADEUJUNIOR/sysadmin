function ConsultarSetor() {
    $.ajax({
        type: "POST",
        url: BASE_URL_AJAX("setor_dataview"),
        data: {
            btn_consultar: 'ajx'
        }, success: function (tabela_preenchida) {
            $("#table_result_Setor").html(tabela_preenchida);
        }
    })
}

function Excluir(){

    let id = $("#ExcluirID").val();

    $.ajax({
        type: "POST",
        url: BASE_URL_AJAX("setor_dataview"),
        data: {
            btnExcluir: 'ajx',
            ExcluirID: id
        }, success: function(ret){
            $("#modalExcluir").modal("hide");
            if (ret==1) {
                MensagemSucesso();
                ConsultarSetor();
            }else{
                MensagemExcluirErro();
            }
        }
    })
    return false;

}


function AlterarSetor(){
    let nome = $("#AlteraNome").val();
    let id = $("#AlteraID").val();
    $.ajax({
        type: "POST",
        url: BASE_URL_AJAX("setor_dataview"),
        data: {
            btnAlterar: 'ajx',
            AlteraID: id,
            AlteraNome: nome
        }, success: function(ret){
            $("#alterarSetor").modal("hide");
            if(ret == 1){
                MensagemSucesso();
                LimparCampos();
                ConsultarSetor();
            }else{
                MensagemErro();
            }
        }
    })
    return false;
}


function CadastrarSetor(id_form) {
    
    if (NotificarCampos(id_form)) {

        let nome_cad = $("#nome").val();
        $.ajax({
            type: "POST",
            url: "../../Resource/dataview/setor_dataview.php",
            data: {
                btn_cadastrar: 'ajx',
                nome: nome_cad
            },
            success: function (ret) {
               RemoverLoad();
                if(ret == '1') {
                MensagemSucesso();
                LimparCampos(id_form);
                ConsultarSetor();
                }else{
                    MensagemErro();
                }
            
            }
        })

    }

    return false;
}