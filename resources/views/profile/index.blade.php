@extends('template.default')
@section('content')
    <div class="row">
        <div class="col-lg-6">
            @include('user.partial.userblock')
            <hr>
            @if (!$statuses->count())
                <p>{{ $user->getNameOrUsername() }}, has not post yet</p>
            @else
                @foreach ($statuses as $status)
                    <div class="media status">
                        <a href="{{ route('profile.index', ['username' => $status->user->username]) }}" class="pull-left">
                            <img class="media-object" src="{{ $status->user->getAvatarUrl() }}" alt="">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading"><a href="{{ route('profile.index', ['username' => $status->user->username]) }}">{{ $status->user->getNameOrUsername() }}</a></h4>
                            <p>{{ $status->body }}</p>
                            <ul class="list-inline">
                                <li>{{ $status->created_at->diffForHumans() }}</li>
                                @if ($status->user->id !== Auth::user()->id)
                                    <li><a href="{{ route('status.like', ['statusId' => $status->id]) }}">like</a></li>
                                @endif
                                <li>{{ $status->likes->count() }} {{ str_plural('like', $status->likes->count()) }}</li>
                            </ul>

                            {{--  <div class="media">
                                <a href="#" class="pull-left">
                                    <img class="media-object" src="" alt="">
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading"><a href="#">Gazi</a></h4>
                                    <p>This is so cool</p>
                                    <ul class="list-inline">
                                        <li>2 min ago</li>
                                        <li><a href="#">like</a></li>
                                        <li>10 likes</li>
                                    </ul>
                                </div>
                            </div>  --}}
                            
                            @if ($authUserIsFriend || Auth::user()->id === $status->user->id)
                                <form action="{{ route('status.reply', ['statusId' => $status->id]) }}" role="form" method="post">
                                    <div class="form-group{{ $errors->has("reply-{$status->id}") ? ' has-error': '' }}">
                                        <input type="text" name="reply-{{ $status->id }}" placeholder="Type comment">
                                        @if ($errors->has("reply-{$status->id}"))
                                            <span class="help-block">{{ $errors->first("reply-{$status->id}") }}</span>
                                        @endif
                                    </div>
                                    <input type="submit" value="Reply" class="btn btn-xs">
                                    <input type="hidden" name="_token" value="{{ Session::token() }}">
                                </form>
                            @endif 
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
        <div class="col-lg-3 col-lg-offset-3">

            @if (Auth::user()->hasFriendRequestPending($user))
                <p>You are waiting for being a friend of {{ $user->getFnameOrUsername() }}</p>
            @elseif (Auth::user()->hasFriendRequestReceived($user))
            <a href="{{ route('friend.accept', ['username' => $user->username]) }}" class="btn btn-primary">Accept Request</a>
            @elseif (Auth::user()->isFriendWith($user))
                <p> You and {{ $user->getFnameOrUsername() }} are Friend </p>
            @elseif(Auth::user()->id !== $user->id)
        <a href="{{ route('friend.add', ['username' => $user->username]) }}" class="btn btn-primary">Add Friend</a>
            @endif


        <h4>{{ $user->getFnameOrUsername() }}'s friend</h4>
        @if (!$user->friends()->count())
            {{ $user->getFnameOrUsername() }}'s has no friend
        @else
            
                    @foreach ($user->friends() as $user)
                    <div class="status">
                    @include('user.partial.userblock')
                </div>
                @endforeach
            
        @endif
        </div>
    </div>
@endsection