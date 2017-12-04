<!doctype html>
@extends('layouts.app')

@section('content')
    <p>{{$word->english}}</p>
    <p>{{$description[0]->english}}</p>
@endsection