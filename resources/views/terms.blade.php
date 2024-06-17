@extends('layout.layout')

@section('content')
    <div class="row">
        <div class="col-3">
            @include('shared.left-sidebar')
        </div>
        <div class="col-6">
            <h1>Terms</h1>
            <div>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Architecto dignissimos repellat alias commodi
                    voluptates iusto incidunt. Earum doloremque voluptas ut quis eum delectus sunt ipsam nemo aliquam ipsa?
                    Dolor, distinctio?</p>
            </div>
        </div>
        <div class="col-3">
            @include('shared.search-bar')
            @include('shared.follow-box')
        </div>
    @endsection
