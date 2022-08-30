
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


function CadastrarCliente(id_form) {

    if (NotificarCampos(id_form)) {

        let nomeCliente = $("#nomeCliente").val();
        let dtnascimento = $("#dtnascimento").val();
        let telefone = $("#telefone").val();
        let email = $("#email").val();
        let cep = $("#cep").val();
        let endereco = $("#endereco").val();
        let numero = $("#numero").val();
        let bairro = $("#bairro").val();
        let cidade = $("#cidade").val();
        let estado = $("#estado").val();
        let descricao = $("#descricao").val();
        let ativo = $("#ativo").val();
        $.ajax({
            type: "POST",
            url: BASE_URL_AJAX("cliente_dataview"),
            data: {
                btn_cadastrar: 'ajx',
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
                RemoverLoad();
                if (ret == 1) {
                    MensagemSucesso();
                    LimparCampos(id_form);
                    ConsultarCliente();
                    $("#CadCliente").addClass('collapsed-card');
                    $("#CadClienteBody").hide();


                } else {
                    MensagemErro();
                }
            }
        })
    }
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