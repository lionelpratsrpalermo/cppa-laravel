@extends('layout.default')


@section('content')
{{-- <form class="bg-light pt-4 pb-5 rounded text-uppecase" method="GET" action="{{ url('/login/dologin/') }}">
    <div class="row text-center">
        <div class="col-12 mb-3 d-flex justify-content-center">
            <input type="text" name="user" placeholder="user" class="form-control w-75">
        </div>
        <div class="col-12 mb-4 d-flex justify-content-center">
            <input type="text" name="password" placeholder="password" class="form-control w-75">
        </div>
        <div class="col-12 d-flex justify-content-center">
            <input type="submit" value="ingresar" class="form-control w-75 fs-5 fw-semibold text-uppercase bg-light-pink text-light">
        </div>
    </div>
</form> --}}
<div class="row">
    <div class="d-none d-md-block col-3"></div>
    <div class="col-12 col-md-6">
        <form method="GET" action="{{ url('/login/dologin/') }}">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label text-light fw-bold">Email</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="user">
            </div>
            <div class="mb-4">
                <label for="exampleInputPassword1" class="form-label text-light fw-bold">Contraseña</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password">
            </div>
            <button type="submit" class="btn btn-primary w-100">Ingresar</button>
        </form>
    </div>
    <div class="d-none d-md-block col-3"></div>
</div>
@stop


