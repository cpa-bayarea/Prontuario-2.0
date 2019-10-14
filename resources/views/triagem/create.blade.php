@extends('layouts.app')
@section('content-title', 'Triagem')
@section('content')

<div class="col-12">
    <div class="ibox">
        <div class="ibox-title">
            <h5>Cadastro de Triagem</h5>
            <div class="ibox-tools">
                <a class="collapse-link">
                    <i class="fa fa-chevron-up"></i>
                </a>
            </div>
        </div>
        <div class="ibox-content">
            <form action=" {{ route('triagem.store') }} " method="POST" id="form_triagem" name="triagem">
                @csrf
                <div class="form-group row"><label for="nome" class="col-lg-2 col-form-label">Nome</label>
                <div class="col-lg-10"><input type="text" placeholder="Nome" value="{{$paciente->nome}}" required name="nome" id="nome" class="form-control">
                    </div>
                </div>
                <div class="form-group row"><label class="col-lg-2 col-form-label" for="cpf">CPF</label>
                    <div class="col-lg-10"><input type="text" value="{{$paciente->cpf}}" placeholder="000.000.000-00" data-mask="999.999.999-99" required name="cpf" id="cpf" class="form-control"></div>
                </div>

                <div class="form-group row"><label class="col-lg-2 col-form-label" for="rg">RG</label>
                    <div class="col-lg-10"><input type="text" name="rg" value="{{$paciente->rg}}" data-mask="9999999" placeholder="0000000" id="rg" class="form-control"></div>
                </div>
                <div class="form-group row"><label class="col-lg-2 col-form-label" for="telefone">Telefone</label>
                    <div class="col-lg-10"><input type="text" name="telefone"  data-mask="(99) 99999-9999" placeholder="(00) 00000-0000 " id="telefone" class="form-control"></div>
                </div>
                <div class="form-group row"><label for="Data Nascimento" class="col-lg-2 col-form-label">Idade</label>
                    <div class="col-lg-10"><input type="date" min="0" max="150" placeholder="Data Nascimento" required name="data_nascimento" id="data_nascimento" class="form-control">
                    </div>
                </div>
                <div class="form-group row"><label for="triador" class="col-lg-2 col-form-label">Aluno</label>
                    <div class="col-lg-10">
                        <select class="form-control m-b" name="aluno" required>
                            <option value="">Selecione</option>
                            @foreach ($alunos as $aluno)
                                <option value="{{ $aluno->id }}">{{ $aluno->tx_nome }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row"><label for="triador" class="col-lg-2 col-form-label">Supervisor</label>
                    <div class="col-lg-10">
                        <select class="form-control m-b" name="supervisor" required>
                            <option value="">Selecione</option>
                            @foreach ($supervisores as $supervisor)
                                <option value="{{ $supervisor->id }}">{{ $supervisor->tx_nome }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="hr-line-dashed"></div>
                <div class="form-group row"><label for="supervisor" class="col-lg-2 col-form-label">{{$tipoAtendimentos->nome}}</label>
                    <div class="col-sm-10">
                        @foreach ($tipoAtendimentos->grupoItem as $item)
                        <div class="checkbox-inline i-checks"><label> <div class="iradio_square-green" style="position: relative;"><input required type="radio" value="{{ $item->id }}" name="atendimento" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> <i></i>{{ $item->nome }}</label></div>
                        @endforeach
                    </div>
                </div>
              
                    
                <div class="hr-line-dashed"></div>
                <div class="form-group row"><label for="supervisor" class="col-lg-2 col-form-label">{{ $grupos->nome }}</label>
                    <div class="col-sm-10">
                        @foreach ($grupos->grupoItem as $item)
                        <div class="checkbox-inline i-checks"><label> <div class="iradio_square-green" style="position: relative;"><input required type="radio" value=" {{ $item->id }} " name="grupo" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> <i></i> {{ $item->nome }} </label></div>
                        @endforeach
                    </div>
                </div>

                <div class="hr-line-dashed"></div>
                <div class="form-group row"><label for="supervisor" class="col-lg-2 col-form-label"> {{ $temporario->nome }} </label>
                    <div class="col-sm-10">
                        @foreach ($temporario->grupoItem as $item)
                        
                            @if ($item->outro != null)
                                <div class="checkbox-inline i-checks"><label> <div class="iradio_square-green" style="position: relative;"><input required type="radio" value=" {{ $item->id }} " name="temporario" style="position: absolute; opacity: 0;"><ins class="iCheck-helper btn-toggle"  data-element="#minhaDiv" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> <i></i> {{ $item->nome }}, {{ $item->outro }} </label></div>
                                <div class="checkbox-inline i-checks" id="minhaDiv" style="display: none;"><textarea rows="5" name="outro" cols="50"></textarea></div>
                            @else
                                <div class="checkbox-inline i-checks"><label> <div class="iradio_square-green" style="position: relative;"><input required type="radio" value=" {{ $item->id }} " name="temporario" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> <i></i> {{ $item->nome }} </label></div>
                            @endif

                        @endforeach
                    </div>
                </div>

                <div class="hr-line-dashed"></div>
                <div class="form-group row"><label for="supervisor" class="col-lg-2 col-form-label">Queixa Principal</label>
                    <div class="col-lg-10"><input type="textarea" placeholder="Queixa" required name="queixa_principal" id="queixa_principal" class="form-control">
                    </div>
                </div>
                <div class="col-12 text-right">
                    <section class="progress-demo">
                        <a href="{{ route('triagem') }}" class="btn-small btn btn-success">Voltar</a>
                        <button class="btn-small btn btn-success" type="submit" data-style="expand-left">Cadastrar</button>
                    </section>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
$(function(){
        $(".btn-toggle").click(function(e){
            e.preventDefault();
            el = $(this).data('element');
            $(el).toggle();
        });
    });
</script>
@endsection