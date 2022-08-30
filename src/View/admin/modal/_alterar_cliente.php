<div class="modal fade" id="alterarCliente">
    <div class="modal-dialog modal-lg">
        <div class="modal-content bg-white">
            <div class="modal-header bg-secondary">
                <h4 class="modal-title">Alterar Cliente</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-10">
                        <div class="form-group">
                            <label>Nome</label>
                            <input type="hidden" name="AlteraID" id="AlteraID">
                            <input class="form-control obg" id="Alteranome" name="Alteranome" placeholder="Digite o aqui....">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>Ativo?</label>
                            <select class="form-control obg" id="Alteraativo" name="Alteraativo">
                                <option value="">Selecione</option>
                                <option value="A">Sim</option>
                                <option value="I">Não</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Data nascimento</label>
                            <input type="date" class="form-control obg" id="Alteradtnascimento" name="Alteradtnascimento" placeholder="Digite o aqui....">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Telefone</label>
                            <input type="phone" class="form-control obg" id="Alteratelefone" name="Alteratelefone" placeholder="Digite o aqui...." data-inputmask='"mask": "(99) 9 9999-9999"' data-mask >
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>E-mail</label>
                            <input type="e-mail" class="form-control obg" id="Alteraemail" name="Alteraemail" placeholder="Digite o aqui....">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>Cep</label>
                            <input class="form-control obg" id="Alteracep" name="Alteracep" placeholder="Digite o aqui...." data-inputmask='"mask": "99.999-999"' data-mask >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Endereço</label>
                            <input class="form-control obg" id="Alteraendereco" name="Alteraendereco" placeholder="Digite o aqui....">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Numero</label>
                            <input class="form-control obg" id="Alteranumero" name="Alteranumero" placeholder="Digite o aqui....">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Bairro</label>
                            <input class="form-control obg" id="Alterabairro" name="Alterabairro" placeholder="Digite o aqui....">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Cidade</label>
                            <input class="form-control obg" id="Alteracidade" name="Alteracidade" placeholder="Digite o aqui....">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Estado</label>
                            <input class="form-control obg" id="Alteraestado" name="Alteraestado" placeholder="Digite o aqui....">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Descrição</label>
                            <textarea class="form-control obg" id="Alteradescricao" name="Alteradescricao" placeholder="Digite o aqui...."></textarea>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cancelar</button>
                <button name="btnAlterar" class="btn btn-outline-dark" onclick="return AlterarCliente()">Salvar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>