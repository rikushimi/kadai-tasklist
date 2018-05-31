@extends('layouts.app')

@section('content')

    <h1>あなたのタスク</h1>
    <style>
    h1 {background-color: #CCFFFF;color:Red;font-size:40px;text-decoration: underline}
    </style>

  @if (count($tasks) > 0)
        <ul>
            @foreach ($tasks as $task)
                <li>{!! link_to_route('tasks.show', $task->id, ['id' => $task->id]) !!} : {{ $task->title }} > {{ $task->content }}</li>
            @endforeach
        </ul>
    @endif

    {!! link_to_route('tasks.create', '新規メッセージの投稿') !!}

@endsection
