@extends('layouts.app')
@section('content-title', 'Agendamentos')
@section('content')

@section('styles')
    <link href="{{ mix('/css/inspinia.css') }}" rel="stylesheet">
    <link rel="stylesheet"
          href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css"/>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
    <link href='{{asset('/fullcalendar/core/main.css')}}' rel='stylesheet' />
    <link href='{{asset('/fullcalendar/daygrid/main.css')}}' rel='stylesheet' />
    <link href='{{asset('/fullcalendar/timegrid/main.css')}}' rel='stylesheet' />
    <link href='{{asset('/fullcalendar/list/main.css')}}' rel='stylesheet' />
    <style>
        body {
            margin: 40px 10px;
            padding: 0;
            font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
            font-size: 14px;
        }
        #calendar {
            max-width: 900px;
            margin: 0 auto;
        }
    </style>
@endsection

@section('content')
    <div class="col-12">
        <div class="ibox">
            <div class="ibox-title">
                <h5>Consultas agendadas</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content" style="">
                <div id='calendar'></div>
            </div>
        </div>
    </div>

    {{--Modal detalhe--}}
    <div class="modal inmodal" id="modalDetalhe" tabindex="-1" role="dialog"
         style="display: none; padding-right: 14px;">
        <div class="modal-dialog">
            <div class="modal-content animated bounceInRight">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span
                            class="sr-only">Close</span></button>
                    <i class="fa fa-calendar modal-icon"></i>
                    <h4 class="modal-title">Agendamento detalhado</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="ibox ">
                                <div class="ibox-content">
                                    <table class="table table-hover issue-tracker">
                                        <tbody>
                                        <tr>
                                            <td class="issue-info">
                                                <div id="title"></div>
                                            </td>
                                            <td>
                                                <div id="start"></div>
                                            </td>
                                            <td>
                                                <div id="end"></div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Fechar</button>
                    {{--                    <button type="button" class="btn btn-primary">Salvar</button>--}}
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Cadastrar --}}
    <div class="modal inmodal" id="modalCadastrar" tabindex="-1" role="dialog"
         style="display: none; padding-right: 14px;">
        <div class="modal-dialog">
            <div class="modal-content animated bounceInRight">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span
                            class="sr-only">Close</span></button>
                    <i class="fa fa-calendar modal-icon"></i>
                    <h4 class="modal-title">Realizar agendamento</h4>
                </div>
                <div class="modal-body">
                    <div class="ibox-content">
                        @csrf
                        <form>
                            <div class="form-group row"><label class="col-sm-4 col-form-label">Selecione o paciente</label>
                                <div class="col-sm-8">
                                    <select class="form-control m-b" name="paciente">
                                        @foreach($pacientes as $p)
                                            <option>{{$p->nome}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row"><label class="col-sm-4 col-form-label">Selecione o terapeuta</label>
                                <div class="col-sm-8">
                                    <select class="form-control m-b" name="paciente">
                                        @foreach($alunos as $a)
                                            <option>{{$a->tx_nome}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row"><label class="col-sm-4 col-form-label">Início da consulta</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="start" onkeypress="DataHora(event, this)">
                                </div>
                            </div>
                            <div class="form-group row"><label class="col-sm-4 col-form-label">Términdo da consulta</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="end" onkeypress="DataHora(event, this)">
                                </div>
                            </div>
                            <div class="form-group row"><label class="col-sm-4 col-form-label">Selecione a cor</label>
                                <div class="col-sm-8">
                                    <select class="form-control m-b" name="cor">
                                        <option style="color:#1ab394;" value="#1ab394">Verde</option>
                                        <option style="color:#1c84c6;" value="#1c84c6">Azul</option>
                                        <option style="color:#23c6c8;" value="#23c6c8">Verde claro</option>
                                        <option style="color:#f8ac59;" value="#f8ac59">Laranjado</option>
                                        <option style="color:#ed5565;" value="#ed5565">Vermelho</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="ol-lg-12">
                                    <button class="btn btn-sm btn-outline-primary" type="submit">Agendar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Fechar</button>
                    {{--                    <button type="button" class="btn btn-primary">Salvar</button>--}}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/jquery-3.4.1.min.js') }}" charset="utf-8"></script>
    <script src="{{ mix('/js/manifest.js') }}" charset="utf-8"></script>
    <script src="{{ mix('/js/vendor.js') }}" charset="utf-8"></script>
    <script src="{{ mix('/js/inspinia.js') }}" charset="utf-8"></script>
    <script src="{{ asset('js/jasny-bootstrap.min.js') }}" charset="utf-8"></script>
    <script src="{{ asset('js/select2.min.js') }}" charset="utf-8"></script>
    <script src="{{ asset('js/choose.jquery.js') }}" charset="utf-8"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>
    <script src='{{asset('/fullcalendar/core/main.js')}}'></script>
    <script src='{{asset('/fullcalendar/interaction/main.js')}}'></script>
    <script src='{{asset('/fullcalendar/daygrid/main.js')}}'></script>
    <script src='{{asset('/fullcalendar/timegrid/main.js')}}'></script>
    <script src='{{asset('/fullcalendar/list/main.js')}}'></script>
    <script src='{{asset('/fullcalendar/core/locales/pt-br.js')}}'></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                plugins: [ 'interaction', 'dayGrid', 'timeGrid', 'list' ],
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
                },
                defaultDate: '2019-08-12',
                navLinks: true, // can click day/week names to navigate views
                businessHours: true, // display business hours
                editable: true,
                locale: 'pt-br',
                events: {!! $agendamentos !!},
                eventClick: function(info) {
                    info.jsEvent.preventDefault(); // don't let the browser navigate

                    $('#modalDetalhe #title').text(info.event.title);
                    $('#modalDetalhe #start').text(info.event.start.toLocaleString());
                    $('#modalDetalhe #end').text(info.event.end.toLocaleString());
                    $('#modalDetalhe').modal('show');
                },
                selectable: true,
                select: function(info) {
                    $('#modalCadastrar').modal('show');
                    //     alert('selected ' + info.startStr + ' to ' + info.endStr);
                }
            });

            calendar.render();
        });

        //Mascara para o campo data e hora
        function DataHora(evento, objeto) {
            var keypress = (window.event) ? event.keyCode : evento.which;
            campo = eval(objeto);
            if (campo.value == '00/00/0000 00:00:00') {
                campo.value = "";
            }

            caracteres = '0123456789';
            separacao1 = '/';
            separacao2 = ' ';
            separacao3 = ':';
            conjunto1 = 2;
            conjunto2 = 5;
            conjunto3 = 10;
            conjunto4 = 13;
            conjunto5 = 16;
            if ((caracteres.search(String.fromCharCode(keypress)) != -1) && campo.value.length < (19)) {
                if (campo.value.length == conjunto1)
                    campo.value = campo.value + separacao1;
                else if (campo.value.length == conjunto2)
                    campo.value = campo.value + separacao1;
                else if (campo.value.length == conjunto3)
                    campo.value = campo.value + separacao2;
                else if (campo.value.length == conjunto4)
                    campo.value = campo.value + separacao3;
                else if (campo.value.length == conjunto5)
                    campo.value = campo.value + separacao3;
            } else {
                event.returnValue = false;
            }
        }
    </script>
@endsection
