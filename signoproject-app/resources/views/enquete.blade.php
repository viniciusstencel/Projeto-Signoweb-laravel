<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/mostrar_enquete.css">
    <title>Enquete</title>
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

    <div class="card-container">


    <div class="card">


        <div class="card-body">


            <h5 class="card-title">{{ $enquete->title }}</h5>


            <form action="/vote" method="POST">


                @csrf


                <input type="hidden" class="card-text" name="id_enquete" value="{{ $enquete->id }}">


                <input type="radio" class="card-text" name="voto" id="voto1" value="vote1" required> {{ $enquete->vote1 }} <br>

                <input type="radio" class="card-text" name="voto" id="voto2" value="vote2"> {{ $enquete->vote2 }} <br>

                <input type="radio" class="card-text" name="voto" id="voto3" value="vote3"> {{ $enquete->vote3 }} <br> <br>

                <div class="button-container">
                <button type="submit" class="button-form borda-inversa">Votar</button>
               </div>
            </form>
        </div>
    </div>
</div>
</body>

</html>