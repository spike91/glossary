@extends('layouts.app')

@section('content')
   <h1 class="text-center bg-primary">{{$film->title}}</h1>
   <p>{{$film->description}}</p>
   <p><strong>Language:</strong> {{$film->language->name}}</p>
   <h3>Actors:</h3>
   @foreach($film->actors()->orderBy('lastname')->get() as $actor)
        <div class="media">
            <div class="media-left">
                <img src="{{URL::to('images/person.jpg')}}" class="media-object" style="width:40px">
            </div>
            <div class="media-body">
                <h4 class="media-heading">{{$actor->firstname}} {{$actor->lastname}}</h4>
                <p><span class="label label-default">{{$actor->pivot->cast}}</span></p>
            </div>
        </div>
    @endforeach
@stop









