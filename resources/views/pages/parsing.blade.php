@extends('layout')

@section('content')
    <section class="main-content">

        <div class="container">
            <h1>Парсим комнаты с Realt.by</h1>
            <div class="row">
                <p>Данные получены! Вернуться на страницу <a href="{{route('index')}}">со списком</a></p>
            </div>
        </div>
    </section>
@endsection