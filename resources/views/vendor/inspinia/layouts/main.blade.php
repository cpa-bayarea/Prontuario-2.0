<!DOCTYPE html>
<html lang="@yield('lang', config('app.locale', 'pt-BR'))">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Atnic">

    <title>@yield('title', config('app.name', 'Prontuário Eletrônico'))</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Styles -->
    @section('styles')
        <link href="{{ mix('/css/inspinia.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" />
        <link href='{{asset("/js/plugins/fullcalendar/core/fullcalendar.min.css")}}' rel='stylesheet' />
        <link href='{{asset("/js/plugins/fullcalendar/core/main.css")}}' rel='stylesheet' />
        <link href='{{asset("/js/plugins/fullcalendar/daygrid/main.css")}}' rel='stylesheet' />
        <link href='{{asset("/js/plugins/fullcalendar/timegrid/main.css")}}' rel='stylesheet' />
        <link href='{{asset("/js/plugins/fullcalendar/list/main.css")}}' rel='stylesheet' />
        <link href='{{asset("css/calendario.css")}}' rel='stylesheet' />
        <link href='{{asset("css/plugins/dataTables/datatables.min.css")}}' rel='stylesheet' />
        <link href='{{asset("css/plugins/sweetalert/sweetalert.css")}}' rel='stylesheet' />
        <link href='{{ asset("css/plugins/iCheck/custom.css") }}' rel='stylesheet' >
    @show

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.3/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

    <![endif]-->
    @stack('head')
</head>

