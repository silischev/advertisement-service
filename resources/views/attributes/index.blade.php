@extends('layouts.app')

@section('content')
<div class="container">
    <div class="list-group">
        @foreach ($types as $type => $name)
            <a href="{{ route('attributes.type', ['type' => $type]) }}" class="list-group-item">{{ $name }}</a>
        @endforeach
    </div>
</div>
@endsection
