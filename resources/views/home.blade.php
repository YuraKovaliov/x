
@extends('layouts.app')

@section('style')
    <style>
        .ticket-card {
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 15px;
            background-color: #f9f9f9;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .ticket-card h3 {
            font-size: 24px;
            margin-bottom: 10px;
            color: #007bff;
        }
        .ticket-card p {
            margin-bottom: 5px;
            font-size: 14px;
            color: #555;
        }
        .ticket-card small {
            font-size: 12px;
            color: #999;
        }
        .ticket-card .btn {
            margin-top: 10px;
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
    <div class="container mt-5">
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

            @if($data->isEmpty())
                <h2>У вас нету билетов</h2>
            @endif
        @foreach($data as $el)
                    <div class="ticket-card">
                        <h3>{{ $el->ticketTitle }}</h3>
                        <p>Id: <strong>{{ $el->id }}</strong></p>
                        <p>Стадия: <strong>{{ $el->ticketPriority }}</strong></p>
                        <p>Описание: <strong>{{ $el->ticketDescription }}</strong></p>
                        <p>Создано: <small>{{ $el->created_at->format('d-m-Y H:i:s') }}</small></p>
                        <p>Обновлено: <small>{{ $el->updated_at->format('d-m-Y H:i:s') }}</small></p>
                        <div class="d-flex justify-content-end">
                            @if(strtolower($el->ticketPriority) === 'closed')
                                <form action="{{ route('tickets.open', $el->id) }}" method="POST" style="margin-right: 10px;">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-success btn-sm">Открыть</button>
                                </form>
                            @else
                                <form action="{{ route('tickets.close', $el->id) }}" method="POST" style="margin-right: 10px;">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-warning btn-sm">Закрыть</button>
                                </form>
                            @endif

                            <form action="{{ route('tickets.delete', $el->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Удалить</button>
                            </form>
                        </div>
                    </div>
        @endforeach

    </div>
    </body>
    </html>



@endsection
