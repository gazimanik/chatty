@extends('template.default')
@section('content')
    <h1>Update Your Profile</h1>
    <div class="row">
        <div class="col-lg-6">
        <form action="{{ route('profile.edit') }}" role="form" method="post" class="form-vertical">
                <div class="row">
                    <div class="col-lg-6">
                    <div class="form-group{{ $errors->has('fname') ? ' has-error': '' }}">
                            <label for="fname" class="control-label">First Name</label>
                        <input type="text" name="fname" id="fname" class="form-control" value="{{ Request::old('fname') ?: Auth::user()->fname }}">
                        @if ($errors->has('fname'))
                            <span class="help-block">
                                {{ $errors->first('fname') }}
                            </span>
                        @endif
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group{{ $errors->has('lname') ? ' has-error': '' }}">
                            <label for="lname" class="control-label">Last Name</label>
                            <input type="text" name="lname" id="lname" class="form-control" value="{{ Request::old('lname') ?: Auth::user()->lname }}">
                            @if ($errors->has('lname'))
                            <span class="help-block">
                                {{ $errors->first('lname') }}
                            </span>
                        @endif
                        </div>
                    </div>
                </div>
                <div class="form-group{{ $errors->has('location') ? ' has-error': '' }}">
                    <label for="location" class="control-label">Location</label>
                    <input type="text" name="location" id="location" class="form-control" value="{{ Request::old('location') ?: Auth::user()->location }}">
                    @if ($errors->has('location'))
                            <span class="help-block">
                                {{ $errors->first('location') }}
                            </span>
                        @endif
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-default">Update</button>
                </div>
            <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>
        </div>
    </div>
@endsection