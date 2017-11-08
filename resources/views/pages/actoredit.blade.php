@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-offset-3 col-md-6">
            <form class="form-horizontal" method="post" action="{{URL::to('actors/'.$actor->actor_id.'/edit')}}">
                {{method_field('PUT')}}
                {{csrf_field()}}
                <div class="form-group">
                    <label class="control-label" for="firstname">Firstname:</label>
                    <input type="text" class="form-control" id="firstname" name="firstname" value="{{$actor->firstname}}">
                </div>
                <div class="form-group">
                    <label for="lastname">Lastname:</label>
                    <input type="text" class="form-control" id="lastname" name="lastname" value="{{$actor->lastname}}">
                </div>
                <button type="submit" class="btn btn-primary">Update Actor</button>
            </form>
        </div>
    </div>
@stop
