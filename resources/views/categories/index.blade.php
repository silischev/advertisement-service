@extends('layouts.app')

@section('content')
<div class="container">
    @foreach ($categories as $category)
        @if ($category['level'] === 0)
            <p><b>{{ $category['name'] }}</b></p>
        @else
            <p style="padding-left: {{ $category['level'] * 20 }}px">{{ str_repeat('-', $category['level']) }} {{ $category['name'] }}</p>
        @endif
    @endforeach
</div>
@endsection
