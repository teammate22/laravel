@extends('layouts.app')

@section('title', 'Профиль')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>Профиль пользователя</h4>
                </div>
                <div class="card-body">
                    @if(session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-4 text-center">
                            <div class="mb-3">
                                <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center mx-auto"
                                     style="width: 150px; height: 150px;">
                                    <span class="text-white display-4">{{ Str::upper(substr(Auth::user()->name, 0, 1)) }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-8">
                            <table class="table table-borderless">
                                <tr>
                                    <th width="30%">Имя:</th>
                                    <td>{{ Auth::user()->name }}</td>
                                </tr>
                                <tr>
                                    <th>Email:</th>
                                    <td>{{ Auth::user()->email }}</td>
                                </tr>
                                <tr>
                                    <th>Дата регистрации:</th>
                                    <td>{{ Auth::user()->created_at->format('d.m.Y H:i') }}</td>
                                </tr>
                                @if(session('auth_token'))
                                <tr>
                                    <th>Токен Sanctum:</th>
                                    <td>
                                        <small class="text-muted">{{ session('auth_token') }}</small>
                                    </td>
                                </tr>
                                @endif
                            </table>

                            <div class="mt-4">
                                <h5>Активные сессии:</h5>
                                @if(Auth::user()->tokens->count() > 0)
                                    <ul class="list-group">
                                        @foreach(Auth::user()->tokens as $token)
                                            <li class="list-group-item">
                                                <strong>{{ $token->name }}</strong>
                                                <br>
                                                <small class="text-muted">Создан: {{ $token->created_at->format('d.m.Y H:i') }}</small>
                                            </li>
                                        @endforeach
                                    </ul>
                                @else
                                    <p class="text-muted">Нет активных токенов</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
