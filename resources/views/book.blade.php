<!doctype html>
<html lang="{{ app()->getLocale() }}">

    <head>  
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <meta name="description" content="Creating a Employee table with Twitter Bootstrap. Learn with example of a Employee Table with Twitter Bootstrap.">  
{{-- <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet"> --}}
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <SCRIPT LANGUAGE=javascript> 
            function del() { 
                var msg = "確定要借書嗎？\n\n請確認！"; 
                if (confirm(msg)==true){ 
                    return true; 
                }else{ 
                    return false; 
                } 
            } 
            function del1() { 
                var msg = "確定要刪除嗎？\n\n請確認！"; 
                if (confirm(msg)==true){ 
                    return true; 
                }else{ 
                    return false; 
                } 
            }
            function myFunction1() {
                if ($("#book_id").val()!="") {
                    document.getElementById("book_id").style.backgroundColor = "turquoise";
                }else{
                    document.getElementById("book_id").style.backgroundColor = "white";
                }
            }
            function myFunction2() {
                if ($("#book_name").val()!="") {
                    document.getElementById("book_name").style.backgroundColor = "turquoise";
                }else{
                    document.getElementById("book_name").style.backgroundColor = "white";
                }
            }
            function myFunction3() {
                if ($("#book_author").val()!="") {
                    document.getElementById("book_author").style.backgroundColor = "turquoise";
                }else{
                    document.getElementById("book_author").style.backgroundColor = "white";
                }
            }
            function myFunction4() {
                if ($("#book_publisher").val()!="") {
                    document.getElementById("book_publisher").style.backgroundColor = "turquoise";
                }else{
                    document.getElementById("book_publisher").style.backgroundColor = "white";
                }
            }
        </SCRIPT>
        <style>
            html, body {
                background-image: url('public/image/5.jpg');
                min-height: 100%;
                background-size: cover;
                background-attachment: fixed;
                background-repeat: no-repeat;
                background-position: top center;
                font-family: 'Microsoft JhengHei', sans-serif;
                font-weight: 100;
                /*height: 100vh;*/
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
                height: 28px;
                text-shadow: 0 1px 1px rgba(0, 0, 0, 0.2) !important;
                background: rgb(66, 184, 221);
            }
            li {
                float: left;
                list-style: outside none none;
                padding-left: 5px;
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
                            <a href="{{ url('/personal_list') }}">個人列表</a>
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
                    @php
                        if(Request::has("book_id"))
                            $book_id = Request::input("book_id");
                        else
                            $book_id = "";
                        if(Request::has("book_name"))
                            $book_name = Request::input("book_name");
                        else
                            $book_name = "";
                        if(Request::has("book_author"))
                            $book_author = Request::input("book_author");
                        else
                            $book_author = "";
                        if(Request::has("book_publisher"))
                            $book_publisher = Request::input("book_publisher");
                        else
                            $book_publisher = "";
                        if(Request::has("insert_id"))
                            $insert_id = Request::input("insert_id");
                        else
                            $insert_id = "";
                        if(Request::has("edit"))
                            $edit = key(Request::input("edit"));
                        if(Request::has("lends"))
                            $lends = key(Request::input("lends"));
                        if(Request::has("insert"))
                            $insert = Request::input("insert");
                        if(Request::has("delete"))
                            $delete = key(Request::input("delete"));
                    @endphp
                    <table style="position: absolute; top:100px;left:70px; width: 1400px;border:3px #FFAC55 solid;padding:5px;" rules="all" cellpadding='5'>
                        <tr>
                            <td>編號：</td>
                            <td><input type="text" value="" name='book_id' id="book_id" onkeyup="myFunction1()"></td>
                            <td>書名：</td>
                            <td><input type="text" value="" name='book_name' id="book_name" onkeyup="myFunction2()"></td>
                            <td>作者：</td>
                            <td><input type="text" value="" name='book_author' id="book_author" onkeyup="myFunction3()"></td>
                            <td>出版社：</td>
                            <td><input type="text" value="" name='book_publisher' id="book_publisher" onkeyup="myFunction4()"></td>
                            <td><input type="submit" value="搜尋" name='search' style='color: white !important;border-radius: 4px !important;text-shadow: 0 1px 1px rgba(0, 0, 0, 0.2) !important;background: rgb(66, 184, 221) !important;'></td>
                        </tr>
                    </table>
                    <br>
                    <table style="position: absolute; top:160px;left:70px; width: 1400px;border:3px #FFAC55 solid;padding:5px;" rules="all" cellpadding='5'>
                        <tr style="background: yellow;">
                            <td align="content" width="14%">功能</td>
                            <td  width="10%">編號</td>
                            <td width="20%">書名</td>
                            <td width="15%">作者</td>
                            <td width="20%">出版社</td>
                            <td width="8%">語言</td>
                            <td width="8%">動態</td>
                        </tr>
                        @foreach($book as $i)
                            <tr>
                                <td align="content">
                                    @if((Auth::user()->name =='diana'))
                                        @if(isset($edit) && ($edit == $i->book_id))
                                            <input type="submit" value="儲存" class="button-secondary" name='save[{{ $i->book_id }}]' style="background: #FFBB00;">
                                        @elseif(isset($lends) && ($lends == $i->book_id))
                                            會員：<input type="text" name='insert_id'>
                                            {{-- <input type="" value='book_lend[{{ $i->book_id }}]'> --}}
                                            <input type="submit" value="確定" class="button-secondary" name='insert[{{ $i->book_id }}]' style="background: red;">
                                            <input type="submit" value="取消" class="button-secondary" name='can' style="background:  #888888;">
                                        @else
                                            @if($i->book_dynamic == 'YES')
                                                <input type="submit" value="借書" class="button-secondary" name='lends[{{ $i->book_id }}]'>
                                            @else
                                                <input type="submit" value="借書" class="button-secondary" style="background: #AAAAAA;" name='lends[{{ $i->book_id }}]' disabled>
                                            @endif
                                            <input type="submit" value="編輯" class="button-secondary" name='edit[{{ $i->book_id }}]' style="background: #FFBB00;">
                                            <input type="submit" value="刪除" class="button-secondary" name='delete[{{ $i->book_id }}]' style="background: red;" onclick="javascript:return del1()">
                                        @endif
                                    @else
                                        @if($i->book_dynamic == 'YES')
                                            可借閱
                                        @else
                                            已借出
                                        @endif
                                    @endif
                                </td>
                                    {{-- 


                                    @if(isset($edit) && ($edit == $i->book_id) && (Auth::user()->name =='diana'))
                                        <td align="content">
                                            <input type="submit" value="儲存" class="button-secondary" name='save[{{ $i->book_id }}]' style="background: #FFBB00;">
                                        </td>
                                    @else
                                        @if($i->book_dynamic == 'YES')
                                            <input type="submit" value="借書" class="button-secondary" name='lends[{{ $i->book_id }}]' onclick="javascript:return del()">
                                        @else
                                            <input type="submit" value="借書" class="button-secondary" style="background: #AAAAAA;" name='lends[{{ $i->book_id }}]' disabled>
                                        @endif
                                        @if(Auth::user()->name =='diana')
                                            <input type="submit" value="編輯" class="button-secondary" name='edit[{{ $i->book_id }}]' style="background: #FFBB00;">
                                            <input type="submit" value="刪除" class="button-secondary" name='delete[{{ $i->book_id }}]' style="background: red;" onclick="javascript:return del1()">
                                        @endif
                                    @endif --}}
                                
                                <td><a href="{{ url("book/detail?book_id=".$i->book_id) }}" style="text-decoration:none;color: #636b6f;">{{ $i->book_id }}</a></td>
                                <td>
                                    @if(isset($edit) && ($edit == $i->book_id))
                                        <input type="text" value="{{ $i->book_name }}" name='book_names' style="width: 50%">
                                    @else
                                        {{ $i->book_name }}
                                    @endif
                                </td>
                                <td>
                                    {{-- @php
                                        $book_authors = explode(",", $i->book_author);
                                        $count = count($book_authors);
                                    @endphp
                                    @foreach($book_authors as $key => $book_author)
                                        {{ $book_author }}
                                        @if($count > $key)
                                            <br>
                                        @endif
                                    @endforeach --}}
                                    @if(isset($edit) && ($edit == $i->book_id))
                                        <input type="text" value="{{ $i->book_author }}" name='book_authors' style="width: 80%">
                                    @else
                                        {{ $i->book_author }}
                                    @endif
                                </td>
                                <td>
                                    @if(isset($edit) && ($edit == $i->book_id))
                                        <input type="text" value="{{ $i->book_publisher }}" name='book_publishers' style="width: 100%">
                                    @else
                                        {{ $i->book_publisher }}
                                    @endif
                                </td>
                                <td>
                                    @if(isset($edit) && ($edit == $i->book_id))
                                        <input type="text" value="{{ $i->book_language }}" name='book_languages' style="width: 70%">
                                    @else
                                        {{ $i->book_language }}
                                    @endif
                                </td>
                                <td>
                                    @if($i->book_dynamic == 'YES')
                                        未借出
                                    @else
                                        已借出
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    {{-- <div class="pagination justify-content-center">
                        {{ $book->render() }}
                    </div> --}}
                </div>
            </div>
        </form>
    </body>
</form>