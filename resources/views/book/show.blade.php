@extends('layouts.app')


@section('content')
    <h2>{{$book->name}}</h2>
    <p>{{$book->description}}</p>
    <p>????? {{$book->bookAuthor->name}} {{$book->bookAuthor->surname}}</p>
@endsection
