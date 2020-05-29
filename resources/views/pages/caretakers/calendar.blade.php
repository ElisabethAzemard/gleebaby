@extends('layouts.app')

@section('content')
<div class="row row-cols-1">
    @foreach ($appointments as $appointment)
    <div class="col mb-4">
        <div class="card border-primary">
            <div class="card-body text-dark">
                <h3 class="h5 card-title">{{ $appointment->purpose }}</h3>
                <h4 class="h6 card-subtitle mb-2 text-muted">avec {{ $appointment->practitioner->first_name }} {{ $appointment->practitioner->last_name }}, {{ $appointment->practitioner->specialty }}</h4>
                <p class="card-text">Vous avez rendez-vous le {{ $appointment->getDay() }} à {{ $appointment->getTime() }}. Il devrait durer {{ $appointment->getDuration() }}.</p>
                <a href="{{ $appointment->getGoogleCalendarLink() }}" class="btn btn-primary" target="_blank">+ Google Agenda</a>
                <a href="{{ $appointment->getiCalLink() }}" class="btn btn-danger" target="_blank">+ iCal ou Outlook</a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
