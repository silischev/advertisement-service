@extends('layouts.app')

@section('content')
<div class="container">
    @foreach ($categories as $category)
        @php
            $link = '<a href="#" class="fa fa-list-ol" title="Параметры"></a>';
        @endphp

        @if ($category['level'] === 0)
            <p><b>{{ $category['name'] }}</b> {!! $link !!}</p>
        @else
            <p style="padding-left: {{ $category['level'] * 20 }}px">{{ str_repeat('-', $category['level']) }} {{ $category['name'] }} {!! $link !!}</p>
        @endif
    @endforeach
</div>
@endsection
