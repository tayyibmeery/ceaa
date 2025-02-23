@extends('layouts.app')

@section('content')
<div class="tabs" style="margin: -10px;">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="email-tab" data-toggle="tab" href="#email" role="tab"
               aria-controls="email" aria-selected="true">Login with Email</a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="email" role="tabpanel" aria-labelledby="email-tab">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <label for="email" class="sr-only">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required
                           placeholder="Email">
                    @error('email')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group m-b-5">
                    <label for="password" class="sr-only">Password</label>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control password" name="password" id="password" required
                               placeholder="Password">
                        <span class="input-group-text">
                            <i class="far fa-eye-slash" id="togglePassword" style="cursor: pointer"></i>
                        </span>
                    </div>
                    @error('password')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group form-inline text-left">
                    <div class="form-check">
                        <label for="remember_me">
                            <input type="checkbox" class="form-check-input" name="remember" id="remember_me">
                            <h5>Remember me</h5>
                        </label>
                    </div>
                </div>
                <div class="text-left form-group">
                    <button type="submit" class="btn">Log in</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
