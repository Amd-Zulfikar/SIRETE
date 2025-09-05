@extends('layouts.auth')

@section('title','Lupa Password')

@section('content')
    <!-- <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form> -->
    <!-- Form mengirim email reset -->
    <p class="login-box-msg">Masukan Email Anda</p>
    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="input-group mb-3">
            <input type="email" name="email" value="{{ old('email') }}" required autofocus
                class="form-control @error('email') is-invalid @enderror"
                placeholder="Email">
            <div class="input-group-append">
                <div class="input-group-text"><span class="fas fa-envelope"></span></div>
            </div>

            <!-- Tampilkan error jika ada -->
            @error('email')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="row">
            <div class="col-12">
                <button type="submit" class="btn btn-primary btn-block">Kirim Link Reset</button>
            </div>
        </div>
    </form>
    
@endsection