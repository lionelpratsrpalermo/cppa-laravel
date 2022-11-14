@extends('layout.default')

@section('content')

        <h1 class="mb-5 h3 text-center text-light">Grand Slam # {{ $gs_number }}</h1>
        <div class="row mb-3">
            @foreach ($datesTournament as $date)
            @if ($date->fecha_nro > 0)
            <div class="col-6 col-sm-4 col-md-3 mb-3 text-center">
                <a href="{{ url('profesionalismo/grand_slam/' . $gs_number . '/fecha/' . $date->fecha_nro) }}" class="btn btn-primary btn-lg fw-bold bg-warning">
                    Fecha # {{$date->fecha_nro}}
                </a>
            </div>
            @endif
            @endforeach
        </div>

        @foreach ($datesTournament as $date)
        @if ($date->fecha_nro == 0)
        <div class="row">
            <div class="d-none d-sm-block col-md-1"></div>
            <div class="col-12 col-md-5 mb-3">
                <div class="d-grid gap-2">
                    <a href="{{ url('profesionalismo/grand_slam/' . $gs_number . '/finalisima') }}" class="btn btn-primary text-uppercase fw-bold">Finalísima GS # {{ $gs_number }}</a>
                </div>
            </div>
            <div class="col-12 col-md-5">
                <div class="d-grid gap-2">
                    <a href="{{ url('profesionalismo/grand_slam/' . $gs_number . '/frustradisima') }}" class="btn btn-primary text-uppercase fw-bold">Frustradísima GS # {{ $gs_number }}</a>
                </div>
            </div>
            <div class="d-none d-sm-block col-md-1"></div>
        </div>
        @endif
        @endforeach


@stop