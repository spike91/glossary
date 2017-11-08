@extends('layouts.app')

@section('content')
    <div class="list-group">
    @foreach ($categories as $category)
       @if($category->films()->count()>0)
            <a href="categories/{{$category->category_id}}" class="list-group-item list-group-item-info">{{$category->name}}
                <span class="badge">{{$category->films()->count()}}</span></a>  
        @else
           <a href="#" class="list-group-item list-group-item-default disabled">{{$category->name}}
                <span class="badge">0</span></a>      
        @endif
    @endforeach
    </div>
   
@stop
