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
            <form action="triagem" method="POST" id="form_triagem" name="triagem">
                @csrf
                <div class="form-group row"><label for="nome" class="col-lg-2 col-form-label">Nome</label>
                    <div class="col-lg-10"><input type="text" placeholder="Nome" required name="nome" id="nome" class="form-control">
                    </div>
                </div>
                <div class="form-group row"><label for="Data Nascimento" class="col-lg-2 col-form-label">Idade</label>
                    <div class="col-lg-10"><input type="date" min="0" max="150" placeholder="Data Nascimento" required name="data_nascimento" id="data_nascimento" class="form-control">
                    </div>
                </div>
                <div class="form-group row"><label for="triador" class="col-lg-2 col-form-label">Triador</label>
                    <div class="col-lg-10">
                        <select class="form-control m-b" name="triador" required>
                            <option value="">Selecione</option>
                            <option value="1">Maria</option>
                            <option value="2">João</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row"><label for="triador" class="col-lg-2 col-form-label">Supervisor</label>
                    <div class="col-lg-10">
                        <select class="form-control m-b" name="supervisor" required>
                            <option value="">Selecione</option>
                            <option value="1">Carlos</option>
                            <option value="2">Alice</option>
                        </select>
                    </div>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group row"><label for="supervisor" class="col-lg-2 col-form-label">Tipo de Atendimento</label>
                    <div class="col-sm-10">
                        <div class="checkbox-inline i-checks"><label> <div class="iradio_square-green" style="position: relative;"><input required type="radio" value="Criança" name="atendimento" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> <i></i> Criança</label></div>
                        <div class="checkbox-inline i-checks"><label> <div class="iradio_square-green" style="position: relative;"><input required type="radio" value="Adolescente" name="atendimento" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> <i></i> Adolescente </label></div>
                        <div class="checkbox-inline i-checks"><label> <div class="iradio_square-green" style="position: relative;"><input required type="radio" value="Adulto" name="atendimento" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> <i></i> Adulto </label></div>
                        <div class="checkbox-inline i-checks"><label> <div class="iradio_square-green" style="position: relative;"><input required type="radio" value="Idoso" name="atendimento" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> <i></i> Idoso </label></div>
                    </div>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group row"><label for="supervisor" class="col-lg-2 col-form-label">Grupo</label>
                    <div class="col-sm-10">
                        <div class="checkbox-inline i-checks"><label> <div class="iradio_square-green" style="position: relative;"><input required type="radio" value="Criança" name="grupo" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> <i></i> Criança</label></div>
                        <div class="checkbox-inline i-checks"><label> <div class="iradio_square-green" style="position: relative;"><input required type="radio" value="Mulheres" name="grupo" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> <i></i> Mulheres </label></div>
                        <div class="checkbox-inline i-checks"><label> <div class="iradio_square-green" style="position: relative;"><input required type="radio" value="Homens" name="grupo" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> <i></i> Homens </label></div>
                        <div class="checkbox-inline i-checks"><label> <div class="iradio_square-green" style="position: relative;"><input required type="radio" value="Educação Familiar" name="grupo" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> <i></i> Educação Familiar </label></div>
                    </div>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group row"><label for="supervisor" class="col-lg-2 col-form-label">Temporário</label>
                    <div class="col-sm-10">
                        <div class="checkbox-inline i-checks"><label> <div class="iradio_square-green" style="position: relative;"><input required type="radio" value="Casal" name="temporario" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> <i></i> Casal</label></div>
                        <div class="checkbox-inline i-checks"><label> <div class="iradio_square-green" style="position: relative;"><input required type="radio" value="Familiar" name="temporario" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> <i></i> Familiar </label></div>
                        <div class="checkbox-inline i-checks"><label> <div class="iradio_square-green" style="position: relative;"><input required type="radio" value="Outros,quais?" name="temporario" style="position: absolute; opacity: 0;"><ins class="iCheck-helper btn-toggle"  data-element="#minhaDiv" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> <i></i> Outros,quais? </label></div>
                        <div class="checkbox-inline i-checks" id="minhaDiv" style="display: none;"><textarea rows="5" name="outro" cols="50"></textarea></div>
                    </div>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group row"><label for="supervisor" class="col-lg-2 col-form-label">Queixa Principal</label>
                    <div class="col-lg-10"><input type="textarea" placeholder="Queixa" required name="queixa_principal" id="queixa_principal" class="form-control">
                    </div>
                </div>
                <div class="col-12 text-right">
                    <section class="progress-demo">
                        <button class="ladda-button btn btn-sm btn-success" type="submit" data-style="expand-left"><span class="ladda-label" id="button_submit">Cadastrar</span><span class="ladda-spinner"></span></button>
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

