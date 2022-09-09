
<div class="modal fade" id="Alterafatura">
    <div class="modal-dialog">
        <div class="modal-content bg-white">
            <div class="modal-header bg-success">
                <h4 class="modal-title">Alterar Receita</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Descrição</label>
                            <input type="hidden" name="AlterafaturaID" id="AlterafaturaID">
                            <input class="form-control obg" id="AlteraDescricao" name="AlteraDescricao" placeholder="Digite o aqui....">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Cliente</label>
                            <select class="form-control obg" id="AlterafaturaCliente" name="AlterafaturaCliente">
                                <option value="">Selecione</option>
                                <?php foreach ($cliente as $cl) {
                                    if ($cl['CliTipo'] == 'C') {?>
                                    <option value="<?= $cl['CliID']?>"><?= $cl['CliNome']?></option>
                                <?php }} ?>

                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Valor</label>
                            <input type="text" class="form-control obg" id="AlterafaturaValor" name="AlterafaturaValor" placeholder="Digite o aqui....">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Desconto</label>
                            <input type="text" class="form-control obg" id="AlteraDesconto" name="AlteraDesconto" onfocusout="Desconto()" placeholder="Digite o aqui....">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Valor com desconto</label>
                            <input type="text" class="form-control obg" id="ValorDesconto" name="ValorDesconto" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Dt Vencimento</label>
                            <input type="date" class="form-control obg" id="AlterafaturaDtVenc" name="AlterafaturaDtVenc" placeholder="Digite o aqui....">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Dt Recebimento</label>
                            <input type="date" class="form-control obg" id="AlterafaturaDtPgto" name="AlterafaturaDtPgto" placeholder="Digite o aqui....">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Forma Pgto</label>
                            <select class="form-control obg" id="AlterarFaturaFormPgto" name="AlterarFaturaFormPgto" onchange="LiberaTroco()">
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
                    <div class="col-md-6" id="troco" style="display: none;">
                        <div class="form-group">
                            <label>Valor Recebido</label>
                            <input type="text" class="form-control obg" id="AlteraValorRecebido" name="AlteraValorRecebido" onfocusout="ValorTroco()">
                        </div>
                    </div>
                    <div class="col-md-6" id="trocoCliente" style="display: none;">
                        <div class="form-group">
                            <label>Troco</label>
                            <input type="text" class="form-control obg" id="TrocoCliente" name="TrocoCliente" disabled>
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
                        <button name="btn_inserir" class="btn btn-success col-md-12" onclick="return AlterarReceita()">Salvar</button>
                    </div>
                </div>

            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    
    
    <!-- /.modal-dialog -->
