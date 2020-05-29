@extends('layouts.app')

@section('content')
    <div class="align-items-center d-flex flex-column">
        <img src="{{asset('/img/users-avatar').'/'.$avatar}}" alt="avatar" width="150">
        <h3 class="h3">{{ $caretaker->first_name }} {{ $caretaker->last_name }}</h3>
        <p>{{ $caretaker->first_name }} et <a href="{{ url("/caretakers/$partner->id")}}" class="text-danger">{{ $partner->first_name }}</a> sont parents de :</p>
        <div class="container">
            <div class="row row-cols-3">
                <div class="card-deck">
                @foreach ($children as $child)
                    <div class="card border-success">
                        <img src="{{ asset('/img/cards/baby.png') }}" class="card-img-top" alt="image partner">
                        <div class="card-body text-success">
                            <h5 class="card-title">{{ $child->first_name }}</h5>
                            <p class="card-text">Né(e) le {{ $child->getBirthdate() }}, il a {{ $child->getAge() }}</p>
                        </div>
                        <div class="card-footer">
                            <a href="" class="btn btn-success btn-block">Modifier</a>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
