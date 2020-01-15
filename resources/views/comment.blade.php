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
            function in() { 
                var msg = "確定要送出嗎？\n\n請確認！"; 
                if (confirm(msg)==true){ 
                    return true; 
                }else{ 
                    return false; 
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
            .acc{
                background: #05c46b;
                color: #fff;
                letter-spacing: 1px;
                padding: 12px 50px;
                font-size: 16px;
                display: inherit;
                border-radius: 4px;
            }
            .ml-auto, .mx-auto {
                margin-left: auto !important;
            }
            .btn {
                display: inline-block;
                font-weight: 400;
                text-align: center;
                white-space: nowrap;
                vertical-align: middle;
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
                        if(Request::has("email"))
                            $email = Request::input("email");
                        else
                            $email = "";
                        if(Request::has("phone"))
                            $phone = Request::input("phone");
                        else
                            $phone = "";
                        if(Request::has("message"))
                            $message = Request::input("message");
                        else
                            $message = "";
                        if(Request::has("insert"))
                            $insert = key(Request::input("insert"));
                        
                    @endphp
                    {{-- <table style="position: absolute; top:100px;left:100px; width: 1400px;border:3px #FFAC55 solid;padding:5px;" rules="all" cellpadding='5'>
                        <tr>
                            <td><input type="text" name='comment_id'></td>
                            <td>書名：</td>
                            <td><input type="text" name='comment'></td>
                            {{-- <td>作者：</td> --}}
                            {{-- <td><input type="submit" name='comment_insert'></td> --}}
                            {{-- <td><input type="submit" value="搜尋" name='comment_insert' style='color: white !important;border-radius: 4px !important;text-shadow: 0 1px 1px rgba(0, 0, 0, 0.2) !important;background: rgb(66, 184, 221) !important;'></td>
                        </tr>
                        <tr>
                            <td><textarea rows="20" cols="20"></textarea></td>
                        </tr>
                    </table>
                    <br>
                    <table style="position: absolute; top:160px;left:100px; width: 1400px;border:3px #FFAC55 solid;padding:5px;" rules="all" cellpadding='5'>
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
                                    @if(isset($edit) && ($edit == $i->book_id) && (Auth::user()->name =='diana'))
                                        <input type="submit" value="儲存" class="button-secondary" name='save[{{ $i->book_id }}]' style="background: #FFBB00;">
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
                                    @endif
                                </td>
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
                                    {{-- @if(isset($edit) && ($edit == $i->book_id))
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
                    </table>  --}}
                </div>
            </div>
            <section class="ab-info-main py-5" id="contact" style="position: absolute;top:60px;left:60px; width: 1400px;border:3px #FFAC55 solid;padding:5px;" rules="all" cellpadding='5'>
                <div class="container py-xl-5 py-lg-3">
                    <div class="title-section text-center mb-md-5 mb-4">
                        <h3 class="w3ls-title mb-3">Contact <span>Us</span></h3>
                    </div>
                    <div class="row contact-agileinfo pt-lg-4">
                        <!-- contact address -->
                        <div class="col-md-5 address">
                            <h3 class="footer-title mb-4 pb-lg-2">Our Address</h3>
                            <div class="row address-info-w3ls">
                                <div class="col-3 address-left">
                                    <img src="images/c1.png" alt="" class="img-fluid">
                                </div>
                                <div class="col-9 address-right mt-2">
                                    <img src="{{"public/image/c1.png"}}" style="width: 30%;height: 70px;">
                                    <h5 class="address mb-2">Address</h5>
                                    <p> California, USA</p>
                                </div>
                            </div>
                            <div class="row address-info-w3ls my-2">
                                <div class="col-3 address-left">
                                    <img src="images/c2.png" alt="" class="img-fluid">
                                </div>
                                <div class="col-9 address-right mt-2">
                                    <img src="{{"public/image/c1.png"}}" style="width: 30%;height: 70px;">
                                    <h5 class="address mb-2">Email</h5>
                                    <p>
                                        <a href="mailto:example@email.com" style="color: #0044BB;"> mail@example.com</a>
                                    </p>
                                </div>
                            </div>
                            <div class="row address-info-w3ls">
                                <div class="col-3 address-left">
                                    <img src="images/c3.png" alt="" class="img-fluid">
                                </div>
                                <div class="col-9 address-right mt-2">
                                    <img src="{{"public/image/c1.png"}}" style="width: 30%;height: 70px;">
                                    <h5 class="address mb-2">Phone</h5>
                                    <p>+1 234 567 8901</p>
                                </div>
                            </div>
                        </div>
                        <!-- //contact address -->
                        <!-- contact form -->
                        <div class="col-lg-7 contact-right mt-lg-0 mt-5">
                            <form action="#" method="post">
                                <div class="row">
                                    <div class="col-lg-6 form-group pr-lg-2" style="height: 50px;">
                                        <input type="text" hidden>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" placeholder="Email">
                                </div>
                                <br>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="phone" placeholder="Phone">
                                </div>
                                <br>
                                <div class="form-group">
                                    <textarea name="message" class="form-control" placeholder="Message" rows="8"></textarea>
                                </div>
                                <br>
                                <div style="text-align: center;">
                                    <input type="submit" class="btn submit-contact-main ml-auto acc" name="insert[{{$member_id}}]" value="Submit" onclick="javascript:return in()">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </form>
    </body>
</form>