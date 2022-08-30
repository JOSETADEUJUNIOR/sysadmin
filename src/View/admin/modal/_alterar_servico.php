<div class="modal fade" id="alterarServico">
    <div class="modal-dialog modal-lg">
        <div class="modal-content bg-warning">
            <div class="modal-header">
                <h4 class="modal-title">Alterar Setor</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-10">
                        <div class="form-group">
                            <label>Nome</label>
                            <input type="hidden" name="AlteraID" id="AlteraID">
                            <input class="form-control obg" id="AlteraNome" name="AlteraNome" placeholder="Digite o aqui....">
                        </div>
                    </div>


                    <div class="col-md-2">
                        <div class="form-group">
                            <label>Preço</label>
                            <input class="form-control obg" id="AlteraValor" name="AlteraValor" placeholder="Digite o aqui....">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Descrição</label>
                            <textarea class="form-control" id="AlteraDescricao" name="AlteraDescricao" placeholder="Digite o aqui...."></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cancelar</button>
                <button name="btnAlterar" class="btn btn-outline-dark" onclick="return AlterarServico()">Salvar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>