@extends('layouts.app')

@section('title', 'Контакты')

@section('content')
    <h1>Наши контакты</h1>

    <div class="row">
        @foreach($contacts as $contact)
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $contact['name'] }}</h5>
                        <p class="card-text">
                            Телефон: {{ $contact['phone'] }}<br>
                            Email: {{ $contact['email'] }}
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
