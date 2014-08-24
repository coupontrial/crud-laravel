

@extends('layouts.book')
@section('main')
<h1>Create Book</h1>
{{ Form::open(array('route' => 'books.store')) }}
<ul>
    <li>
        {{ Form::label('ISBN', 'ISBN:') }}
        {{ Form::text('isbn') }}
    </li>
    <li>
        {{ Form::label('Title', 'Title:') }}
        {{ Form::text('title') }}
    </li>
    <li>
        {{ Form::label('Author', 'Author:') }}
        {{ Form::text('author') }}
    </li>
    <li>
        {{ Form::label('Publisher', 'Publisher:') }}
        {{ Form::text('publisher') }}
    </li>
    <li>
        {{ Form::label('Language', 'Language') }}
        {{ Form::select('language', array('0' => 'Select a Level',
        '1' => 'English', '2' => 'Spanish'), Input::old('language'),
        array('class' => 'form-control')) }}
    </li>
    <li>
        {{ Form::submit('Save', array('class' => 'btn btn-primary')) }}
    </li>
</ul>
{{ Form::close() }}
@if ($errors->any())
<ul>
    {{ implode('', $errors->all('<li class="error">:message</li>')) }}
</ul>
@endif
@stop