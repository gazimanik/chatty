@extends('template.default')
@section('content')
    <div class="row">
        <div class="col-lg-6">
            <form action="{{route('auth.login')}}" class="form-vertical" role="form" method="POST">
                <div class="form-group{{ $errors->has('email') ? ' has-error':'' }}">
                    <label for="email" class="control-label">Email</label>
                    <input type="text" name="email" id="email" class="form-control" placeholder="example@gmail.com">
                    @if ($errors->has('email'))
                        <span class="help-block">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error':'' }}">
                    <label for="password" class="control-label">Password</label>
                    <input type="text" name="password" id="password" class="form-control" placeholder="password">
                    @if ($errors->has('password'))
                        <span class="help-block">{{ $errors->first('password') }}</span>
                    @endif
                </div>
                <div class="checkbox">
                    <label for="">
                        <input type="checkbox" name="remember" id=""> Remember Me
                    </label>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-default">SUBMIT</button>
                </div>
                <input type="hidden" name="_token" value="{{Session::token()}}">
            </form>
        </div>
    </div>
@endsection