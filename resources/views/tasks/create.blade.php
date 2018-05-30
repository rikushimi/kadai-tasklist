@extends('layouts.app')

@section('content')

    <h1>newタスク!!</h1>
    <style>
    h1 {color:#444444;font-size:40px;text-decoration: underline}
    </style>

    {!! Form::model($task, ['route' => 'tasks.store']) !!}

        {!! Form::label('content', 'タスク:') !!}
        {!! Form::text('content') !!}

        {!! Form::submit('入力') !!}

    {!! Form::close() !!}

@endsection