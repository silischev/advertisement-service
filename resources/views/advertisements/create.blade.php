@extends('layouts.app')

@section('content')
    <div class="container">
    </div>
    <div id="app">
        <form action="#">
            <input type="hidden" name="category" v-model="category">
            <Categories v-on:setCategory="setCategory"></Categories>
        </form>
    </div>
@endsection