{{-- @foreach ($users as $user)
    <h1> {{$user['name']}} </h1>
    <h2> {{$user['age']}} </h2>
    @if ($user['age'] < 18)
     <p> User can't drive </p>
    @endif

    <hr>
@endforeach

@copyright {{ date('Y')}} --}}
@extends('layout.layout')

@section('content')
    <div class="row">
        <div class="col-3">
            @include('shared.left-sidebar')
        </div>
        <div class="col-6">
            @include('shared.success-message')
            @include('shared.submit-idea')
            <hr>
            @foreach ($brains as $brain)
                <div class="mt-3">
                    @include('shared.idea-card')
                </div>
            @endforeach
            <div class="mt-3">
                {{ $brains->links() }}

            </div>

        </div>
        <div class="col-3">
            @include('shared.search-bar')
           @include('shared.follow-box')
        </div>
    </div>
@endsection
