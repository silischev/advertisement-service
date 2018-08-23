@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Admin panel</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>

                <div class="list-group">
                    <a href="{{ route() }}" class="list-group-item active">
                        <span class="glyphicon glyphicon-tasks"></span> Categories <span class="badge">0</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
