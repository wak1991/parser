@extends('layout')

@section('content')
    <section class="main-content">

        <div class="container">

            {{--search--}}
            <div class="row">
            <form action="{{route('index')}}" method="GET" class="form-inline">
                <div class="row">
                        <div class="form-group">
                            <input type="text" class="form-control" name="s" value="{{ isset($s) ? $s : ''}}" placeholder="Поиск">
                        </div>
                        <div class="form-group">
                            <input class="btn btn-success" type="submit" value="Искать">
                        </div>
                </div>
            </form>
            </div>
            {{--search--}}

            <h1>Список комнат на Realt.by</h1>
            <div class="row">
                @if(!$rooms->isEmpty())
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Название</th>
                            <th>Картинка</th>
                            <th>Описание</th>
                            <th>Подробнее</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($rooms as $room)
                            <tr>
                                <td>{{$room->name}}</td>
                                <td><img src="/img/{{$room->img}}" alt=""></td>
                                <td>{{$room->text}}</td>
                                <td><a href="{{$room->url}}" target="_blank">Смотреть на Realt.by</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{$rooms->appends(['s' => $s])->links()}}
                @else
                    <p>В базе данных нет комнат!</p>
                @endif
            </div>
        </div>
    </section>
@endsection