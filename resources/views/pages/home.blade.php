@extends('layout.default')

@section('content')
    <h1 class="pb-lg-3 mb-4 h1 text-center text-light mb-lg-4">Grand Slam #2 - Fecha #7 - 26/09/2022</h1>
    <div class="row mb-2">
        <div class="col-lg-6 mb-3">
            <h3 class="mb-3 h3 text-center fw-bold text-warning">Equipo ganador: Balestrini, S. - Centurión, M.</h2>
                <img src="img/tournament/gs2/meet8/gs1-finalisima.jpg" class="border border-5 border-dark rounded" style="width:100%;" alt="equipo">
        </div>
        <div class="col-lg-6 mb-3">
            <h3 class="mb-3 h3 text-center text-light">Jugadores convocados:</h2>
                <ol class="list-group list-group-numbered">
                    <li class="list-group-item ps-5 bg-sky-blue fw-bold">Balestrini, S. (1°)</li>
                    <li class="list-group-item ps-5 fw-bold">Fernandez, E. (4°)</li>
                    <li class="list-group-item ps-5 bg-sky-blue fw-bold">Gambetta, G (6°)</li>
                    <li class="list-group-item ps-5 fw-bold">Prats, L. (7°)</li>
                    <li class="list-group-item ps-5 bg-sky-blue fw-bold">Villalobos, G. (8°)</li>
                    <li class="list-group-item ps-5 fw-bold">Tolosa, M. (9°)</li>
                    <li class="list-group-item ps-5 bg-sky-blue fw-bold">Peverelli, J. (11°)</li>
                    <li class="list-group-item ps-5 fw-bold">Centurión, M. (12°)</li>
                </ol>
        </div>
    </div>
    
    <h3 class="mb-4 text-center text-light d-none d-sm-block">Semifinales</h3>
    
    <div class="d-none d-sm-block">
        <div class="row mb-3">
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
                            <td scope="row">Balestrini / Centurión</td>
                            <td>Prats / Villalobos</td>
                            <td>6 - 1</td>
                            <td>6 - 3</td>
                            <td>-</td>
                        </tr>
                    </tbody>
                </table>
            </div>
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
                            <td scope="row">Fernandez E. / Peverelli</td>
                            <td>Gambetta / Tolosa M.</td>
                            <td>6 - 4</td>
                            <td>6 - 3</td>
                            <td>-</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <div class="d-none d-sm-block">
        <div class="row">
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
                            <td scope="row">Balestrini / Centurión</td>
                            <td>Fernandez E. / Peverelli</td>
                            <td>6 - 0</td>
                            <td>6 - 1</td>
                            <td>-</td>
                        </tr>
                    </tbody>
                </table>
            </div>
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
                            <td scope="row">Prats / Villalobos</td>
                            <td>Gambetta / Tolosa M.</td>
                            <td>7-6 (7-4)</td>
                            <td>6-4</td>
                            <td>-</td>
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