<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-image: url('public/image/2.jpg');
                /*min-height: 100%;*/
                background-size: cover;
                background-attachment: fixed;
                background-repeat: no-repeat;
                background-position: top center;
                background-repeat:no-repeat;
                color: #636b6f;
                font-family: 'Microsoft JhengHei', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 70px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 14px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
            .log{
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
                background: none;
                border: none;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <form id="form" name="query" method="post">
        {{ csrf_field() }}
            <div class="flex-center position-ref full-height">
                @if (Route::has('login'))
                    <div class="top-right links">
                        @if (Auth::check())
                            <a href="{{ url('/home') }}">Home</a>
                            @if(Auth::user()->name == 'diana')
                                <a href="">Hi {{ Auth::user()->name }} （所有權人）</a>
                            @else
                                <a href="">Hi {{ Auth::user()->name }}</a>
                            @endif
                            <input type="submit" class="log" value="log out" name='logout'>
                        @else
                            <a href="{{ url('/login') }}">Login</a>
                            <a href="{{ url('/register') }}">Register</a>
                        @endif
                    </div>
                @endif
                <div class="content">
                    <div class="row">
                        <div class="title m-b-md">
                            You are logged in!
                        </div>
                        <div class="col-md-8 col-md-offset-2">
                        <div class="links" style="vertical-align: top;">
                            <a href="{{ url('/../book_system/book') }}">書籍列表</a>
                            <a href="{{ url('/../book_system/personal_list') }}">個人列表</a>
                            <a href="{{ url('/../book_system/comment') }}">意見回饋</a>
                        </div>
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    @if (session('status'))
                                        <div class="alert alert-success">
                                            {{ session('status') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </body>
</html>

