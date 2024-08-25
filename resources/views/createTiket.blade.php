@extends('layouts.app')

@section('style')
    <style>

        .form-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f0f2f5;
        }


        .form-box {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
        }


        .form-box h4 {
            text-align: center;
            margin-bottom: 20px;
            color: #333333;
        }


        .btn-primary {
            width: 100%;
            background-color: #007bff;
            border-color: #007bff;
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
        }


        .form-control {
            padding: 10px;
            font-size: 14px;
            border-radius: 5px;
        }


        .form-control[name="ticketDescription"] {
            resize: none;
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
@endsection
@section('content')

    <div class="container-fluid form-container">
        <div class="form-box">
            <h4>Создать Tiket</h4>
            <form method="POST" action="/submit-form">
            @csrf
                <div class="mb-3">
                    <label for="ticketTitle" class="form-label">Название</label>
                    <input type="text" class="form-control" id="ticketTitle" name="ticketTitle" placeholder="Введите заголовок тикета">
                </div>
                <div class="mb-3">
                    <label for="ticketDescription" class="form-label">Описание</label>
                    <textarea class="form-control" id="ticketDescription" name="ticketDescription" rows="3" placeholder="Введите описание тикета"></textarea>
                </div>
                <div class="mb-3">
                    <label for="ticketPriority" class="form-label">Статус</label>
                    <select class="form-select" id="ticketPriority" name="ticketPriority">
                        <option selected>Выбрать</option>
                        <option value="Open">Open</option>
                        <option value="Closed">Closed</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Создать</button>
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </form>
        </div>
    </div>




@endsection
