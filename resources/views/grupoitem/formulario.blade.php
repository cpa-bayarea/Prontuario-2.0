<div class="ibox float-e-margins">
    <div class="ibox-title">
        <h5>Grupo Item</h5>
    </div>
    <div class="ibox-content">
        <div id="div_formulario_grupo_item">
            <form id="formulario"  name="formulario" method="POST" class="form-horizontal">
                @csrf
                <input type="hidden" name="grupo_id" id="grupo_id" value="{{ base64_encode($model->id) }}"/>
                <input type="hidden" name="grupo_item_id" id="grupo_item_id" />

                <div class="form-group">
                    <label for="tx_nome_item" class="col-sm-2 control-label">Nome <span class="obrigatorio">*</span></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="tx_nome" id="tx_nome_item" maxlength="255" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="nu_ordem_item" class="col-sm-2 control-label">Ordem <span class="obrigatorio">*</span></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control inteiro" name="nu_ordem" id="nu_ordem_item" maxlength="2" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="tx_outro_item" class="col-sm-2 control-label">Outro</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="tx_outro" id="tx_outro_item" maxlength="255">
                    </div>
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-primary" id="btn-salvar-grupo-item" type="button">
                            <i class="fa fa-check"></i>&nbsp;Salvar
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div id="div_listagem_grupo_item"></div>
    </div>
</div>
