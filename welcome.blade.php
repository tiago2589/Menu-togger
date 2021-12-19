@extends ('layouts.main')

@section ('title', 'HDC Events')

@section ('content')

{{-- Div para BUSCAR e vai preencher a tela toda com 12 colunas--}}
<div id="search-containar" class="col-md-12"><!-- col-md-12 usa a tela toda com 4 colunas de 3.. -->
<h1>Busque um evento</h1>
    <form action="/" method="GET">
        <input type="text" id="search" name="search" class="form-control" placeholder="Procurar">
        <button type="search" id="btnpes"><ion-icon name="search-sharp"></ion-icon></button>
    </form >
</div>
{{-- DIV LISTA DE EVENTOS --}}
<div id="event-container" class="col-md-12">
    @if($search)
    <h2>Buscando por: {{$search}}</h2>
    @else
    <h2 class="subtitulo">Próximos Eventos</h2>
    <p class="subtitle">Veja os eventos dos próximos dias</p>
    @endif
    <!--Div para os cards.  --> <!-- Div para preencher 4 cards por linha -->
    <div id="cards-container" class="row">
        @foreach ($events as $event)
        <div class="card col-md-12"><!-- DIV GERAL DOS CARDS EVENTOS -->
            <!--Aqui eu pego a imagem que a pessoa que cria o evento envia...  -->
            <img src="/img/events/{{ $event->image }}" alt="{{$event->title}}">
            <div class="card-body"><!-- DIV CARD EVENTOS -->
                <p class="card-date">{{ date('d/m/Y', strtotime($event->date)) }}</p> <!-- tem que passar esses comandos do data.. -->
                <h5 class="card-title">{{ $event->title }}</h5>
                <p class="card-participantes">{{count($event->users)}} Participante(s)</p><!--count($event->users - comando para contar quantos participantes tem no evento AULA28  -->
                <a href="/events/{{$event->id}}" class="btn btn-primary">Saber Mais</a>
                <!-- <a href="/ingresso" class="btn btn-primary" id="ing">INGRESSOS</a> -->
            </div>
        </div>
        @endforeach
        
        @if(count($events) == 0 && $search) <!-- FUNÇÃO PARA MOSTRAR QUE NÃO HÁ EVENTOS DISPONÍVEIS.. -->
           <p class="nEventEnc"> Não foi possível encontrar nenhum evento com '{{$search}}'. <a href="/">Ver todos os eventos existentes.</a></p>
            
        @elseif (count ($events) == 0)<!-- count() funcao php que conta as coisas. -->
            <?php
            $textnao = 'Não há eventos disponíveis';
            echo $textnao
            ?>
        @endif

    </div>
</div>



@endsection