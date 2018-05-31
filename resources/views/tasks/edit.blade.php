@extends('layouts.app')

@section('content')

    <h1>id: {{ $task->id }} のタスク編集</h1>

    {!! Form::model($task, ['route' => ['tasks.update', $task->id], 'method' => 'put']) !!}

        {!! Form::label('status', 'タイトル:') !!}
        {!! Form::text('status') !!}

        {!! Form::label('content', 'メッセージ:') !!}
        {!! Form::text('content') !!}

        {!! Form::submit('更新') !!}

    {!! Form::close() !!}

@endsection