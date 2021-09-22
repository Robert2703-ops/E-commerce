@extends('templates.forms-template')

@section('page-title')
    Register
@endsection

@section('form-title')
    <h2>Register</h2>
@endsection

@section('form')
    <form action="" method="post">
        @csrf
        <div>
            <label for="" class="form-label">Name: </label>
            <input type="text" name="name" class="input-info input">
        </div>

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
            <label for="" class="form-label">Confirm your password: </label>
            <div class="show-password">
                <input type="password" name="password_confirmation" class="input-info input">
                <button type="button"><i class="fas fa-eye-slash"></i></button>
            </div>
        </div>

        <div>
            <input type="submit" value="create" class="input-submit submit">
        </div>
    </form>
@endsection

@section('link')
    <p>Have an account alredy? <a href="{{ route('login') }}">Login</a></p> 
@endsection