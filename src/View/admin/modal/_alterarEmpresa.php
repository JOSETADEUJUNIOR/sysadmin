<div class="modal fade" id="alterarEmpresa">
    <div class="modal-dialog modal-lg">
        <div class="modal-content bg-white">
            <div class="modal-header">
                <h4 class="modal-title">Alterar Dados Empresa</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <input type="hidden" name="EmpID" id="EmpID">
                            <label>Nome</label>
                            <input type="text" name="nome" id="nome" class="form-control obg" placeholder="nome">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>CNPJ</label>
                            <input type="text" name="cnpj" id="cnpj" class="form-control obg" placeholder="CNPJ" data-inputmask='"mask": "99.999.999/9999-99"' data-mask>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label>Cep</label>
                            <input type="text" name="cep" id="cep" class="form-control obg" placeholder="cep" data-inputmask='"mask": "99.999-999"' data-mask>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Endereço</label>
                            <input type="text" name="endereco" id="endereco" class="form-control obg" placeholder="endereço">
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label>Numero</label>
                            <input type="text" name="numero" id="numero" class="form-control obg" placeholder="número">
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label>Cidade</label>
                            <input type="text" name="cidade" id="cidade" class="form-control obg" placeholder="cidade">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <div class="custom-file">
                                <input type="file" name="logo" id="logo" value="<?= $dados[0]['EmpLogo']?>" class="custom-file-input">
                                <label class="custom-file-label" for="customFile">escolher a logo</label>
                            </div>
                        </div>
                    </div>



                </div>

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cancelar</button>
                <button name="btnAlterar" class="btn btn-outline-dark" >Salvar</button>
            </div>









        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>