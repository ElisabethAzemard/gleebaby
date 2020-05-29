@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">{{ $sponsor->first_name }} {{ $sponsor->last_name }}</div>
        <div class="card-body">
            <ul>
                <li>Email : {{ $sponsor->email }}</li>
                <li>Numéro de téléphone : {{ $sponsor->phone_number }}</li>
            </ul>
        </div>
    </div>
@endsection
