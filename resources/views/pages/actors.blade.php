@extends('layouts.app')

@section('content')
    <div class="list-group">
    @foreach ($actors->sortBy('lastname') as $actor)
            <div class="list-group-item clearfix">
                <span class="glyphicon glyphicon-user"></span>
                <span>{{$actor->firstname}} {{$actor->lastname}}</span>
                <span class="pull-right">
                    <a href="{{URL::to('actors/'.$actor->actor_id.'/edit') }}" class="btn btn-xs btn-primary">
                            <span class="glyphicon glyphicon-pencil"></span>
                    </a>
                    <a href="{{URL::to('actors/'.$actor->actor_id.'/delete') }}" 
                            onclick="return confirm('Are you sure you want to delete?');"   
                            class="btn btn-xs btn-primary">
                            <span class="glyphicon glyphicon-trash"></span>
                    </a>
                </span>
            </div>
    @endforeach
    </div>
    <div class="row">
        <div class="col-md-offset-3 col-md-6">
            <h3>Add new actor</h3>
            <form class="form-horizontal" method="post" action="actors/add">
                {{csrf_field()}}
                <div class="form-group">
                    <label class="control-label" for="firstname">Firstname:</label>
                    <input type="text" class="form-control" id="firstname" name="firstname" value="{{old('firstname')}}">
                </div>
                <div class="form-group">
                    <label for="lastname">Lastname:</label>
                    <input type="text" class="form-control" id="lastname" name="lastname" value="{{old('lastname')}}">
                </div>
                <button type="submit" class="btn btn-primary">Add Actor</button>
            </form>

            @if (count($errors)>0)
                <ul>
                @foreach ($errors->all() as $err)
                    <li>{{$err}}</li>
                @endforeach
                </ul>
            @endif

        </div>
    </div>
@stop
