<div class="modal inmodal" id="modalAgendamento" tabindex="-1" role="dialog"
     style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content animated bounceInRight">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span
                        class="sr-only">Close</span></button>
                <i class="fa fa-calendar modal-icon"></i>
                <h4 class="modal-title" id="acao"></h4>
            </div>
            <form action="{{ route('agendamento.store') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="ibox-content">
                        <input type="hidden" id="id" name="id">
                        <input type="hidden" id="prontuario_id" name="prontuario_id">
                        <input type="hidden" id="status_id" name="status_id">

                        <div class="form-group row"><label class="col-sm-4 col-form-label">Paciente</label>
                            <div class="col-sm-8">
                                <select class="form-control m-b" id="paciente_id" name="paciente_id" required>
                                    <option></option>
                                    @foreach($pacientes as $p)
                                        <option value="{{ $p->id }}">{{ $p->nome }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row"><label class="col-sm-4 col-form-label">Terapeuta</label>
                            <div class="col-sm-8">
                                <select class="form-control m-b" id="aluno_id" name="aluno_id" required>
                                    <option></option>
                                    @foreach($alunos as $a)
                                        <option value="{{ $a->id }}">{{$a->tx_nome}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row"><label class="col-sm-4 col-form-label">Data</label>
                            <div class="col-sm-8">
                                <input type="date" class="form-control" id="date" name="date" required>
                            </div>
                        </div>

                        <div class="form-group row"><label class="col-sm-4 col-form-label">Início da consulta</label>
                            <div class="col-sm-8">
                                <input type="time" class="form-control" id="start" name="start" required>
                            </div>
                        </div>

                        <div class="form-group row"><label class="col-sm-4 col-form-label">Fim da consulta</label>
                            <div class="col-sm-8">
                                <input type="time" class="form-control" id="end" name="end" required>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <a id="btn-consultar" class="btn btn-primary"></a>
                    <button class="btn btn-primary" type="submit" id="btn-acao" onclick="return validaHoraAgendamento();"></button>
                    <a id="btn-status" class="btn btn-primary"></a>
                    <a id="btn-cancelar" class="btn btn-danger">Cancelar</a>
                    <button type="button" class="btn btn-white" data-dismiss="modal">Fechar</button>
                </div>
            </form>
        </div>
    </div>
</div>
