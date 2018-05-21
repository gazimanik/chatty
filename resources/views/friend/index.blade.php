@extends('template.default')
@section('content')
    <div class="row">
        <div class="col-lg-6">
                <h4>Your friend</h4>
                @if (!$friend->count())
                    <p>you have no friend </p>
                @else
                    @foreach ($friend as $user)
                        <div class="status">                     @include('user.partial.userblock')                 </div>
                    @endforeach
                @endif
        </div>
        <div class="col-lg-3 col-lg-offset-3">
            <h5>Friend Request</h5>
                @if (!$request->count())
                    <p>you have no friend request to accept</p>
                @else
                    @foreach ($request as $user)
                        <div class="status">                     @include('user.partial.userblock')                 </div>
                    @endforeach
                @endif
        </div>
    </div>
@endsection