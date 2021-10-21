@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Book') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('book.update', [$book]) }}">
                        @csrf

                        <div class="form-group row">
                            <label for="book_name" class="col-md-4 col-form-label text-md-right">{{ __('Book name') }}</label>

                            <div class="col-md-6">
                                <input id="book_name" type="text" class="form-control" name="book_name" value="{{$book->name}}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="book_description" class="col-md-4 col-form-label text-md-right">{{ __('Book description') }}</label>

                            <div class="col-md-6">
                                <textarea name="book_description">{{$book->description}}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">

                            <label for="book_authorid" class="col-md-4 col-form-label text-md-right">{{ __('Book Author') }}</label>
                            <div class="col-md-6">
                                <select class="form-control" name="book_authorid">
                                   {{-- Turetu pasizymeti sena reiksme --}}
                                    @foreach ($authors as $author)

                                        <option value="{{$author->id}}" @if($author->id == $book->author_id) selected @endif >{{$author->name}} {{$author->surname}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Edit') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
