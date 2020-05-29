    @extends('layouts.app')

    @section('content')
    <div class="card-deck">
            <div class="card border-primary">
                <img src="{{ asset('/img/cards/sponsor.png') }}" class="card-img-top" alt="image marraine">
                <div class="card-body text-primary">
                    <h5 class="card-title">Ma marraine</h5>
                    <p class="card-text">Votre marraine la bonne fée est <a href="{{ url("sponsors/$sponsor->id") }}" class="text-danger">{{ $sponsor->first_name }}</a>.</p>
                </div>
                <div class="card-footer">
                    <a href="" class="btn btn-primary btn-block">La contacter</a>
                </div>
            </div>
            <div class="card border-danger">
                <img src="{{ asset('/img/cards/partner.png') }}" class="card-img-top" alt="image partner">
                <div class="card-body text-danger">
                    <h5 class="card-title">Ma partenaire</h5>
                    <p class="card-text">Vous avez indiqué
                        <a href="{{ url("/caretakers/$partner->id")}}" class="text-secondary">{{ $partner->first_name }}</a> comme partenaire.
                    </p>
                </div>
                <div class="card-footer">
                    <a href="" class="btn btn-danger btn-block">Modifier</a>
                </div>
            </div>
        @foreach ($children as $child)
            <div class="card border-success">
                <img src="{{ asset('/img/cards/baby.png') }}" class="card-img-top" alt="image partner">
                <div class="card-body text-success">
                    <h5 class="card-title">Ma famille</h5>
                    <p class="card-text">Votre enfant, {{ $child->first_name }}, a {{ $child->getAge() }}</p>
                </div>
                <div class="card-footer">
                    <a href="" class="btn btn-success btn-block">Modifier</a>
                </div>
            </div>
        @endforeach
    </div>
    @endsection
