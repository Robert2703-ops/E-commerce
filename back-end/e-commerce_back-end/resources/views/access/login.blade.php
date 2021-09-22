@extends('templates.forms-template')

@section('page-title')
    Login
@endsection

@section('form-title')
    <h2>Login</h2>
@endsection

@section('form')
    <form action="{{ route('login') }}" method="post">
        @csrf
        <div>
            <label for="" class="form-label">Email: </label>
            <input type="email" name="email" class="input-info input">
        </div>

        <div>
            <label for="" class="form-label">Password: </label>
            <div class="show-password">
                <input type="password" name="password" class="input-info input">
                <button type="button"><i class="fas fa-eye-slash"></i></button>
            </div>
        </div>

        <div>
            <input type="submit" value="login" class="input-submit submit">
        </div>
    </form>
@endsection

@section('link')
    <p>Don't have an account? <a href="{{ route('register') }}">Register</a></p>
@endsection