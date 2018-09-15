@extends('layouts.app')

@section('content')
    <div class="container">
    </div>
    <div id="app">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <form action={{ route('advertisements.store') }}>
                    <input type="hidden" name="category" v-model="category">
                    <Categories v-on:setCategory="setCategory"></Categories>
                    <div class="container">
                        <div class="card card-default">
                            <div class="card-header">Название</div>
                            <div class="card-body">
                                <input type="text" class="form-control" name="title">
                            </div>
                        </div>
                        <div class="card card-default">
                            <div class="card-header">Описание</div>
                            <div class="card-body">
                                <textarea name="description" class="form-control"></textarea>
                            </div>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary pull-right">Отправить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection