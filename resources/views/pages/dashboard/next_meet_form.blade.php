@extends('pages.dashboard.layout.default')

@section('content')


<form class="row bg-success fw-bold p-4 mb-5" action="{{ url('dashboard/next_meet/update/1') }}" method="POST">
    @csrf
    @method('put')
    <div class="col-12 border border-light rounded p-4 mb-3">
        <div class="text-warning h3 mb-3">Semifinal #1</div>
        <div class="row border border-light p-3 mb-4 rounded">
            <div class="text-center h3 text-warning">Equipo "A"</div>
            <div class="d-none d-lg-block col-lg-1"></div>
            @for ($i = 1; $i < 3; $i++)
            <div class="col-md-6 col-lg-5">
                <label for="exampleInputEmail1" class="form-label h4">Jugador {{ $i }}</label>
                <select class="form-select text-capitalize" aria-label="Default select example" name="team_A_player{{ $i }}">
                    <option value="" class="fw-bold">Jugador</option>
                    @foreach ($allPlayers as $player)
                    <option value="{{ $player->id }}" class="text-capitalize">{{ $player->apellido }}, {{ $player->nombre }}</option>
                    @endforeach
                </select>
            </div>
            @endfor
            <div class="d-none d-lg-block col-lg-1"></div>
        </div>
        <div class="row border border-light p-3 mb-2 rounded">
            <div class="text-center h3 text-warning">Equipo "D"</div>
            <div class="d-none d-lg-block col-lg-1"></div>
            @for ($i = 1; $i < 3; $i++)
            <div class="col-md-6 col-lg-5">
                <label for="exampleInputEmail1" class="form-label h4">Jugador {{ $i }}</label>
                <select class="form-select text-capitalize" aria-label="Default select example" name="team_D_player{{ $i }}">
                    <option value="" class="fw-bold">Jugador</option>
                    @foreach ($allPlayers as $player)
                    <option value="{{ $player->id }}" class="text-capitalize">{{ $player->apellido }}, {{ $player->nombre }}</option>
                    @endforeach
                </select>
            </div>
            @endfor
            <div class="d-none d-lg-block col-lg-1"></div>
        </div>
    </div>

    <div class="col-12 border border-light rounded p-4 mb-3">
        <div class="text-warning h3 mb-3">Semifinal #2</div>
        <div class="row border border-light p-3 mb-4 rounded">
            <div class="text-center h3 text-warning">Equipo "B"</div>
            <div class="d-none d-lg-block col-lg-1"></div>
            @for ($i = 1; $i < 3; $i++)
            <div class="col-md-6 col-lg-5">
                <label for="exampleInputEmail1" class="form-label h4">Jugador {{ $i }}</label>
                <select class="form-select text-capitalize" aria-label="Default select example" name="team_B_player{{ $i }}">
                    <option value="" class="fw-bold">Jugador</option>
                    @foreach ($allPlayers as $player)
                    <option value="{{ $player->id }}" class="text-capitalize">{{ $player->apellido }}, {{ $player->nombre }}</option>
                    @endforeach
                </select>
            </div>
            @endfor
            <div class="d-none d-lg-block col-lg-1"></div>
        </div>
        <div class="row border border-light p-3 mb-2 rounded">
            <div class="text-center h3 text-warning">Equipo "C"</div>
            <div class="d-none d-lg-block col-lg-1"></div>
            @for ($i = 1; $i < 3; $i++)
            <div class="col-md-6 col-lg-5">
                <label for="exampleInputEmail1" class="form-label h4">Jugador {{ $i }}</label>
                <select class="form-select text-capitalize" aria-label="Default select example" name="team_C_player{{ $i }}">
                    <option value="" class="fw-bold">Jugador</option>
                    @foreach ($allPlayers as $player)
                    <option value="{{ $player->id }}" class="text-capitalize">{{ $player->apellido }}, {{ $player->nombre }}</option>
                    @endforeach
                </select>
            </div>
            @endfor
            <div class="d-none d-lg-block col-lg-1"></div>
        </div>
    </div>

    <div class="d-flex justify-content-center">
        <button type="submit" class="btn btn-primary w-100 fs-4 fw-bold py-1">Actualizar datos</button>
    </div>
</form>




@stop