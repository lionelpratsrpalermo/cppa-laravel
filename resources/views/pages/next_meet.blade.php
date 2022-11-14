@extends('layout.default')

@section('content')
<h3 class="mb-4 text-center text-light d-none d-sm-block h1">Semifinales</h3>

<div class="accordion accordion-flush d-sm-none mb-4 text-capitalize fw-bold" id="accordionFlushExample">
    <div class="accordion-item">
        <h2 class="accordion-header" id="flush-headingOne">
            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                Semifinal #1:
            </button>
        </h2>
        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">
                <ul class="list-group">
                    <li class="list-group-item">{{ $next_meet_array_players[0] }} / {{ $next_meet_array_players[1] }}</li>
                    <li class="list-group-item">{{ $next_meet_array_players[6] }} / {{ $next_meet_array_players[7] }}</li>
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
                    <li class="list-group-item">{{ $next_meet_array_players[2] }} / {{ $next_meet_array_players[3] }}</li>
                    <li class="list-group-item">{{ $next_meet_array_players[4] }} / {{ $next_meet_array_players[5] }}</li>
                </ul>
            </div>
        </div>
    </div>
</div>



<div class="d-none d-sm-block">
    <div class="row mb-3 text-capitalize">
        <!-- semi1 -->
        <div class="col-12 col-lg-6 mb-3">
            <table class="table table-dark table-striped fw-bold fs-5">
                <thead>
                    <tr class="text-center text-warning">
                        <th scope="col">Equipo "A"</th>
                        <th scope="col">vs.</th>
                        <th scope="col">Equipo "D"</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <tr>
                        <td scope="row" class="fw-bold text-capitalize">{{ $next_meet_array_players[0] }} / {{ $next_meet_array_players[1] }}</td>
                        <td>vs.</td>
                        <td class="text-capitalize">{{ $next_meet_array_players[6] }} / {{ $next_meet_array_players[7] }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- semi2 -->
        <div class="col-12 col-lg-6">
            <table class="table table-dark table-striped fw-bold fs-5">
                <thead class="text-center">
                    <tr class="text-warning">
                        <th scope="col">Equipo "B"</th>
                        <th scope="col">vs.</th>
                        <th scope="col">Equipo "C"</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <tr>
                        <td scope="row">{{ $next_meet_array_players[2] }} / {{ $next_meet_array_players[3] }}</td>
                        <td>vs.</td>
                        <td>{{ $next_meet_array_players[4] }} / {{ $next_meet_array_players[5] }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop