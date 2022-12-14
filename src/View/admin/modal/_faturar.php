
<div class="modal fade" id="faturar">
    <div class="modal-dialog">
        <div class="modal-content bg-white">
            <div class="modal-header bg-success">
                <h4 class="modal-title">Lançar Receita</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Descrição</label>
                            <input type="hidden" name="faturaID" id="faturaID" value="<?=$id?>">
                            <input class="form-control obg" id="descricao" name="descricao" placeholder="Digite o aqui....">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Cliente</label>
                            <select class="form-control obg" id="faturaCliente" name="faturaCliente">
                                <option value="">Selecione</option>
                                <?php foreach ($cliente as $cl) {
                                    if ($cl['CliTipo'] == 'C') {?>
                                    <option value="<?= $cl['CliID']?>"><?= $cl['CliNome']?></option>
                                <?php }} ?>

                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Valor</label>
                            <input type="text" class="form-control obg" id="faturaValor" name="faturaValor" placeholder="Digite o aqui...." data-inputmask='"mask": "(99) 9 9999-9999"' data-mask>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Dt Vencimento</label>
                            <input type="date" class="form-control obg" id="faturaDtVenc" name="faturaDtVenc" placeholder="Digite o aqui....">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Dt Recebimento</label>
                            <input type="date" class="form-control obg" id="faturaDtPgto" name="faturaDtPgto" placeholder="Digite o aqui....">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Forma Pgto</label>
                            <select class="form-control obg" id="FaturaFormPgto" name="FaturaFormPgto">
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
                        <button name="btn_inserir" class="btn btn-success col-md-12" onclick="return NovaReceita()">Salvar</button>
                    </div>
                </div>

            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>