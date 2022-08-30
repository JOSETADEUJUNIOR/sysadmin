function ConsultarEmpresa() {
    $.ajax({
        type: "POST",
        url: BASE_URL_AJAX("meusdados_dataview"),
        data: {
            btnConsultar: 'ajx'
        }, success: function (tabela_preenchida) {
            $("#table_result_Empresa").html(tabela_preenchida);
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



$("#formAlt").on("submit", function(e){
    e.preventDefault();
   var formData = new FormData();
   formData.append("EmpNome",$("#nome").val());
   formData.append("EmpCNPJ",$("#cnpj").val());
   formData.append("EmpCep",$("#cep").val());
   formData.append("EmpEnd",$("#endereco").val());
   formData.append("EmpNumero",$("#numero").val());
   formData.append("EmpCidade",$("#cidade").val());
   formData.append("arquivos",$("#logo").prop("files")[0]);
   formData.append("btnAlterar",'ajx');
   $.ajax({
    type: "POST",
    url: BASE_URL_AJAX("meusdados_dataview"),
    data:
        formData,
        processData: false,
        contentType: false,
    success: function(ret){
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



   });












