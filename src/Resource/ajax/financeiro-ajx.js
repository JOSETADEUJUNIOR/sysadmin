function ConsultarLancamentos(id_form) {
    if (NotificarCampos(id_form)) {
    let tipo = $("#tipo").val();
    let dtInicio = $("#dtInicio").val();
    let dtFinal = $("#dtFinal").val();
    $.ajax({
        type: "POST",
        url: BASE_URL_AJAX("financeiro_dataview"),
        data: {
            btn_consultar: 'ajx',
            tipo: tipo,
            dtInicio: dtInicio,
            dtFinal: dtFinal
        }, success: function (tabela_preenchida) {
          if (tabela_preenchida !="") {
            $("#tabela_result_financeiro").html(tabela_preenchida);
          }
          
        }
    })
}
return false;
}





function ConsultarCliente() {
    $.ajax({
        type: "POST",
        url: BASE_URL_AJAX("cliente_dataview"),
        data: {
            btn_consultar: 'OK'
        }, success: function (tabela_preenchida) {
            $("#tabela_result_cliente").html(tabela_preenchida);
        }
    })
}


function Excluir() {
    let id = $("#ExcluirID").val();
    $.ajax({
        type: "POST",
        url: BASE_URL_AJAX("financeiro_dataview"),
        data: {
            btnExcluir: 'ajx',
            ExcluirID: id
        }, success: function (ret) {
        alert(ret);
            $("#modalExcluir").modal("hide");
            if (ret == 1) {
                MensagemSucesso();
            } else {
                MensagemExcluirErro();
            }
        }
    })
    return false;
}

function AlterarCliente() {
    let CliID = $("#AlteraID").val();
    let nomeCliente = $("#Alteranome").val();
    let dtnascimento = $("#Alteradtnascimento").val();
    let telefone = $("#Alteratelefone").val();
    let email = $("#Alteraemail").val();
    let cep = $("#Alteracep").val();
    let endereco = $("#Alteraendereco").val();
    let numero = $("#Alteranumero").val();
    let bairro = $("#Alterabairro").val();
    let cidade = $("#Alteracidade").val();
    let estado = $("#Alteraestado").val();
    let descricao = $("#Alteradescricao").val();
    let ativo = $("#Alteraativo").val();
    $.ajax({
        type: "POST",
        url: BASE_URL_AJAX("cliente_dataview"),
        data: {
            btnAlterar: 'ajx',
            AlteraID: CliID,
            nomeCliente: nomeCliente,
            dtnascimento: dtnascimento,
            telefone: telefone,
            email: email,
            cep: cep,
            endereco: endereco,
            numero: numero,
            bairro: bairro,
            cidade: cidade,
            estado: estado,
            descricao: descricao,
            ativo: ativo
        },
        success: function (ret) {
            $("#alterarCliente").modal("hide");
            if (ret == 1) {
                MensagemSucesso();
                ConsultarCliente();

            } else {
                MensagemErro();
            }
        }
    })
    return false;
}


function NovaReceita(id_form) {
    let tipo = 1;
    let descricao = $("#descricao").val();
    let cliente = $("#faturaCliente").val();
    let valor = $("#faturaValor").val();
    let dtVencimento = $("#faturaDtVenc").val();
    let dtPgto = $("#faturaDtPgto").val();
    let formPgto = $("#FaturaFormPgto").val();
    $.ajax({
        type: "POST",
        url: BASE_URL_AJAX("financeiro_dataview"),
        data: {
            btn_inserir: 'ajx',
            descricao: descricao,
            cliente: cliente,
            valor: valor,
            dtVencimento: dtVencimento,
            dtPgto: dtPgto,
            formPgto: formPgto,
            tipo: tipo
        },
        success: function (ret) {
            $("#faturar").modal('hide');
            RemoverLoad();
            if (ret == 1) {
                MensagemSucesso();
             
            } else {
                MensagemErro();
            }
        }
    })
    return false;
}

function AlterarReceita(id_form) {
    let tipo = 1;
    let id = $("#AlterafaturaID").val();
    let descricao = $("#AlteraDescricao").val();
    let cliente = $("#AlterafaturaCliente").val();
    let valor = $("#AlterafaturaValor").val();
    let desconto = $("#AlteraDesconto").val();
    let dtVencimento = $("#AlterafaturaDtVenc").val();
    let dtPgto = $("#AlterafaturaDtPgto").val();
    let formPgto = $("#FaturaFormPgto").val();
    $.ajax({
        type: "POST",
        url: BASE_URL_AJAX("financeiro_dataview"),
        data: {
            btn_alterar: 'ajx',
            ID: id,
            descricao: descricao,
            cliente: cliente,
            valor: valor,
            desconto: desconto,
            dtVencimento: dtVencimento,
            dtPgto: dtPgto,
            formPgto: formPgto,
            tipo: tipo
        },
        success: function (ret) {
            $("#Alterafatura").modal('hide');
            RemoverLoad();
            if (ret == 1) {
                MensagemSucesso();
            
            } else {
                MensagemErro();
            }
        }
    })
    return false;
}




function NovaDespesa(id_form) {
    let tipo = 2;
    let descricao = $("#DespDescricao").val();
    let cliente = $("#DespCliente").val();
    let valor = $("#DespValor").val();
    let dtVencimento = $("#DespDtVenc").val();
    let dtPgto = $("#DespDtPgto").val();
    let formPgto = $("#DespFormPgto").val();
    $.ajax({
        type: "POST",
        url: BASE_URL_AJAX("financeiro_dataview"),
        data: {
            btn_inserir: 'ajx',
            descricao: descricao,
            cliente: cliente,
            valor: valor,
            dtVencimento: dtVencimento,
            dtPgto: dtPgto,
            formPgto: formPgto,
            tipo: tipo
        },
        success: function (ret) {
            $("#FaturaDespesa").modal('hide');
            RemoverLoad();
            if (ret == 1) {
                MensagemSucesso();
                ConsultarCliente();
                $("#CadCliente").addClass('collapsed-card');
                $("#CadClienteBody").hide();


            } else {
                MensagemErro();
            }
        }
    })
    return false;
}

function AlterarDespesa(id_form) {
    let tipo = 2;
    let id = $("#AlteraDespID").val();
    let descricao = $("#AlteraDespDescricao").val();
    let cliente = $("#AlteraDespCliente").val();
    let valor = $("#AlteraDespValor").val();
    let dtVencimento = $("#AlteraDespDtVenc").val();
    let dtPgto = $("#AlteraDespDtPgto").val();
    let formPgto = $("#AlteraDespFormPgto").val();
    $.ajax({
        type: "POST",
        url: BASE_URL_AJAX("financeiro_dataview"),
        data: {
            btn_alterar_desp: 'ajx',
            ID: id,
            descricao: descricao,
            cliente: cliente,
            valor: valor,
            dtVencimento: dtVencimento,
            dtPgto: dtPgto,
            formPgto: formPgto,
            tipo: tipo
        },
        success: function (ret) {
            $("#Alterar_despesa").modal('hide');
            RemoverLoad();
            if (ret == 1) {
                MensagemSucesso();
                
            } else {
                MensagemErro();
            }
        }
    })
    return false;
}


function FiltrarCliente(nome_filtro) {
    $.ajax({
        type: "POST",
        url: BASE_URL_AJAX("cliente_dataview"),
        data: {
            btnFiltrar: 'ajx',
            FiltrarNome: nome_filtro
        }, success: function (dados) {
            $("#tabela_result_cliente").html(dados);
        }
    })
}