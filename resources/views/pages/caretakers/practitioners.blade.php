@extends('layouts.app')

@section('content')
    <div class="card-deck">
    @foreach ($practitioners as $practitioner)
        <div class="card border-primary">
            <div class="card-body text-dark">
                <h3 class="h5 card-title">{{ $practitioner->first_name }} {{ $practitioner->last_name }}</h3>
                <h4 class="h6 card-subtitle mb-2 text-muted">{{ ucfirst($practitioner->specialty) }}</h4>
                <p class="card-text">Contactez ce praticien par mail :</p>
                <a href="mailto:{{ $practitioner->email }}" class="btn btn-primary btn-block">{{ $practitioner->email }}</a>
            </div>
        </div>
    @endforeach
    </div>
@endsection
