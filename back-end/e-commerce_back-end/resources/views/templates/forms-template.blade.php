<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('page-title')</title>

    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/form-template.css">

    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
</head>
<body>
    <div class="body">
        <div class="flex-content">
            <div class="main-content">

                
                @if (session()->has('message'))
                    <div class="messages">
                        <ul type="none">
                            <li style="color: rgb(25, 180, 25)">{{ session()->get('message') }}</li>
                        </ul>
                    </div>
                @endif

                <div class="form">
                    <div class="title">
                        @yield('form-title')
                    </div>

                    @if ($errors->any())
                        <ul type = "none" class="error">
                            @foreach ($errors->all() as $error)
                                <li style="color: red">⛔ {{ $error }} </li>
                            @endforeach
                        </ul>
                    @endif

                    <div class="form-content">
                        @yield('form')
                    </div>

                    <div class="link">
                        @yield('link')
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="/js/show-password.js"></script>
</body>
</html>