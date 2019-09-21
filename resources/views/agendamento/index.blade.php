@extends('layouts.app')
@section('content-title', 'Agendamentos')
@section('content')

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

@section('js')
    <script>

        function validaHoraAgendamento() {
            if ($('#end').val() <= $('#start').val()) {
                alert ("Informe um intervalo válido para realizar o agendamento. Verifique!");
                return false;
            }
            return true;
        }

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

                            $.ajax({
                                url: '/search/prontuario/findByPacienteId/' + data.agendamento.paciente_id,
                                success: function (response) {
                                    if (response) {
                                        $('#prontuario_id').val(response.prontuario[0].id);
                                    } else {
                                        $('#prontuario_id').val('');
                                    }
                                }
                            });
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

                    start = moment.parseZone(event.event._instance.range.start).utc().format('YYYY-MM-DD HH:mm');
                    if(event.event._instance.range.end){
                        end = moment.parseZone(event.event._instance.range.end).utc().format('YYYY-MM-DD HH:mm');
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
                if ($('#paciente_id').val() !== "") {
                    $.ajax({
                        url: '/search/prontuario/findByPacienteId/' + $('#paciente_id').val(),
                        success: function (data) {
                            if (data) {
                                $('#prontuario_id').val(data.prontuario[0].id);
                                $('#aluno_id').val(data.prontuario[0].aluno_id);
                            } else {
                                $('#prontuario_id').val('');
                            }
                        }
                    });
                } else {
                    $('#prontuario_id').val('');
                }
            });
        });
    </script>
@endsection
