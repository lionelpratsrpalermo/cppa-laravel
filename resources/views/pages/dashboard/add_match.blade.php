@extends('pages.dashboard.layout.default')

@section('content')

<form class="row bg-success fw-bold p-4 mb-5" action="{{ url('/dashboard/add_match/process_data') }}" method="POST">
    @csrf {{-- directiva de blade para generar un token y poder usar el method POST sin problemas --}}
    <input type="text" class="d-none" value="profesionalismo" name="age">
    <div class="col-12 border border-light rounded p-4 mb-3">
        <div class="text-warning h3 mb-3">Datos del partido</div>
        <div class="row">
            <div class="col-sm-6 col-lg-4">
                <label for="exampleInputEmail1" class="form-label h4">Fecha</label>
                <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="date_match">
            </div>
            <div class="col-sm-6 col-lg-4 mb-3">
                <label for="exampleInputEmail1" class="form-label h4">Estadio</label>
                <select class="form-select" aria-label="Default select example" name="stadium_match">
                    <option>Estadio</option>
                    <option value="cardenas 2685">Cárdenas 2685</option>
                </select>
            </div>
            <div class="col-sm-6 col-lg-4 mb-3">
                <label for="exampleInputEmail1" class="form-label h4">Grand Slam</label>
                <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" min="1" value="1" name="grand_slam">
            </div>
        </div>
        <div class="row">
            <div class="d-none d-lg-block col-lg-2"></div>
            <div class="col-sm-6 col-lg-4 mb-3">
                <label for="exampleInputEmail1" class="form-label h4">Fecha #</label>
                <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" min="0" value="0" name="meet">
            </div>
            <div class="col-sm-6 col-lg-4 mb-3">
                <label for="exampleInputEmail1" class="form-label h4">Instancia</label>
                <select class="form-select" aria-label="Default select example" name="instance">
                    <option>Instancia</option>
                    <option value="semifinal">Semifinal</option>
                    <option value="final">Final</option>
                    <option value="3&4">3°&4° puesto</option>
                    <option value="finalisima">Finalísima</option>
                    <option value="frustradisima">Frustradísima</option>
                </select>
            </div>
            <div class="d-none d-lg-block col-lg-2"></div>
        </div>
    </div>
    <div class="col-12 border border-light rounded p-4 mb-3">
        <div class="text-warning h3 mb-3">Equipos</div>
        <div class="row border border-light p-3 mb-4 rounded">
            <div class="text-center h3 text-warning">Ganador</div>
            <div class="d-none d-lg-block col-lg-1"></div>
                @for ($i = 1; $i < 3; $i++)
                <div class="col-md-6 col-lg-5">
                    <label for="exampleInputEmail1" class="form-label h4">Jugador {{ $i }}</label>
                    <select class="form-select text-capitalize" aria-label="Default select example" name="winner{{ $i }}">
                        <option value="" class="fw-bold">Jugador</option>
                        @foreach ($allPlayers as $player)
                        <option value="{{ $player->id }}" class="text-capitalize"> {{ $player->id }}. {{ $player->nombre }} {{ $player->apellido }}</option>
                        @endforeach
                    </select>
                </div>
                @endfor
            <div class="d-none d-lg-block col-lg-1"></div>
        </div>
        <div class="row border border-light p-3 mb-2 rounded">
            <div class="text-center h3 text-warning">Perdedor</div>
            <div class="d-none d-lg-block col-lg-1"></div>
            @for ($i = 1; $i < 3; $i++)
            <div class="col-md-6 col-lg-5">
                <label for="exampleInputEmail1" class="form-label h4">Jugador {{ $i }}</label>
                <select class="form-select text-capitalize" aria-label="Default select example" name="looser{{ $i }}">
                    <option value="" class="fw-bold">Jugador</option>
                    @foreach ($allPlayers as $player)
                    <option value="{{ $player->id }}" class="text-capitalize"> {{ $player->id }}. {{ $player->nombre }} {{ $player->apellido }}</option>
                    @endforeach
                </select>
            </div>
            @endfor
            <div class="d-none d-lg-block col-lg-1"></div>
        </div>
    </div>
    <div class="col-12 border border-light rounded p-4 mb-4">
        <div class="text-warning h3 mb-3">Resultado</div>
        <div class="row d-lg-flex justify-content-around">
            @for ($i = 1; $i < 6; $i++)
            <div class="col-sm-5 col-lg-2 border border-light rounded py-3 mb-3">
                <div class="mb-3 h4">{{ $i }}° set</div>
                <select class="form-select mb-3" aria-label="Default select example" name="set{{ $i }}winner">
                    <option value="0">Games ganador</option>
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="tb">TB</option>
                </select>

                <select class="form-select mb-3" aria-label="Default select example" name="set{{ $i }}looser">
                    <option value="0">Games perdedor</option>
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="tb">TB</option>
                </select>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tie Break" name="set{{ $i }}TB">
            </div>
            @endfor
        </div>
    </div>
    <div class="col-12 border border-light rounded p-4 mb-4">
        <div class="row">
            <div class="col-sm-5 col-lg-2 border border-light rounded py-3 mb-3">
                <div class="mb-3 h4">Actuación destacada:</div>
                <select class="form-select mb-3" aria-label="Default select example" name="outstandingPerformance">
                    <option value="0">No</option>
                    <option value="1">Sí</option>
                </select>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-center">
        <button type="submit" class="btn btn-primary w-100 fs-4 fw-bold py-1">Agregar partido</button>
    </div>
</form>
@stop