<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/criar.css">
    <title>Enquetes</title>

    <script>
        function validarHorario() {
            var horaInicio = document.getElementById("hour_start").value;
            var horaTermino = document.getElementById("hour_end").value;

            var horaInicioSplit = horaInicio.split(":");
            var horaTerminoSplit = horaTermino.split(":");

            var horaInicioTotalMinutos = parseInt(horaInicioSplit[0]) * 60 + parseInt(horaInicioSplit[1]);
            var horaTerminoTotalMinutos = parseInt(horaTerminoSplit[0]) * 60 + parseInt(horaTerminoSplit[1]);

            if (horaTerminoTotalMinutos > 1439 || horaTerminoTotalMinutos <= horaInicioTotalMinutos) {
                alert("O horário de término deve ser menor que 23:59 e maior que o horário de início.");
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
    <div class="div">
        <h1>Criar Enquete</h1>

        <form action="/enviar-enquete" method="POST" onsubmit="return validarHorario();">
            @csrf
            <label class="label">
                <input type="text" name="title" id="" class="input-bordas" placeholder="Título.." required> 
            </label>

            <label class="label">
                <input type="text" name="vote1" id="" class="input-bordas" placeholder="Defina o voto.." required>
            </label> 

            <label class="label">
                <input type="text" name="vote2" id="" class="input-bordas" placeholder="Defina o voto.." required>
            </label> 

            <label class="label"> 
                <input type="text" name="vote3" id="" class="input-bordas" placeholder="Defina o voto.." required>
            </label>

            <label class="label"> Data da Enquete:
                <input type="date" name="date" class="input-bordas" id="" required> 
            </label>

            <label class="label"> Horário de Início:
                <input type="time" name="hour_start" class="input-bordas" id="hour_start" required> 
            </label>

            <label class="label"> Horário de Término: (Máximo 23:59)
                <input type="time" name="hour_end" class="input-bordas" id="hour_end" required> 
            </label> 

            <button type="submit" class="button-form borda-inversa">Criar</button>
            <br>
            <br>
        </form>
        <a href="/" class="button-form borda-inversa">Voltar</a>
    </div> 
</body>
</html>
