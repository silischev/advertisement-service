@extends('layouts.app')

@section('content')
<div class="container">
    @foreach ($attributes as $attribute)
        @php
            $options = json_decode($attribute->options);
        @endphp
        <label>{{ $attribute->title }}</label>
        @include ($options->view)
    @endforeach
</div>
@endsection
