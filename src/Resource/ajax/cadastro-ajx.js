function CadastrarUsuario(id_form) {
    if (NotificarCampos(id_form)) {

        let usernome = $("#nome").val();
        let userlogin = $("#login").val();
        let usersenha = $("#senha").val();
        let usertelefone = $("#telefone").val();
        

        $.ajax({
            type: "POST",
            url: BASE_URL_AJAX("usuario_dataview"),
            data: {
                btn_cadastrar: 'ajx',
                nome: usernome,
                login: userlogin,
                senha: usersenha,
                telefone: usertelefone
            },
            success: function (ret) {
               RemoverLoad();
                if(ret == '1') {
                MensagemSucesso();
                LimparCampos(id_form);
                }else{
                    MensagemErro();
                }
            
            }
        })

    }

    return false;
}

function ValidarLogin(id_form){
alert('entrou');
    if (NotificarCampos(id_form)) {
        
        let login = $("#login").val();
        let senha = $("#senha").val();

        $.ajax({
            type: "POST",
            url: BASE_URL_AJAX("usuario_dataview"),
            data: {
                btn_login: 'ajx',
                login: login,
                senha: senha
            }, success: function(ret){
                if (ret == '1') {
                    MensagemSucesso();

                }else if(ret == '-5'){
                    alert('caiu aqui');
                    MensagemErro();
                }
            }
        })
    }
    return false;
}