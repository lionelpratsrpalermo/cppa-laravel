@extends('layout.default')

@section('content')
    <h1 class="pb-lg-3 mb-4 h1 text-center text-light mb-lg-4">Tabla de posiciones histórica:</h1>
    
    <div class="row fw-bold mb-5">
        <div id="contentTable" class="bg-sky-blue p-0 text-center" style="margin-left: auto; margin-right: auto;">
            <div class="d-flex flex-wrap bg-primary text-light p-2">
                <div class="w-2_5">#</div>
                <div class="w-22 ps-2vw text-start">Jugador</div>
                <div class="w-11 text-center">Ef.</div>
                <div class="w-9 text-center">Ptos.</div>
                <div class="w-6 text-center">P.J.</div>
                <div class="w-6 text-center">P.G.</div>
                <div class="w-6 text-center">P.P.</div>
                <div class="w-7 text-center">G.J.</div>
                <div class="w-7 text-center">G.G.</div>
                <div class="w-7 text-center">G.P.</div>
                <div class="w-7 text-center">Dif.</div>
                <div class="w-9_5 text-center">Ef. G.</div>
            </div>

            @for($i=0; $i<count($dataPositionsTable); $i++)
            @if ($i %2 == 0)
            <div class="d-flex flex-wrap bg-light text-dark p-2">
            @else
            <div class="d-flex flex-wrap text-dark p-2">
            @endif
                <div class="w-2_5">{{ $i+1 }}</div>
                <div class="w-22 ps-2vw text-start text-capitalize">{{$dataPositionsTable[$i]['jugador']}}</div>
                <div class="w-11 text-center">{{$dataPositionsTable[$i]['eficacia']}}</div>
                <div class="w-9 text-center">{{$dataPositionsTable[$i]['ptos.']}}</div>
                <div class="w-6 text-center">{{$dataPositionsTable[$i]['p.j.']}}</div>
                <div class="w-6 text-center">{{$dataPositionsTable[$i]['p.g.']}}</div>
                <div class="w-6 text-center">{{$dataPositionsTable[$i]['p.p.']}}</div>
                <div class="w-7 text-center">{{$dataPositionsTable[$i]['g.j.']}}</div>
                <div class="w-7 text-center">{{$dataPositionsTable[$i]['g.g.']}}</div>
                <div class="w-7 text-center">{{$dataPositionsTable[$i]['g.p.']}}</div>
                <div class="w-7 text-center">{{$dataPositionsTable[$i]['dif.']}}</div>
                <div class="w-9_5 text-center">{{$dataPositionsTable[$i]['eficacia_games']}}</div>
            </div>
            @endfor

        </div>
    </div>
@stop