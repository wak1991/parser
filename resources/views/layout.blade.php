<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/my.css" rel="stylesheet">
    <title>Парсинг</title>
</head>
<body>
<section class="main-slogan">
    <div class="container">
        <div class="row">
            <div class="form-group col-sm-4">
                <a href="{{route('index')}}" class="btn btn-success">Список</a>
            </div>
            <div class="form-group col-sm-4">
                <a href="{{route('parsing')}}" class="btn btn-primary">Парсить</a>
            </div>
        </div>
    </div>
</section>
@if(session('status'))
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-info">
                    {{session('status')}}
                </div>
            </div>
        </div>
    </div>
@endif
@yield('content')
<script src="/js/jquery-2.2.3.min.js"></script>
<script src="/js/bootstrap.bundle.min.js"></script>
</body>
</html>