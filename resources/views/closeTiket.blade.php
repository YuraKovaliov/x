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

@section('content')
    <div class="container mt-5">
        @foreach($data as $el)
            <div class="ticket-card">
                <h3>{{ $el->ticketTitle }}</h3>
                <p>Id: <strong>{{ $el->id }}</strong></p>
                <p>Стадия: <strong>{{ $el->ticketPriority }}</strong></p>
                <p>Создано: <small>{{ $el->created_at }}</small></p>
                <p>Обновлено: <small>{{ $el->updated_at }}</small></p>
                <div class="d-flex justify-content-end">
                    @if($el->ticketPriority === 'Closed')
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







@endsection
