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

                        <div class="form-group row"><label class="col-sm-4 col-form-label">Términdo da consulta</label>
                            <div class="col-sm-8">
                                <input type="time" class="form-control" id="end" name="end" required>
                            </div>
                        </div>

                        <div class="form-group row"><label class="col-sm-4 col-form-label">Selecione a cor</label>
                            <div class="col-sm-8">
                                <select class="form-control m-b" id="color" name="color">
                                    <option style="color:#1ab394;" value="#1ab394">&#9724; Verde</option>
                                    <option style="color:#1c84c6;" value="#1c84c6">&#9724; Azul</option>
                                    <option style="color:#23c6c8;" value="#23c6c8">&#9724; Verde claro</option>
                                    <option style="color:#f8ac59;" value="#f8ac59">&#9724; Laranjado</option>
                                    <option style="color:#ed5565;" value="#ed5565">&#9724; Vermelho</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="submit" id="btn-acao"></button>
                    <a id="btn-excluir" class="btn btn-danger">Excluir</a>
                    <button type="button" class="btn btn-white" data-dismiss="modal">Fechar</button>
                </div>
            </form>
        </div>
    </div>
</div>
