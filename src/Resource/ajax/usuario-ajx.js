function ConsultarUsuario() {
    alert('chamou');
    $.ajax({
        type: "POST",
        url: BASE_URL_AJAX("meusdados_dataview"),
        data: {
            btnConsultarUsuario: 'ajx'
        }, success: function (tabela_preenchida) {
            $("#table_result_Usuario").html(tabela_preenchida);
        }
    })
}


function AlterarEmpresaFile(){
    
    $.ajax({
        type: "POST",
        enctype: 'multipart/form-data',
        url: BASE_URL_AJAX("meus_dados.php"),
        data: {
           btn_alt: 'ajx',
            arquivos: formData
           
        }, success: function(ret){
            alert(ret);
            $("#alterarEmpresa").modal("hide");
            if(ret == 1){
                MensagemSucesso();
                LimparCampos();
                ConsultarEmpresa();
               
            }else{
                MensagemErro();
            }
        }
    })
    return false;
}



$("#formAltUser").on("submit", function(e){
    e.preventDefault();
   var formData = new FormData();
   formData.append("nome",$("#nomeUser").val());
   formData.append("login",$("#login").val());
   formData.append("senha",$("#senha").val());
   formData.append("telefone",$("#telefone").val());
   formData.append("arquivos",$("#userlogo").prop("files")[0]);
   formData.append("btnAlterarUser",'ajx');
   alert($("#logo").prop("files")[0]);
   $.ajax({
    type: "POST",
    url: BASE_URL_AJAX("meusdados_dataview"),
    data:
        formData,
        processData: false,
        contentType: false,
    success: function(ret){
        $("#alterarUsuario").modal("hide");
        if(ret == 1){
            MensagemSucesso();
            LimparCampos();
            ConsultarUsuario();
           
        }else{
            MensagemErro();
        }
    }
})
return false;



   });












