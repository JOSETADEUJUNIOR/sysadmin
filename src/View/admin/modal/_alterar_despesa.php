<div class="modal fade" id="alterar_despesa">
    <div class="modal-dialog">
        <div class="modal-content bg-white">
            <div class="modal-header bg-danger">
                <h4 class="modal-title">Alterar Despesa</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Descrição</label>
                            <input type="hidden" name="AlteraDespID" id="AlteraDespID">
                            <input class="form-control obg" id="AlteraDespDescricao" name="AlteraDespDescricao" placeholder="Digite o aqui....">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Cliente</label>
                            <select class="form-control obg" id="AlteraDespCliente" name="AlteraDespCliente">
                                <option value="">Selecione</option>
                                <?php foreach ($cliente as $cl) { ?>
                                    <option value="<?= $cl['CliID'] ?>"><?= $cl['CliNome'] ?></option>
                                <?php } ?>

                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Valor</label>
                            <input type="text" class="form-control obg" id="AlteraDespValor" name="AlteraDespValor" placeholder="Digite o aqui....">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Dt Vencimento</label>
                            <input type="date" class="form-control obg" id="AlteraDespDtVenc" name="AlteraDespDtVenc" placeholder="Digite o aqui....">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Dt Pagamento</label>
                            <input type="date" class="form-control obg" id="AlteraDespDtPgto" name="AlteraDespDtPgto" placeholder="Digite o aqui....">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Forma Pgto</label>
                            <select class="form-control obg" id="AlteraDespFormPgto" name="AlteraDespFormPgto">
                                <option value="">Selecione</option>
                                <option value="D">Dinheiro</option>
                                <option value="C">Cheque</option>
                                <option value="CC">Cartão de Credito</option>
                                <option value="CD">Cartão de Débito</option>
                                <option value="D">Depósito</option>
                                <option value="P">Pix</option>

                            </select>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer justify-content-between">
                <div class="col-md-6">
                    <div class="form-group">
                        <button type="button" class="btn btn-warning col-md-12" data-dismiss="modal">Voltar</button>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <button name="btn_alterar" class="btn btn-success col-md-12" onclick="return AlterarDespesa()">Salvar</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
