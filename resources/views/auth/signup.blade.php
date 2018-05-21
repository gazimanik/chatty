@extends('template.default')
@section('content')
    <div class="row">
        <div class="col-lg-6">
            <form action="{{route('auth.signup')}}" class="form-vertical" role="form" method="POST">
                <div class="form-group{{ $errors->has('email') ? ' has-error':'' }}">
                    <label for="email" class="control-label">Email</label>
                    <input type="text" name="email" id="email" class="form-control" placeholder="example@gmail.com" value="{{ Request::old('email') ?: '' }}">
                    @if ($errors->has('email'))
                        <span class="help-block">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('username') ? ' has-error':'' }}">
                    <label for="username" class="control-label">Username</label>
                    <input type="text" name="username" id="username" class="form-control" placeholder="ex: gazimanik" value="{{ Request::old('username') ?: '' }}">
                    @if ($errors->has('username'))
                        <span class="help-block">{{ $errors->first('username') }}</span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error':'' }}">
                    <label for="password" class="control-label">Password</label>
                    <input type="text" name="password" id="password" class="form-control" placeholder="password">
                    @if ($errors->has('password'))
                        <span class="help-block">{{ $errors->first('password') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-default">SUBMIT</button>
                </div>
                <input type="hidden" name="_token" value="{{Session::token()}}">
            </form>
        </div>
    </div>
@endsection