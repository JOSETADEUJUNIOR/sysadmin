<div class="modal fade" id="alterarModelo">
    <div class="modal-dialog">
        <div class="modal-content bg-warning">
            <div class="modal-header">
                <h4 class="modal-title">Alterar Modelo</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <input type="hidden" name="AlteraID" id="AlteraID">
                    <label>Nome do Modelo </label>
                    <input class="form-control obg" id="AlteraNome" name="AlteraNome" placeholder="Digite o nome....">
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cancelar</button>
                <button name="btnAlterar" class="btn btn-outline-dark" onclick=" return AlterarModelo()">Salvar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>