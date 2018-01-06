<!doctype html>
@extends('layouts.app')

@section('content')
    <p>{{$word->english}}&nbsp;<a href="/"><img src="/images/pluss.png" width="20" alt="picture"></a> </p>
    <p>{{$description[0]->english}}</p>
@endsection