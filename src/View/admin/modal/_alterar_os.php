
<div class="modal fade" id="alterarOs">
    <div class="modal-dialog modal-lg">
        <div class="modal-content bg-white">
            <div class="modal-header bg-secondary">
                <h4 class="modal-title">Alterar Setor</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Cliente</label>
                            <input type="hidden" name="AlteraID" id="AlteraID" >
                            <select class="select2bs4 obg" data-placeholder="Selecione o cliente" id="AlteraOscliente" name="AlteraOscliente" style="width: 100%;">
                                <option selected></option>
                                <?php foreach ($clientes as $cliente) { ?>
                                    <option value="<?= $cliente['CliID'] ?>"><?= $cliente['CliNome'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Técnico</label>
                                        <input class="form-control obg" id="Alteratecnico" name="Alteratecnico">
                                    </div>
                                </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control obg" id="Alterastatus" name="Alterastatus">
                                <option value="O">Orçamento</option>
                                <option value="A">Aberto</option>
                                <option value="EA">Em andamento</option>
                                <option value="F">Finalizado</option>
                                <option value="C">Cancelado</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Data inicial</label>
                            <input type="date" class="form-control obg" id="AlteradtInicial" name="AlteradtInicial" placeholder="Digite o aqui....">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Data final</label>
                            <input type="date" class="form-control obg" id="AlteradtFinal" name="AlteradtFinal" placeholder="Digite o aqui....">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Garantia</label>
                            <input class="form-control obg" id="Alteragarantia" name="Alteragarantia" placeholder="Digite o aqui....">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Descrição do Produto/Serviço</label>
                            <textarea class="form-control obg" id="AlteradescProd" name="AlteradescProd" placeholder="Digite o aqui...."></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Defeito</label>
                            <textarea class="form-control obg" id="Alteradefeito" name="Alteradefeito" placeholder="Digite o aqui...."></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Observações</label>
                            <textarea class="form-control " id="Alteraobs" name="Alteraobs" placeholder="Digite o aqui...."></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Laudo Técnico</label>
                            <textarea class="form-control" id="Alteralaudo" name="Alteralaudo" placeholder="Digite o aqui...."></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button name="btnAlterar" class="btn btn-success col-md-6" onclick="return AlterarOs('form_alt_os')">Salvar</button>
                <button type="button" class="btn btn-warning col-md-6" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>