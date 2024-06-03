@extends('auth.layouts')
@section('content')
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="{{ route('schedule') }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
        <div class="card mb-4">
            <div class="card-body">
                <h3 class="h6">Выберите промежуток времени</h3>
                <input name="first_datetime" type="datetime-local" class="form-control">
                <input name="last_datetime" type="datetime-local" class="form-control">
                <div class="form-control">
                    <button class="btn btn-primary" type="submit">Показать</button>
                </div>
            </div>
        </div>
    </form>
            @isset($firstDatetime)
                @isset($lastDatetime)

            <h3 class="h3">{{ date('d-m-y h:i', strtotime($firstDatetime)) . ' - ' }} {{ date('d-m-y h:i', strtotime($lastDatetime))}}</h3>
                @endisset
            @endisset
    <table class="table">
        <thead class="thead-light">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Услуга</th>
            <th scope="col">Дата и время</th>
            <th scope="col">Клиент</th>
            <th scope="col">Исполнитель</th>
            <th scope="col">Цена</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($userSortedOrders as $userOrder)
            <tr>
                <th scope="row">{{ $quantity += 1 }}</th>
                <td>{{ $userOrder->order->userService->service->name }}</a></td>
                <td>{{ date('d-m-y h:i', strtotime($userOrder->order->start)) }} - {{ date('d-m-y h:i', strtotime($userOrder->order->end)) }}</a></td>
                <td>{{ $userOrder->order->userClient->client->name }} {{ $userOrder->order->userClient->client->surname }} {{ $userOrder->order->userClient->client->email }}</td>
                <td>{{ $userOrder->order->userWorker->worker->name }} {{ $userOrder->order->userWorker->worker->surname }} {{ $userOrder->order->userWorker->worker->email }}</td>
                <td>{{ $userOrder->order->total }}</td>
                <td><a href="{{ route('order.show', $userOrder->order->id) }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                             class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path
                                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd"
                                  d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                        </svg>
                    </a>
                </td>
                <td>
                    <a class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover"
                       href="{{ route('showDeleteOrder', $userOrder->order->id) }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                             class="bi bi-trash" viewBox="0 0 16 16">
                            <path
                                d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                            <path
                                d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                        </svg>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
