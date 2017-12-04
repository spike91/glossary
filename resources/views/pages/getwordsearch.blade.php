<!doctype html>
@extends('layouts.app')

@section('content')
    <table>
        <thead>
            <tr><th>Word</th></tr>
        </thead>
        <tbody>
            @foreach ($words as $w)
                <tr>
                    <td><a href="{{ URL::to('word/'.$w->id.'/'.$w->categoryID) }}" class="list-group-item list-group-item-action">{{$w->english}} ({{$w->categoryEnglish}})</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection