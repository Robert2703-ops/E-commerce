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
            <label for="">Name: </label>
            <input type="text" name="name" id="">
        </div>

        <div>
            <label for="">Email: </label>
            <input type="email" name="email" id="">
        </div>

        <div>
            <label for="">Password: </label>
            <input type="password" name="password" id="">
        </div>

        <div>
            <label for="">Confirm your password: </label>
            <input type="password" name="password_confirmation" id="">
        </div>

        <div>
            <input type="submit" value="login">
        </div>
    </form>
@endsection