@extends('layouts.app')

@section('content')
<h1>All sponsors below</h1>
<ul>
    @foreach ($sponsors as $sponsor)
        <li><a href="{{ route('sponsors.show', ['id' => $sponsor->id]) }}">{{ $sponsor->first_name }}</a></li>
    @endforeach
</ul>
@endsection
