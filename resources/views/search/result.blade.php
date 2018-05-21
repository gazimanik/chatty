@extends('template.default')
@section('content')
    <h4>Result for <u> {{ Request::input('query') }} </u></h4>
    @if (!$users->count())
        <p>No Result found</p>
        @else
        <div class="row">
            <div class="col-lg-12">
                @foreach ($users as $user)
                    @include('user.partial.userblock')                    
                @endforeach
            </div>
        </div>
    @endif
        
@endsection