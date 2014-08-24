

@extends('layouts/book')
@section('main')
<h1>Welcome to my bookshop</h1>
<p>{{ link_to_route('books.create', 'Create new book') }}</p>
@if ($booksList->count())
<table class="table table-striped table-bordered">
    <thead>
    <tr>
        <th>Id</th>
        <th>ISBN</th>
        <th>Title</th>
        <th>Author</th>
        <th>Publisher</th>
        <th>Language</th>
    </tr>
    </thead>

    <tbody>
    @foreach ($booksList as $book)
    <tr>
        <td>{{ $book->id }}</td>
        <td>{{ $book->isbn }}</td>
        <td>{{ $book->title }}</td>
        <td>{{ $book->author }}</td>
        <td>{{ $book->publisher }}</td>
        <td>@if ($book->language==1){{'English'}} @else{{'Spanish'}}
            @endif</td>
        <td>{{ link_to_route('books.show', 'Read', array($book->id),
            array('class' => 'btn btn-primary')) }}</td>
        <td>{{ link_to_route('books.edit', 'Update', array($book->id),
            array('class' => 'btn btn-warning')) }}</td>
        <td>
            {{ Form::open(array('method'=> 'DELETE', 'route' =>
            array('books.destroy', $book->id))) }}
            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
            {{ Form::close() }}
        </td>
    </tr>
    @endforeach
    </tbody>
</table>
@else
There are no books
@endif
@stop