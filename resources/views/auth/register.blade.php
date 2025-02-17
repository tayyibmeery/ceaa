@extends('layouts.app')

@section('content')
<div class="tabs" style="margin: -10px;">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="register-tab" data-toggle="tab" href="#register" role="tab"
               aria-controls="register" aria-selected="true">Register</a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="register" role="tabpanel" aria-labelledby="register-tab">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group">
                    <label for="name" class="sr-only">Name</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                           value="{{ old('name') }}" required autocomplete="name" placeholder="Name" autofocus>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email" class="sr-only">Email Address</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                           value="{{ old('email') }}" required autocomplete="email" placeholder="Email">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password" class="sr-only">Password</label>
                    <div class="input-group mb-3">
                        <input id="password" type="password" class="form-control password @error('password') is-invalid @enderror"
                               name="password" required autocomplete="new-password" placeholder="Password">
                        <span class="input-group-text">
                            <i class="far fa-eye-slash" id="togglePassword" style="cursor: pointer"></i>
                        </span>
                    </div>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password-confirm" class="sr-only">Confirm Password</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                           required autocomplete="new-password" placeholder="Confirm Password">
                </div>

                <div class="text-left form-group">
                    <button type="submit" class="btn">Register</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
