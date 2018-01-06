<!doctype html>
<?php $language = strtolower(LaravelLocalization::getCurrentLocaleName());?>
@extends('layouts.app')

@section('content')
    <p>{{$word->$language}}&nbsp;<a href="#"><img src="/images/pluss.png" width="20" alt="picture"></a> </p>
    <p>{{$description[0]->$language}}</p>
@endsection