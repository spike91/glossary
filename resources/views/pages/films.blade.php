@extends('layouts.app')

@section('content')
    <h1 class="text-center bg-primary">Films</h1>
    @if(empty($films))
        <p>There are no films</p>
    @else
        @foreach ($films as $film)
            <div class="list-group">
                <!--<a href="films/{{$film->film_id}}" class="list-group-item list-group-item-info">{{$film->title}}</a>-->
                <a href="{{URL::to('films/'.$film->film_id)}}" class="list-group-item list-group-item-info">{{$film->title}}</a>     
            </div>
        @endforeach
    @endif
@stop
