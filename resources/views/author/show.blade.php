@extends('layouts.app')


@section('content')
    <h2>{{$author->name}}</h2>
    <p>{{$author->surname}}</p>
    {{-- <p>{{dd ($author->authorBooks)}}</p> --}}

    <h2>Total books: {{$books_count}}</h2>
    @foreach ($books as $book)
    <p>Book name: {{$book->name}}</p>
    <p>Book description: {{$book->description}}</p>
    @endforeach
@endsection
