<div class="modal inmodal" id="modalTelefone" tabindex="-1" role="dialog" style="display: none; padding-right: 14px;">
    <div class="modal-dialog">
        <div class="modal-content animated bounceInRight">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                <i class="fa fa-laptop modal-icon"></i>
                <h4 class="modal-title">Cadastro telefone</h4>
                <small class="font-bold">Modal responsável por cadastrar o telefone do usuário  .</small>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Insira o número abaixo</label>
                    <input type="text" data-mask="(99) 99999 9999" placeholder="" class="form-control">
                    <button class="btn btn-sm btn-danger mt-2" id="submit_form_telefone">Cadastrar</button>
                </div>


                <div class="row">
                    <div class="col-12">
                        <div class="ibox ">

                            <div class="ibox-content">

                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>First Name</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>(61) 9999 9999</td>

                                    </tr>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>

                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="save_telefone">Save changes</button>
            </div>
        </div>
    </div>
</div>

<script>

    $('.buttonModalTelefone').click(function () {
           console.log($(this).val());
    });
</script>