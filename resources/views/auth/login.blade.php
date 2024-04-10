@extends('fair.layouts.app')
@section('title', 'Login')

@section('pageTitle', 'Login')
@section('pageContent')
@endsection
@section('content')

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card mt-5">
                <div class="card-body p-5">
                    <form class="form-container mt-4" action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="form-group mb-4">
                            <input type="email" class="form-control form-control-lg @error('email') is-invalid @enderror"
                                id="email" value="{{ old('email') }}" placeholder="Email" name="email" required>
                            @error('email')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-4">
                            <input type="password"
                                class="form-control form-control-lg @error('password') is-invalid @enderror" id="password"
                                placeholder="Contrasenya" name="password" required>
                            @error('password')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg btn-block w-100">Iniciar Sessió</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card mt-5">
                <div class="card-body p-5">
                    <form class="form-container mt-4" action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="form-group mb-4">
                            <input type="text" class="form-control form-control-lg @error('name') is-invalid @enderror"
                                id="name" value="{{ old('name') }}" placeholder="Nom complet" name="name"
                                required>
                            @error('name')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-4">
                            <input type="email" class="form-control form-control-lg @error('email') is-invalid @enderror"
                                id="email" placeholder="Email" value="{{ old('email') }}" name="email" required>
                            @error('email')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-4">
                            <input type="password"
                                class="form-control form-control-lg @error('password') is-invalid @enderror" id="password"
                                placeholder="Contrasenya" name="password" required>
                            @error('password')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-4">
                            <input type="password"
                                class="form-control form-control-lg  @error('password_confirmation') is-invalid @enderror"
                                id="password_confirmation" placeholder="Confirma la contrassenya"
                                name="password_confirmation" required>
                            @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-success btn-lg btn-block w-100">Registrar-se</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
