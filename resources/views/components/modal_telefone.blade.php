<div class="modal inmodal" id="modalTelefone" tabindex="-1" role="dialog" style="display: none; padding-right: 14px;">
    <div class="modal-dialog">
        <div class="modal-content animated bounceInRight">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">Close</span>
                </button>
                <i class="fa fa-phone modal-icon"></i>
                <h4 class="modal-title">Telefones</h4>
            </div>
            <div class="modal-body">
                <div class="form-group" id="paciente_form">
                    <label>Para adicionar um novo número, insira o número abaixo</label>
                    <input type="text" id="telefone_number" data-mask="(99) 99999 9999" placeholder=""
                           class="form-control">
                    <button class="btn btn-sm btn-danger mt-2" id="submit_form_telefone">Cadastrar</button>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="ibox ">
                            <div class="ibox-content">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Telefone</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody id="body-telefone"> </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