<body class="body-small {{ config('inspinia.skin', '') }}">
    <div id="wrapper">
        @include('inspinia::layouts.sidebar.main')
        @include('inspinia::layouts.main-panel.main')

    </div>

    @section('scripts')

        <script src="{{ asset('js/jquery-3.4.1.min.js') }}" charset="utf-8"></script>
        <script src="{{ asset('js/popper.min.js') }}"></script>
        <script src="{{ asset('js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
        <script src="{{ asset('js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
        <script src="{{ asset('js/plugins/dataTables/datatables.min.js') }}"></script>
        <script src="{{ asset('js/plugins/dataTables/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.js') }}"></script>
        <script src="{{ asset('js/inspinia.js') }}"></script>
        <script src="{{ asset('js/jasny-bootstrap.min.js') }}" charset="utf-8"></script>
        <script src="{{ asset('js/select2.min.js') }}" charset="utf-8"></script>
        <script src="{{ asset('js/choose.jquery.js') }}" charset="utf-8"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>
        <script src='{{asset("/js/plugins/fullcalendar/core/main.js")}}'></script>
        <script src='{{asset("/js/plugins/fullcalendar/interaction/main.js")}}'></script>
        <script src='{{asset("/js/plugins/fullcalendar/daygrid/main.js")}}'></script>
        <script src='{{asset("/js/plugins/fullcalendar/timegrid/main.js")}}'></script>
        <script src='{{asset("/js/plugins/fullcalendar/list/main.js")}}'></script>
        <script src='{{asset("/js/plugins/fullcalendar/core/locales/pt-br.js")}}'></script>
        <script src='{{asset("/js/plugins/fullcalendar/moment/moment.js")}}'></script>
        <!-- Sweet alert -->
        <script src="{{ asset('js/plugins/sweetalert/sweetalert.min.js') }}"></script>
    @show
    @stack('body')

    @if(Session::has('error'))
        <script>
            $(document).ready(function() {
                setTimeout(function() {
                    toastr.options = {
                        closeButton: true,
                        progressBar: true,
                        showMethod: 'slideDown',
                        timeOut: 6000
                    };
                    toastr.error('', '{{ Session::get('error ') }}');
                }, 1300);
            });
        </script>
    @endif

    @if(Session::has('info'))
        <script>
            $(document).ready(function() {
                setTimeout(function() {
                    toastr.options = {
                        closeButton: true,
                        progressBar: true,
                        showMethod: 'slideDown',
                        timeOut: 4000
                    };
                    toastr.info('Informação!', '{{ Session::get('info ') }}');
                }, 1300);
            });
        </script>
    @endif

    @if(Session::has('warning'))
        <script>
            $(document).ready(function() {
                setTimeout(function() {
                    toastr.options = {
                        closeButton: true,
                        progressBar: true,
                        showMethod: 'slideDown',
                        timeOut: 4000
                    };
                    toastr.warning('Atenção!', '{{ Session::get('warning ') }}');
                }, 1300);
            });
        </script>
    @endif


    @if(Session::has('success'))
        <script>
            $(document).ready(function() {
                setTimeout(function() {
                    toastr.options = {
                        closeButton: true,
                        progressBar: true,
                        showMethod: 'slideDown',
                        timeOut: 4000
                    };
                    toastr.success('Ok!', '{{ Session::get('success ') }}');
                }, 1300);
            });
        </script>
    @endif

    <script>
        $('button.findById').click(function updateListTelefone() {
            let paciente_id = $(this).val();
            $.ajax({
                url: "/search/telefonebypacienteid/" + paciente_id,
                type: "GET",
                datatype: 'json',
                success: function(data) {

                    $('#body-telefone').empty();
                    $.each(data, function(key, value) {
                        html = '<tr>';
                        html += '<td>' + value.ddd + ' ' + value.numero + '</td>';
                        html += ' <td class="row"> <form action="telefone/delete/' + value.id + '" method="POST">@csrf<button class="btn btn-warning dim" type="submit"><i class="fa fa-trash"></i></button></form>';
                        html += '<button class="btn btn-info dim findTelefoneById" value="' + value.id + '" type="button"><i class="fa fa-edit"></i></button></td>';
                        html += '</tr>';

                        $('#body-telefone').append(html);
                    });
                    $('#paciente_form').append(`<input type="hidden" value="${paciente_id}" id="paciente_id">`);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus);
                }
            });
        });


        $('#submit_form_telefone').click(function() {

            $.ajax({
                url: "/telefone/create",
                type: "POST",
                datatype: 'json',
                data: {
                    telefone: $('#telefone_number').val(),
                    paciente_id: $('#paciente_id').val(),
                    _token: "{{ csrf_token() }}"
                },
                success: function(data) {
                    $('#body-telefone').empty();
                    $.each(data, function(key, value) {
                        html = '<tr>';
                        html += '<td>' + value.ddd + ' ' + value.numero + '</td>';
                        html += ' <td class="row"> <form action="telefone/delete/' + value.id + '" method="POST">@csrf<button class="btn btn-warning dim" type="submit"><i class="fa fa-trash"></i></button></form>';
                        html += '<button class="btn btn-info dim findTelefoneById" value="' + value.id + '" type="button"><i class="fa fa-edit"></i></button></td>';
                        html += '</tr>';

                        $('#body-telefone').append(html);
                    });
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus);
                }
            });
        });
    </script>

    <script>
        $(document).ready(function () {

            /**
             * @class Classe para exclusão de registros.
             *
             */
            $('.link-excluir').click(function () {
                var href = $(this).attr('href');
                swal({
                        title: "Atenção!",
                        text: "Deseja realmente excluir o registro ?",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Sim, estou certo!",
                        ButtonCancelText: "Cancelar",
                        closeOnConfirm: false
                    },
                    function () {
                        window.location.href = href;
                    });

                return false;
            });

            /**
             * Inicialização do Datatables no projeto para qualquer listagem que tiver a classe dataTable.
             *
             */
            $('.dataTable').DataTable({
                pageLength: 25,
                responsive: true
            });
        });

        /**
         * Obriga que os valores inseridos sejam do tipo inteiro (valor).
         *
         */
        $('input.inteiro').keyup(function () {
            $($(this)).val($(this).val().replace(/[^0-9]/g, ''));
        });

        // @todo refatorar para arquivo externo. Retirando o js de todas as páginas do sistema.

        $('#uf').on('change', function() {
            $.ajax({
                url: "/search/cidadebyuf/" + $('#uf').val(),
                type: "GET",
            }).done(function(response) {
                $("#cidade").empty();
                response.forEach(function(key) {
                    $("#cidade").append('<option value="' + key.id + '">' + key.title + '</option>');
                    $("#cidade").removeAttr("disabled");
                });
            });
        });


    </script>

    @section('js')
    @show

</body>

</html>
