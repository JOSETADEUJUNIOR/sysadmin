<div class="modal fade" id="alterarProduto">
    <div class="modal-dialog modal-lg">
        <div class="modal-content bg-warning">
            <div class="modal-header">
                <h4 class="modal-title">Alterar Produto</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Codigo de Barras</label>
                            <input type="hidden" name="AlteraID" id="AlteraID">
                            <input class="form-control obg" id="alterabarra" name="alterabarra" placeholder="Digite o aqui....">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label>Descrição</label>
                            <input class="form-control obg" id="alteradesc" name="alteradesc" placeholder="Digite o aqui....">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Data Cadastro</label>
                            <input type="date" class="form-control obg" id="alteradtcad" name="alteradtcad" placeholder="Digite o aqui....">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>Vlr Compra</label>
                            <input type="text" class="form-control obg" id="alteravcomp" name="alteravcomp" placeholder="Digite o aqui....">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>Vlr Venda</label>
                            <input type="text" class="form-control obg" id="alteravvend" name="alteravvend" placeholder="Digite o aqui....">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>Estoque</label>
                            <input class="form-control obg" id="alteraest" name="alteraest" placeholder="Digite o aqui....">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>Estoque Mínimo</label>
                            <input class="form-control obg" id="alteraestmin" name="alteraestmin" placeholder="Digite o aqui....">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Imagem do produto </label>
                            <div class="custom-file">
                                <input type="file" name="alteraimg" id="alteraimg" class="custom-file-input">
                                <label class="custom-file-label" for="customFile">escolher Imagem</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cancelar</button>
                <button name="btn_alterar" class="btn btn-outline-dark" onclick="return AlterarProduto('form_alt_prod')">Salvar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>