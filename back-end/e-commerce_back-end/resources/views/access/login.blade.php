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
            <label for="">Email: </label>
            <input type="email" name="email" id="">
        </div>

        <div>
            <label for="">Password: </label>
            <input type="password" name="password" id="">
        </div>

        <div>
            <input type="submit" value="login">
        </div>
    </form>
@endsection