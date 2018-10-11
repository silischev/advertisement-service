@extends('layouts.app')

@section('content')
<div class="container">
    @foreach ($attributes as $attribute)
        <label>{{ $attribute->getTitle() }}</label>
        @include ($attribute->getView(), [
            'name' => $attribute->getName(),
            'variants' => $attribute->getVariants(),
        ])
    @endforeach
</div>
@endsection
