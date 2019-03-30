

@foreach($testes as $teste)

@can('teste.index')
Nome:
{{ $teste->nome }}
Descricao:
{{ $teste->descricao }}
@endcan
<br><br><br>
@endforeach