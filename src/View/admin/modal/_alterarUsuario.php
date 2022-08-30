<div class="modal fade" id="alterarUsuario">
    <div class="modal-dialog modal-lg">
        <div class="modal-content bg-white">
            <div class="modal-header">
                <h4 class="modal-title">Alterar Dados Usuario</h4>
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
                            <input type="text" name="nomeUser" id="nomeUser" class="form-control obg" placeholder="nome">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Login</label>
                            <input type="text" name="login" id="login" class="form-control obg" placeholder="login">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Senha</label>
                            <input type="text" name="senha" id="senha" class="form-control obg" placeholder="senha">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Telefone</label>
                            <input type="text" name="telefone" id="telefone" class="form-control obg" placeholder="telefone" data-inputmask='"mask": "(99) 9 9999-9999"' data-mask>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Foto do Login </label>
                            <div class="custom-file">
                                <input type="file" name="userlogo" id="userlogo" value="<?= $user[0]['UserLogo']?>" class="custom-file-input">
                                <label class="custom-file-label" for="customFile">escolher a foto</label>
                            </div>
                        </div>
                    </div>
  

                </div>

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cancelar</button>
                <button name="btnAlterarUser" class="btn btn-outline-dark" >Salvar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>