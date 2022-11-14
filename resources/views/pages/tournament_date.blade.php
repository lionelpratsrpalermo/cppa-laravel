@extends('layout.default')

@section('content')

    <h1 class="pb-lg-3 mb-4 h1 text-center text-light mb-lg-4">Grand Slam # {{$gs_number}} - Fecha # {{$date_number}} - {{ $resultsDate[0]->fecha }}</h1>
    <div class="row mb-2">
        <div class="col-lg-6 mb-5 d-flex flex-column align-items-center">
            <h3 class="mb-3 h3 text-center fw-bold text-warning text-capitalize">Equipo ganador: {{ $resultsDate[2]->ganador1 }} / {{ $resultsDate[2]->ganador2 }}</h3>
            {{-- <img src="{{ asset('img/tournament/gs2-fecha8.jfif') }}" class="border border-5 border-dark rounded" style="width:70%;" alt="equipo"> --}}
            <img src="{{ asset('img/tournament/jpg/gs' . $gs_number . '-fecha' . $date_number . '.jpg') }}" class="border border-5 border-dark rounded" style="width:70%;" alt="equipo">
        </div>
        <div class="col-lg-6 mb-3">
            <h3 class="mb-3 h3 text-center text-light">Jugadores convocados:</h2>
                <ol class="list-group list-group-numbered text-capitalize">
                    @for ($i = 0; $i < count($arrayPlayers); $i++)
                        @if ($i %2 ==0)
                        <li class="list-group-item ps-5 bg-sky-blue fw-bold">{{ $arrayPlayers[$i] }}</li>
                        @else
                        <li class="list-group-item ps-5 fw-bold">{{ $arrayPlayers[$i] }}</li>
                        @endif
                    @endfor
                </ol>
        </div>
    </div>

    <h3 class="mb-4 text-center text-light d-none d-sm-block">Semifinales</h3>

    <div class="d-none d-sm-block">
        <div class="row mb-3 text-capitalize">
            <!-- semi1 -->
            <div class="col-12 col-lg-6">
                <table class="table table-dark table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Equipo ganador</th>
                            <th scope="col">Equipo perdedor</th>
                            <th scope="col">1° set</th>
                            <th scope="col">2° set</th>
                            <th scope="col">3° set</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="row" class="fw-bold text-warning text-capitalize">{{ $resultsDate[0]->ganador1 }} / {{ $resultsDate[0]->ganador2 }}</td>
                            <td class="text-capitalize">{{ $resultsDate[0]->perdedor1 }} / {{ $resultsDate[0]->perdedor2 }}</td>
                            <td>{{ $resultsDate[0]->set1ganador }} - {{ $resultsDate[0]->set1perdedor }}</td>
                            <td>{{ $resultsDate[0]->set2ganador }} - {{ $resultsDate[0]->set2perdedor }}</td>
                            {{-- @if ($resultsDate[0]->set3ganador == '-')
                            <td>-</td>
                            @elseif (substr($resultsDate[0]->set3ganador, 0, 2) == 'tb')
                            <td class="text-uppercase">{{ $resultsDate[0]->set3ganador }}</td>
                            @else
                            <td>{{ $resultsDate[0]->set3ganador }} - {{ $resultsDate[0]->set3perdedor }}</td>
                            @endif --}}

                            @if (($resultsDate[0]->set3ganador == '0' or $resultsDate[0]->set3ganador == '-') and ($resultsDate[0]->set3perdedor == '0' or $resultsDate[0]->set3perdedor == '-'))
                            <td>-</td>
                            @elseif (substr($resultsDate[0]->set3ganador, 0, 2) == 'tb')
                            <td class="text-uppercase">{{ $resultsDate[0]->set3ganador }}</td>
                            @else
                            <td>{{ $resultsDate[0]->set3ganador }} - {{ $resultsDate[0]->set3perdedor }}</td>
                            @endif
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- semi2 -->
            <div class="col-12 col-lg-6">
                <table class="table table-dark table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Equipo ganador</th>
                            <th scope="col">Equipo perdedor</th>
                            <th scope="col">1° set</th>
                            <th scope="col">2° set</th>
                            <th scope="col">3° set</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="row">{{ $resultsDate[1]->ganador1 }} / {{ $resultsDate[1]->ganador2 }}</td>
                            <td>{{ $resultsDate[1]->perdedor1 }} / {{ $resultsDate[1]->perdedor2 }}</td>
                            <td>{{ $resultsDate[1]->set1ganador }} - {{ $resultsDate[1]->set1perdedor }}</td>
                            <td>{{ $resultsDate[1]->set2ganador }} - {{ $resultsDate[1]->set2perdedor }}</td>
                            {{-- @if ($resultsDate[1]->set3ganador == '-')
                            <td>-</td>
                            @elseif (substr($resultsDate[1]->set3ganador, 0, 2) == 'tb')
                            <td class="text-uppercase">{{ $resultsDate[1]->set3ganador }}</td>
                            @else
                            <td>{{ $resultsDate[1]->set3ganador }} - {{ $resultsDate[1]->set3perdedor }}</td>
                            @endif --}}

                            @if (($resultsDate[1]->set3ganador == '0' or $resultsDate[1]->set3ganador == '-') and ($resultsDate[1]->set3perdedor == '0' or $resultsDate[1]->set3perdedor == '-'))
                            <td>-</td>
                            @elseif (substr($resultsDate[1]->set3ganador, 0, 2) == 'tb')
                            <td class="text-uppercase">{{ $resultsDate[1]->set3ganador }}</td>
                            @else
                            <td>{{ $resultsDate[1]->set3ganador }} - {{ $resultsDate[1]->set3perdedor }}</td>
                            @endif

                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="d-none d-sm-block">
        <div class="row text-capitalize">
            <!-- final -->
            <div class="col-12 col-lg-6">
                <h3 class="mb-4 text-center text-light">Final</h3>
                <table class="table table-dark table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Equipo ganador</th>
                            <th scope="col">Equipo perdedor</th>
                            <th scope="col">1° set</th>
                            <th scope="col">2° set</th>
                            <th scope="col">3° set</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="row" class="fw-bold text-warning">{{ $resultsDate[2]->ganador1 }} / {{ $resultsDate[2]->ganador2 }}</td>
                            <td>{{ $resultsDate[2]->perdedor1 }} / {{ $resultsDate[2]->perdedor2 }}</td>
                            <td>{{ $resultsDate[2]->set1ganador }} - {{ $resultsDate[2]->set1perdedor }}</td>
                            <td>{{ $resultsDate[2]->set2ganador }} - {{ $resultsDate[2]->set2perdedor }}</td>
                            {{-- @if ($resultsDate[2]->set3ganador == '-')
                            <td>-</td>
                            @elseif (substr($resultsDate[2]->set3ganador, 0, 2) == 'tb')
                            <td class="text-uppercase">{{ $resultsDate[2]->set3ganador }}</td>
                            @else
                            <td>{{ $resultsDate[2]->set3ganador }} - {{ $resultsDate[2]->set3perdedor }}</td>
                            @endif --}}

                            @if (($resultsDate[2]->set3ganador == '0' or $resultsDate[2]->set3ganador == '-') and ($resultsDate[2]->set3perdedor == '0' or $resultsDate[2]->set3perdedor == '-'))
                            <td>-</td>
                            @elseif (substr($resultsDate[2]->set3ganador, 0, 2) == 'tb')
                            <td class="text-uppercase">{{ $resultsDate[2]->set3ganador }}</td>
                            @else
                            <td>{{ $resultsDate[2]->set3ganador }} - {{ $resultsDate[2]->set3perdedor }}</td>
                            @endif
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- 3&4 -->
            <div class="col-12 col-lg-6">
                <h3 class="mb-4 text-center text-light">3° & 4° puesto</h3>
                <table class="table table-dark table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Equipo ganador</th>
                            <th scope="col">Equipo perdedor</th>
                            <th scope="col">1° set</th>
                            <th scope="col">2° set</th>
                            <th scope="col">3° set</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="row">{{ $resultsDate[3]->ganador1 }} / {{ $resultsDate[3]->ganador2 }}</td>
                            <td>{{ $resultsDate[3]->perdedor1 }} / {{ $resultsDate[3]->perdedor2 }}</td>
                            <td>{{ $resultsDate[3]->set1ganador }} - {{ $resultsDate[3]->set1perdedor }}</td>
                            <td>{{ $resultsDate[3]->set2ganador }} - {{ $resultsDate[3]->set2perdedor }}</td>
                            {{-- @if ($resultsDate[3]->set3ganador == '-')
                            <td>-</td>
                            @elseif (substr($resultsDate[3]->set3ganador, 0, 2) == 'tb')
                            <td class="text-uppercase">{{ $resultsDate[3]->set3ganador }}</td>
                            @else
                            <td>{{ $resultsDate[3]->set3ganador }} - {{ $resultsDate[3]->set3perdedor }}</td>
                            @endif --}}

                            @if (($resultsDate[3]->set3ganador == '0' or $resultsDate[3]->set3ganador == '-') and ($resultsDate[3]->set3perdedor == '0' or $resultsDate[3]->set3perdedor == '-'))
                            <td>-</td>
                            @elseif (substr($resultsDate[3]->set3ganador, 0, 2) == 'tb')
                            <td class="text-uppercase">{{ $resultsDate[3]->set3ganador }}</td>
                            @else
                            <td>{{ $resultsDate[3]->set3ganador }} - {{ $resultsDate[3]->set3perdedor }}</td>
                            @endif

                          
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <h3 class="mb-4 text-center text-light d-sm-none">Partidos</h3>
    <div class="accordion accordion-flush d-sm-none mb-4" id="accordionFlushExample">
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingOne">
                <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                    Semifinal #1:
                </button>
            </h2>
            <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <ul class="list-group">
                        <li class="list-group-item">Equipo ganador: Balestrini / Fernandez E.</li>
                        <li class="list-group-item">Equipo perdedor: Fiorini / Tolosa M.</li>
                        <li class="list-group-item fw-bold">Resultado: 6-0 / 6-0.</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingTwo">
                <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                    Semifinal #2:
                </button>
            </h2>
            <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <ul class="list-group">
                        <li class="list-group-item">Equipo ganador: Balestrini / Fernandez E.</li>
                        <li class="list-group-item">Equipo perdedor: Fiorini / Tolosa M.</li>
                        <li class="list-group-item fw-bold">Resultado: 6-0 / 6-0.</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingThree">
                <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                    Final:
                </button>
            </h2>
            <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <ul class="list-group">
                        <li class="list-group-item">Equipo ganador: Balestrini / Fernandez E.</li>
                        <li class="list-group-item">Equipo perdedor: Fiorini / Tolosa M.</li>
                        <li class="list-group-item fw-bold">Resultado: 6-0 / 6-0.</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingFour">
                <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                    3°&4° puesto:
                </button>
            </h2>
            <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <ul class="list-group">
                        <li class="list-group-item">Equipo ganador: Balestrini / Fernandez E.</li>
                        <li class="list-group-item">Equipo perdedor: Fiorini / Tolosa M.</li>
                        <li class="list-group-item fw-bold">Resultado: 6-0 / 6-0.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="row fw-bold mb-5">
        <h3 class="mb-3 text-center text-light">Tabla de posiciones</h3>
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