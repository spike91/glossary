<!doctype html>
<?php $language = strtolower(LaravelLocalization::getCurrentLocaleName());?>
@extends('layouts.app')

@section('content')
    <p>{{$word->$language}}&nbsp;
    @if ( Auth::user() )
        @if ( !Auth::user()->wordIsExistInGlossary($description[0]->id) )
        <a href="{{ LaravelLocalization::getLocalizedURL(null, 'glossary/add/word/id='.$word->id, [], true) }}"><img src="/images/pluss.png" width="20" alt="picture"></a> </p>
        @else()
        <a href="{{ LaravelLocalization::getLocalizedURL(null, 'glossary/delete/word/id='.$word->id, [], true) }}"><img src="/images/minus.png" width="20" alt="picture"></a> </p>
        @endif
    @endif
    <p>{{$description[0]->$language}}</p>
@endsection