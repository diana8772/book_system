<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <SCRIPT LANGUAGE=javascript> 
            function del() { 
                var msg = "確定要借書嗎？\n\n請確認！"; 
                if (confirm(msg)==true){ 
                    return true; 
                }else{ 
                    return false; 
                } 
            } 
        </SCRIPT>
        <style>
            html, body {
                /*background-image: url('public/image/2.gif');*/
                background-size: 95% !important;
                min-height: 100%;
                background-size: cover;
                background-attachment: fixed;
                background-repeat: no-repeat;
                background-position: center center;
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
    <body background="{{url('public/image/true1.jpg')}}">
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
                <div class="content">
                    <table style="position: absolute; top:100px;left:300px; width: 1000px;border:3px #FFAC55 solid;padding:5px;" rules="all" cellpadding='5'>
                        <tr>
                            <td width="40%" style="background: yellow;">封面</td>
                            <td width="10%" style="background: yellow;">編號</td>
                            <td width="50%">{{ $book_detail[0]->book_id }}</td>
                        </tr>
                        <tr><td rowspan="6"><img src="{{url('public/image/book/'.$book_detail[0]->book_image)}}.jpg"></td>
                            <td style="background: yellow;">書名</td>
                            <td>{{ $book_detail[0]->book_name }}</td>
                        </tr>
                        <tr>
                            <td style="background: yellow;">作者</td>
                            <td>
                                @php
                                    $book_authors = explode(",", $book_detail[0]->book_author);
                                    $count = count($book_authors);
                                @endphp
                                @foreach($book_authors as $key => $book_author)
                                    {{ $book_author }}
                                    @if($count > $key)
                                        <br>
                                    @endif
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <td style="background: yellow;">出版社</td>
                            <td>{{ $book_detail[0]->book_publisher }}</td>
                        </tr>
                        <tr>
                            <td style="background: yellow;">出版日期</td>
                            <td>{{ $book_detail[0]->book_publish_time }}</td>
                        </tr>
                        <tr>
                            <td style="background: yellow;">內容簡介</td>
                            <td>{{ $book_detail[0]->book_summary }}</td>
                        </tr>
                        <tr>
                            <td style="background: yellow;">動態</td>
                            <td>
                                @if($book_detail[0]->book_dynamic == 'YES')
                                    未借出
                                @else
                                    已借出
                                @endif
                            </td>
                        </tr>
                        {{-- <tr>
                            <td colspan="3">
                                @if($book_detail[0]->book_dynamic == 'YES')
                                    <input type="submit" value="借書" class="button-secondary" name='lends[{{ $book_detail[0]->book_id }}]' onclick="javascript:return del()">
                                @else
                                    <input type="submit" value="借書" class="button-secondary" style="background: #AAAAAA;" name='lends[{{ $book_detail[0]->book_id }}]' disabled>
                                @endif
                            </td>
                        </tr> --}}
                    </table>
                </div>
            </div>
        </form>
    </body>
</form>