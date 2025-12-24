@extends('layouts.app')

@section('title', 'Уведомления')

@section('content')
    <h1>Уведомления</h1>
    @if($notifications->isEmpty())
        <p>У вас нет новых уведомлений.</p>
    @else
        <ul class="list-group">
            @foreach($notifications as $notification)
                <li class="list-group-item">
                    <a href="{{ route('news.show', ['article' => $notification->data['article_id']]) }}">
                        {{ $notification->data['title'] }}
                    </a>
                    <span class="text-muted float-end">{{ $notification->created_at->diffForHumans() }}</span>
                </li>
            @endforeach
        </ul>
    @endif
@endsection
