@extends('layouts.app')
@section('content-title', 'Agendamentos')
@section('content')

@section('styles')
    <link href="{{ mix('/css/inspinia.css') }}" rel="stylesheet">
    <link rel="stylesheet"
          href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css"/>
    <link href='{{asset('/js/plugins/fullcalendar/core/fullcalendar.min.css')}}' rel='stylesheet' />
    <link href='{{asset('/js/plugins/fullcalendar/core/main.css')}}' rel='stylesheet' />
    <link href='{{asset('/js/plugins/fullcalendar/daygrid/main.css')}}' rel='stylesheet' />
    <link href='{{asset('/js/plugins/fullcalendar/timegrid/main.css')}}' rel='stylesheet' />
    <link href='{{asset('/js/plugins/fullcalendar/list/main.css')}}' rel='stylesheet' />
    <link href='{{asset('css/calendario.css')}}' rel='stylesheet' />
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
    @include('components.modal_agendamento')
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
    <script src='{{asset('/js/plugins/fullcalendar/core/main.js')}}'></script>
    <script src='{{asset('/js/plugins/fullcalendar/interaction/main.js')}}'></script>
    <script src='{{asset('/js/plugins/fullcalendar/daygrid/main.js')}}'></script>
    <script src='{{asset('/js/plugins/fullcalendar/timegrid/main.js')}}'></script>
    <script src='{{asset('/js/plugins/fullcalendar/list/main.js')}}'></script>
    <script src='{{asset('/js/plugins/fullcalendar/core/locales/pt-br.js')}}'></script>
    <script src='{{asset('/js/plugins/fullcalendar/moment/main.min.js')}}'></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                plugins: [ 'interaction', 'dayGrid', 'list'],
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
                },
                editable: true,
                eventLimit: true,
                selectable: true,
                selectHelper: true,
                defaultView: 'dayGridMonth',
                navLinks: true,
                businessHours: true,
                locale: 'pt-br',
                events: {!! $agendamentos !!},
                eventClick: function(info) {
                    // Update/Delete

                    info.jsEvent.preventDefault();

                    $.ajax({
                        url: "/search/agendamento/findById/" + info.event.id,
                        type: "GET",
                        datatype: 'json',
                        success: function (data) {

                            $('#id').val(data.agendamento.id);
                            $('#paciente_id').val(data.agendamento.paciente_id);
                            $('#aluno_id').val(data.agendamento.aluno_id);
                            $('#date').val(data.agendamento.start.substring(0, 10));
                            $('#start').val(data.agendamento.start.substring(11));
                            $('#end').val(data.agendamento.end.substring(11));
                            $('#color').val(data.agendamento.color);

                            $('#acao').html("Alterar agendamento");
                            $('#btn-excluir').show();
                            $('#btn-excluir').attr("href", "/agendamento/delete/" + data.agendamento.id);
                            $('#btn-acao').html("Alterar");
                            $('#modalAgendamento').modal('show');
                        },
                        error: function (jqXHR, textStatus, errorThrown) { console.log(textStatus); }
                    });
                },
                select: function(info) {
                    // Insert

                    $('#id').val('');
                    $('#paciente_id').val('');
                    $('#aluno_id').val('');
                    $('#start').val('');
                    $('#end').val('');
                    $('#color').val('#1ab394');
                    $('#date').val(info.startStr);

                    $('#acao').html("Realizar agendamento");
                    $('#btn-excluir').hide();
                    $('#btn-acao').html("Agendar");
                    $('#modalAgendamento').modal('show');
                },
                eventDrop: function(event) {
                    // Mover

                    id =  event.event._def.publicId;

                    start = moment.parseZone(event.event._instance.range.start).utc().format('YYYY-MM-DD HH:mm:ss');
                    if(event.event._instance.range.end){
                        end = moment.parseZone(event.event._instance.range.end).utc().format('YYYY-MM-DD HH:mm:ss');
                    }else{
                        end = start;
                    }

                    $.ajax({
                        url: '{{ route('agendamento.store') }}',
                        type: "POST",
                        data: {
                            id: id,
                            start: start,
                            end: end
                        },
                        headers: {
                            'X-CSRF-TOKEN': "{{ csrf_token() }}"
                        }
                    });
                }
            });

            calendar.render();

            $('#paciente_id').change(function () {
                $.ajax({
                    url: '/search/prontuario/findByPacienteId/' + $('#paciente_id').val(),
                    success: function (data) {
                        if (data) {
                            $('#prontuario_id').val(data.prontuario[0].id);
                        } else {
                            $('#prontuario_id').val('');
                        }
                    }
                });
            });
        });
    </script>
@endsection
