function ConsultarVendas()
{
    $.ajax({
        type: "POST",
        url: BASE_URL_AJAX("Venda_dataview"),
        data: {
            btn_consultar_venda: 'ajx'
        }, success: function (tabela_preenchida) {
            $("#tabela_result_venda").html(tabela_preenchida);
        }
    })
}

function ConsultarItensVenda(VendaID) {
    let idProd = VendaID;
    $.ajax({
        type: "POST",
        url: BASE_URL_AJAX("Venda_dataview"),
        data: {
            VendaID: idProd,
            btn_consultar_item_venda: 'ajx'
        }, success: function (tabela_preenchida) {
            $("#tabela_result_item_venda").html(tabela_preenchida);
        }
    })
}


function CadastrarVenda(id_form) {
    let VendaID = $("#VendaID").val();
    let Vendacliente = $("#Vendacliente").val();
    let VendaDT = $("#VendaDT").val();
    $.ajax({
        type: "POST",
        url: BASE_URL_AJAX("Venda_dataview"),
        data: {
            btn_cadastrar: 'ajx',
            VendaID: VendaID,
            Vendacliente: Vendacliente,
            VendaDT: VendaDT
        },
        success: function (ret) {
            RemoverLoad();
            if (ret == 1) {
                MensagemSucesso();
                $("#CadVenda").addClass('collapsed-card');
                ConsultarVendas();       
            } else {
                MensagemErro();
            }
        }
    })

    return false;
}
function InserirProdVenda(form_id) {
    
    if (NotificarCampos(form_id)) {
        let produto = $("#produto").val();
        let qtdProd = $("#qtdProd").val();
        let VendaID = $("#VendaProdID").val();
        $.ajax({
            type: "POST",
            url: BASE_URL_AJAX("Venda_dataview"),
            data: {
                btn_addItem: 'ajx',
                produto: produto,
                qtdProd: qtdProd,
                VendaID: VendaID
            },
            success: function (ret) {
                RemoverLoad();
                if (ret == 1) {
                    MensagemSucesso();
                    $("#produto").val('');
                    $("#qtdProd").val('');
                    ConsultarItensVenda(VendaID);     
                } else if (ret == -13) {
                    alert('Você não possui estoque suficiênte!');
                    MensagemErro();
                }
            }
        })
    }
    return false;
}
function ExcluirItemVenda() {
    let VendaID = $("#ExcluirVendaID").val();
    let id = $("#ExcluirID").val();
    let qtd = $("#ExcluirQtd").val();
    let produto = $("#ExcluirProdID").val();
    $.ajax({
        type: "POST",
        url: BASE_URL_AJAX("Venda_dataview"),
        data: {
            btnExcluirItemVenda: 'ajx',
            VendaID: VendaID,
            qtd: qtd,
            produto: produto,
            ExcluirID: id
        }, success: function (ret) {
            $("#modalExcluirItemVenda").modal("hide");
            if (ret == 1) {
                MensagemSucesso();
                ConsultarItensVenda(VendaID);
            } else {
                MensagemExcluirErro();
            }
        }
    })
    return false;
}

function faturarVenda(id, clienteID, valor) {
    let VendaID = id;
    let CliID = clienteID;
    let VendaValor = valor;
    $.ajax({
        type: "POST",
        url: BASE_URL_AJAX("Venda_dataview"),
        data: {
            btnFaturar: 'ajx',
            VendaID: VendaID,
            CliID: CliID,
            VendaValor: VendaValor
        },
        success: function (ret) {
            if (ret == 1) {
                MensagemSucesso();
                window.location.href = "financeiro.php";  

            } else {
                MensagemErro();
            }
        }
    })
    return false;
}