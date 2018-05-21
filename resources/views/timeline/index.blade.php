@extends('template.default')
@section('content')
    <div class="timeline-body">
        <div class="row">
            <div class="col-lg-6">
                <form role="form" action="{{ route('status.post') }}" method="post">
                    <div class="form-group{{ $errors->has('status') ? ' has-error':'' }}">
                    <textarea placeholder="Whats's happen with you new today!!!! {{ Auth::user()->getFnameOrUsername() }}" cols="85" rows="3" name="status"></textarea>
                    @if ($errors->has('status'))
                        <span class="help-block">{{ $errors->first('status') }}</span>
                    @endif
                    </div>
                    <button type="submit" class="btn btn-small">Post</button>
                    <input type="hidden" name="_token" value="{{ Session::token() }}">
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                @if (!$statuses->count())
                    <p>Nothing to show you.......</p>
                @else
                    @foreach ($statuses as $status)
                        <div class="status">
                            <div class="media">
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
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection