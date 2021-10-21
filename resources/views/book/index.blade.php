@extends('layouts.app')

@section('content')

@if(session()->has('sucess_message'))
<div class="alert alert-success">
{{session()->get("sucess_message")}}
</div>
@endif

<div class="cotainer">
<table class="table table-stripped">


    <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Description</th>
    <th>Author</th>
    <th>Actions</th>
    <th> Actions </th>
    <th> Actions </th>
    </tr>

    @foreach ($books as $book)

    <tr>
    <td>{{$book->id}}</td>
    <td>{{$book->name}}</td>
    <td>{!! $book->description !!}</td>
    <td>{{$book->bookAuthor->name}} {{$book->bookAuthor->surname}}</td>
    <td><a href="{{route('book.show',[$book])}}" class="btn btn-secondary">Show </a></td>
    <td><a href="{{route('book.edit',[$book])}}" class="btn btn-primary">Edit </a></td>
    <td><form method="post" action={{route('book.destroy',[$book])}}>
        @csrf
        <button type="submit" class="btn btn-danger">DELETE</button>
    </form>
</td>
</tr>
@endforeach

</table>
</div>
@endsection
