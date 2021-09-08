<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('page-title')</title>
</head>
<body>
    <div class="body">
        <div class="flex-content">
            <div class="main-content">

                <div class="messages">
                    @if (session()->has('message'))
                        <ul type="none">
                            <li style="color: rgb(25, 180, 25)">{{ session()->get('message') }}</li>
                        </ul>
                    @endif
                </div>

                <div class="form">
                    <div class="title">
                        @yield('form-title')
                    </div>

                    @if ($errors->any())
                        <ul type = "none" class="error">
                            @foreach ($errors->all() as $error)
                                <li>⛔ {{ $error }} </li>
                            @endforeach
                        </ul>
                    @endif

                    <div class="form-content">
                        @yield('form')
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>
</html>