@php
date_default_timezone_set('America/Sao_Paulo');
use App\Models\Voto;
@endphp

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Enquetes.io</title>
    <link rel="stylesheet" href="/css/home.css">
</head>
<body>
    <header>
        <div class="container-head">
            <div class="head-texto">
                <h1>Enquetes.io</h1>
            </div>
        </div>

        <div class="menu">
            <ul>
                <li><a href="/">Início</a></li>
                <li><a href="/criar-enquete">Criar Enquete</a></li>   
            </ul>
        </div>
    </header>

    <div class="container">
        @foreach($enquetes as $enquete)
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $enquete->title }}</h5>
                <p>_______________________</p>
                @php
                    $qtdTotalVotos = $enquete->qtd_vote1 + $enquete->qtd_vote2 + $enquete->qtd_vote3;
                    if($qtdTotalVotos > 0 ){
                        $porcentagemQtdVote1 = number_format(($enquete->qtd_vote1 / $qtdTotalVotos) * 100, 2);
                        $porcentagemQtdVote2 = number_format(($enquete->qtd_vote2 / $qtdTotalVotos) * 100, 2);
                        $porcentagemQtdVote3 = number_format(($enquete->qtd_vote3 / $qtdTotalVotos) * 100, 2);
                        echo '
                        <p>Porcentagem de Votos:<p>
                        <p>'.$enquete->vote1.' = '.$enquete->qtd_vote1.' Votos, '.$porcentagemQtdVote1.'%<p>
                        <p>'.$enquete->vote2.' = '.$enquete->qtd_vote2.' Votos, '.$porcentagemQtdVote2.'%<p>
                        <p>'.$enquete->vote3.' = '.$enquete->qtd_vote3.' Votos, '.$porcentagemQtdVote3.'%<p>';
                    } else {
                        echo 'Nenhum Voto.';
                    }
                @endphp
                <p>_______________________</p>
                <p>Data: {{ $enquete->date }}</p>
                <p>Hora de Início: {{ $enquete->hour_start }}</p>
                <p>Hora de Término: {{ $enquete->hour_end }}</p> <br>
                @php
                   $date = $enquete->date;
                   $hourStart = $enquete->hour_start;
                   $hourEnd = $enquete->hour_end;                        
                @endphp
                @if(date('20y-m-d') == $date && date('H:i:s') >= $hourStart && date('H:i:s') <= $hourEnd)
                    <a href="/mostrar-enquete/{{ $enquete->id }}" class="button-form borda-inversa">Participar da Enquete</a>
                @elseif((date('20y-m-d') > $date || date('20y-m-d') == $date) && (date('H:i:s') > $hourStart || date('H:i:s') > $hourEnd)) 
                    <p>Enquete Finalizada.</p>
                @elseif (date('20y-m-d') < $date || date('H:i:s') < $hourStart && date('H:i:s') < $hourEnd)
                    <p>Enquete ainda não iniciada.</p>    
                @endif
               <br><br><a href="/excluir/{{$enquete->id}}" class="button-excluir">Excluir</a>
                        <a href="/editar-enquete/{{$enquete->id}}" class="button-form borda-inversa">Editar</a>
            </div>
        </div>
    @endforeach
    
    </div>
</body>
</html>
