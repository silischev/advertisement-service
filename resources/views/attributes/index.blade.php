@extends('layouts.app')

@section('content')
<div class="container">
    <div class="list-group">
        @foreach ($types as $type => $name)
            <a href="{{ route('attributes.list_by_type', ['type' => $type]) }}" class="list-group-item">{{ $name }}</a>
        @endforeach
    </div>
</div>
@endsection
