$(document).ready(function () {
        $('.btn_cancel_paciente').on('click', function () {
            var idPaciente = $(this).closest('tr').find('td:eq(1)').text();
            console.log(idPaciente);
            Swal.fire({
                title: 'Tem certeza que deseja excluir o paciente?',
                text: "essa operação é irreversível",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'SIM',
                cancelButtonText: 'NÃO',
        }).then((result) => {
            if (result.value) {
                swal.fire({
                    type: 'info',
                    title: 'EXCLUINDO ...',
                    allowOutsideClick: true,
                });
                swal.showLoading();
                $.ajax({
                    url:'/paciente/delete' ,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        idPaciente,
                    },
                    type: 'POST',
                    dataType: 'json',
                    success: function (data) {
                        console.log(JSON.stringify(data));
                        if (data.resultado == 'OK') {
                            swal.fire({
                                type: 'success',
                                title: 'PACIENTE EXCLUIDO!',
                            });
                            window.location.reload();
                        }
                        else {
                            console.log(JSON.stringify(data));
                            swal.fire({
                                type: 'warning',
                                title: 'ERRO NA REQUISIÇÃO !',
                                text: JSON.stringify(data.detail),
                            });
                        }
                    },
                    error: function (data) {
                    },
                });
            }

        })

    });
});
