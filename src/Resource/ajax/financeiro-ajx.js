
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
        url: BASE_URL_AJAX("cliente_dataview"),
        data: {
            btnExcluir: 'ajx',
            ExcluirID: id
        }, success: function (ret) {
            $("#modalExcluir").modal("hide");
            if (ret == 1) {
                MensagemSucesso();
                ConsultarCliente();
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
    alert(formPgto);
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
            alert(ret);
            $("#faturar").modal('hide');
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