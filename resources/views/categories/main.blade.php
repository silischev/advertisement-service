@extends('layouts.app')

@section('content')
<div class="container">
    @foreach ($categories as $category)
        <h5>
            <a href="{{ route('categories.by_parent', ['parent_id' => $category['id']]) }}" class="badge badge-pill badge-primary">{{ $category['name'] }}</a>
            <a href="#" style="color: gray;"><i class="fa fa-pencil"></i></a>
        </h5>
    @endforeach
</div>
@endsection
