
function ConsultarOs() {
    $.ajax({
        type: "POST",
        url: BASE_URL_AJAX("Os_dataview"),
        data: {
            OsID: $("#OsProdID").val(),
            btn_consultar: 'ajx'
        }, success: function (tabela_preenchida) {
            $("#tabela_result_os").html(tabela_preenchida);
        }
    })
}

function ConsultarItensOs(OsID) {
    let idProd = OsID
    $.ajax({
        type: "POST",
        url: BASE_URL_AJAX("Os_dataview"),
        data: {
            OsID: idProd,
            btn_consultar_item: 'ajx'
        }, success: function (tabela_preenchida) {
            $("#tabela_result_item").html(tabela_preenchida);
        }
    })
}

function ConsultarAnxOs(OsID) {
    let idProd = OsID
    $.ajax({
        type: "POST",
        url: BASE_URL_AJAX("Os_dataview"),
        data: {
            OsID: idProd,
            btn_consultar_anx: 'ajx'
        }, success: function (tabela_preenchida) {
            $("#tabela_result_anx").html(tabela_preenchida);
        }
    })
}

function ConsultarServOs(OsID) {
    let idServOS = OsID
    $.ajax({
        type: "POST",
        url: BASE_URL_AJAX("Os_dataview"),
        data: {
            OsID: idServOS,
            btn_consultar_serv: 'ajx'
        }, success: function (tabela_preenchida) {
            $("#tabela_result_item").html(tabela_preenchida);
        }
    })
}

function ExcluirItemOs() {
    let OsID = $("#ExcluirOsID").val();
    let id = $("#ExcluirID").val();
    let qtd = $("#ExcluirQtd").val();
    let produto = $("#ExcluirProdID").val();
    $.ajax({
        type: "POST",
        url: BASE_URL_AJAX("Os_dataview"),
        data: {
            btnExcluirItemOs: 'ajx',
            OsID: OsID,
            qtd: qtd,
            produto: produto,
            ExcluirID: id
        }, success: function (ret) {
            $("#modalExcluirItem").modal("hide");
            if (ret == 1) {
                MensagemSucesso();
                ConsultarItensOs(OsID);
                ConsultarServOs(OsID);
            } else {
                MensagemExcluirErro();
            }
        }
    })
    return false;
}

function Excluir() {
    let id = $("#ExcluirID").val();
    alert(OsID);
    $.ajax({
        type: "POST",
        url: BASE_URL_AJAX("Os_dataview"),
        data: {
            btnExcluir: 'ajx',
            ExcluirID: id
        }, success: function (ret) {
            $("#modalExcluir").modal("hide");
            if (ret == -2) {
                MensagemSucesso();
                ConsultarOS();
            } else {
                alert(ret);
                MensagemExcluirErro();
            }
        }
    })
    return false;
}

function ExcluirServ() {
    let OsID = $("#ExcluirOsID").val();
    let id = $("#ExcluirID").val();
    let qtd = $("#ExcluirQtd").val();
    alert(qtd);
    let servico = $("#ExcluirServID").val();
    $.ajax({
        type: "POST",
        url: BASE_URL_AJAX("Os_dataview"),
        data: {
            btnExcluirServ: 'ajx',
            OsID: OsID,
            qtd: qtd,
            servico: servico,
            ExcluirID: id
        }, success: function (ret) {
            $("#modalExcluirServ").modal("hide");
            if (ret == 1) {
                MensagemSucesso();
                ConsultarServOs(OsID);
            } else {
                MensagemExcluirErro();
            }
        }
    })
    return false;
}

function faturarOs(id) {
    let OsID = id;
    $.ajax({
        type: "POST",
        url: BASE_URL_AJAX("Os_dataview"),
        data: {
            btnFaturar: 'ajx',
            OsID: OsID,
        },
        success: function (ret) {
            if (ret == 1) {
                MensagemSucesso();
                ConsultarOs();

            } else {
                MensagemErro();
            }
        }
    })
    return false;
}

function CadastrarOs(id_form) {

    if (NotificarCampos(id_form)) {
        let OsID = $("#OsID").val();
        let Oscliente = $("#Oscliente").val();
        let tecnico = $("#tecnico").val();
        let status = $("#status").val();
        let dtInicial = $("#dtInicial").val();
        let dtFinal = $("#dtFinal").val();
        let garantia = $("#garantia").val();
        let descProd = $("#descProd").val();
        let defeito = $("#defeito").val();
        let obs = $("#obs").val();
        let laudo = $("#laudo").val();
        alert(status);
        $.ajax({
            type: "POST",
            url: BASE_URL_AJAX("Os_dataview"),
            data: {
                btn_cadastrar: 'ajx',
                Oscliente: Oscliente,
                tecnico: tecnico,
                status: status,
                dtInicial: dtInicial,
                dtFinal: dtFinal,
                garantia: garantia,
                descProd: descProd,
                defeito: defeito,
                obs: obs,
                laudo: laudo,
                OsID: OsID
            },
            success: function (ret) {
                RemoverLoad();
                if (ret == 1) {
                    MensagemSucesso();
                    LimparCampos(id_form);
                    ConsultarOs();
                    $("#CadOs").addClass('collapsed-card');
                    window.location.replace("ordem_servico.php")
                } else {
                    MensagemErro();
                }
            }
        })
    }
    return false;
}

function InserirAnxOs(form_id) {
    if (NotificarCampos(form_id)) {
        var formData = new FormData();
        formData.append("anxOsID", $("#OsAnxID").val());
        formData.append("anxNome", $("#anxNome").val());
        formData.append("arquivos", $("#anxImagem").prop("files")[0]);
        formData.append("btnAddAnx", 'ajx');
                
        $.ajax({
            type: "POST",
            url: BASE_URL_AJAX("Os_dataview"),
            data:
                formData,
            processData: false,
            contentType: false,
            success: function (ret) {
                alert(ret);
               RemoverLoad();
                if (ret == 1) {
                    MensagemSucesso();
                    ConsultarAnxOs(OsID);
                } else if (ret == -13) {
                    alert('Estoque inferior');
                    MensagemErro();
                }
            }
        })
    }
    return false;
}

function InserirProd(form_id) {
    if (NotificarCampos(form_id)) {
        let produto = $("#produto").val();
        let qtdProd = $("#qtdProd").val();
        let OsID = $("#OsProdID").val();

        $.ajax({
            type: "POST",
            url: BASE_URL_AJAX("Os_dataview"),
            data: {
                btn_addItem: 'ajx',
                produto: produto,
                qtdProd: qtdProd,
                OsID: OsID


            },
            success: function (ret) {
                RemoverLoad();
                if (ret == 1) {
                    MensagemSucesso();
                    $("#produto").val('');
                    $("#qtdProd").val('');
                    ConsultarItensOs(OsID);
                    ConsultarServOs(OsID);
                } else if (ret == -13) {
                    alert('Estoque inferior');
                    MensagemErro();
                }
            }
        })
    }
    return false;
}



function InserirServ(form_id) {
    if (NotificarCampos(form_id)) {
        let servico = $("#servico").val();
        let qtdServ = $("#qtdServ").val();
        let OsID = $("#OsProdID").val();

        $.ajax({
            type: "POST",
            url: BASE_URL_AJAX("Os_dataview"),
            data: {
                btn_addServ: 'ajx',
                servico: servico,
                qtdServ: qtdServ,
                OsID: OsID
            },
            success: function (ret) {
                RemoverLoad();
                if (ret == 1) {
                    MensagemSucesso();
                    $("#servico").val('');
                    $("#qtdServ").val('');
                    ConsultarServOs(OsID);

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