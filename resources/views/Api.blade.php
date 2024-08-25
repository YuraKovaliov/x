@extends('layouts.app')

@section('style')
    <style>
        .code-block {
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 5px;
            overflow-x: auto;
            font-family: monospace;
        }
        .code-block .hljs {
            display: block;
            padding: 10px;
            border-radius: 5px;
            background-color: #e9ecef;
        }
        .code-block .hljs-keyword {
            color: #d63384;
        }
        .code-block .hljs-string {
            color: #007bff;
        }
        .code-block .hljs-function {
            color: #28a745;
        }
    </style>
@endsection
@section('Title')
    <a class="navbar-brand" href="createTiket">
        {{ 'Создать билет' }}
    </a>
    <a class="navbar-brand" href="closeTiket">
        {{ 'Закрытые билиты' }}
    </a>
    <a class="navbar-brand" href="api">
        {{ 'Api' }}
    </a>
@endsection
@section('content')
    <div class="container mt-1">
        <pre class="code-block">
            <code>
                Создать Tiket
                /api/tickets/create
                ?title=Шапка
                &priority=Стадия
                &description=Описание
                &email=email

                Удалить Tiket
                /api/tickets/delete
                ?id= Id тикета

                получить тикет по id
                /api/tickets/show
                ?id= id тикета


     <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
