@extends('layouts.app1')

@section('content')
<style scoped>
    .button-secondary {
        color: white;
        border-radius: 4px;
        text-shadow: 0 1px 1px rgba(0, 0, 0, 0.2);
        background: rgb(66, 184, 221);
    }
    body {
        background: url("public/image/qwe.gif");
        background-size: 325px;
    }
</style>
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading"></div>

            <div class="panel-body" style="background-color: #AAFFEE;position: absolute; top:150px;left:400px;width: 50%">
                <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                    {{ csrf_field() }}
                    
                    <div class="form-group{{ $errors->has('member_id') ? ' has-error' : '' }} position:absolute;">
                        <label for="member_id" class="col-md-4 control-label">member_id</label>

                        <div class="col-md-6">
                            <input id="member_id" type="text" class="form-control" style="width: 300px" name="member_id" value="{{ old('member_id') }}" required autofocus>

                            @if ($errors->has('member_id'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('member_id') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <br>
                    
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">Name</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" style="width: 300px" name="name" value="{{ old('name') }}" required autofocus>

                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <br>

                    <div class="form-group{{ $errors->has('idcard') ? ' has-error' : '' }}">
                        <label for="idcard" class="col-md-4 control-label">idcard</label>

                        <div class="col-md-6">
                            <input id="idcard" type="text" class="form-control" style="width: 300px" name="idcard" value="{{ old('idcard') }}" required autofocus>

                            @if ($errors->has('idcard'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('idcard') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <br>

                    <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                        <label for="phone" class="col-md-4 control-label">phone</label>

                        <div class="col-md-6">
                            <input id="phone" type="text" class="form-control" style="width: 300px" name="phone" value="{{ old('phone') }}" required autofocus>

                            @if ($errors->has('phone'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('phone') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <br>

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control" style="width: 300px" name="email" value="{{ old('email') }}" required>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <br>
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="col-md-4 control-label">Password</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control" style="width: 300px" name="password" required>

                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control"style="width: 300px"  name="password_confirmation" required>
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary button-secondary pure-button">
                                Register
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
