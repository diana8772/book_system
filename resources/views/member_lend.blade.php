<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <SCRIPT LANGUAGE=javascript> 
            function del() { 
                var msg = "確定要還書嗎？\n\n請確認！"; 
                if (confirm(msg)==true){ 
                    return true; 
                }else{ 
                    return false; 
                } 
            } 
        </SCRIPT>
        <style>
            html, body {
                background-image: url('public/image/back1.png');
                min-height: 100%;
                background-size: cover;
                background-attachment: fixed;
                background-repeat: no-repeat;
                background-position: center center;
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
                font-size: 12px;
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
            .button-secondary {
                color: white !important;
                border-radius: 4px !important;
                height: 25px;
                text-shadow: 0 1px 1px rgba(0, 0, 0, 0.2) !important;
                background: rgb(66, 184, 221);
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
                            <a href="{{ url('/book') }}">書籍列表</a>
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
                <div class="content" style="">
                    <table style="position: absolute; top:100px;left:100px; width: 1300px;border:3px #FFAC55 solid;padding:5px;" rules="all" cellpadding='5'; border="1">
                        <tr style="background: yellow;">
                            <td>功能</td>
                            <td>編號</td>
                            <td>書名</td>
                            <td>借書時間</td>
                            <td>還書時間</td>
                            <td>動態</td>
                        </tr>
                        @foreach($personal as $i)
                            <tr>
                                <td>
                                    @if($i->book_status == 'YES')
                                        <input type="submit" value="還書" class="button-secondary" name='borrows[{{ $i->book_id }}]' style="background: #AAAAAA;" disabled>
                                    @else
                                        <input type="submit" value="還書" class="button-secondary" name='borrows[{{ $i->book_id }}]' onclick="javascript:return del()">
                                    @endif
                                </td>
                                <td>{{ $i->book_id }}</td>
                                <td>{{ $i->book_name }}</td>
                                <td>{{ $i->lend_time }}</td>
                                <td>
                                    @if($i->lend_time <> $i->borrow_time)
                                        {{ $i->borrow_time }}
                                    @endif
                                </td>
                                <td>
                                    @if($i->book_status == 'YES')
                                        未借出
                                    @else
                                        已借出
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </form>
    </body>
</html>