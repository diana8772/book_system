<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script type="text/javascript">
        document.getElementsByTagName('input')[0].value = window.location.hash.substring(1);
    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <img height="200" width="100%" src="{{ asset("public/image/header.jpg") }}">
                    <table style="background: #66FFFF; width: 100%;">
                        <tr>
                            <td>
                                {{-- <a href='{{ url('/../book_system/login') }}'>登入</a> --}}
                                <a href='{{ url('/../book_system/book') }}'>書籍列表</a>
                            </td>
                            <td>
                                <a href='{{ url('/../book_system/personal_list') }}'>個人列表</a>
                            </td>

                        </tr>
                    </table>
                    <br>
                </div>
            </div>
        </nav>
        @yield('content')
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
