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

    <div class="container">
        <form method="POST" action="{{ route('createOrder') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>

            <!-- Title -->
            <div class="d-flex justify-content-between align-items-lg-center py-3 flex-column flex-lg-row">
                <h2 class="h5 mb-3 mb-lg-0"><a><i class="bi bi-arrow-left-square me-2"></i></a>Создание новой задачи
                </h2>
                <div class="hstack gap-3">
                    <button class="btn btn-primary btn-sm btn-icon-text" type="submit">Создать</button>
                </div>
            </div>

            <!-- Main content -->
            <div class="row">
                <!-- Left side -->
                <div class="col-lg-8">
                    <!-- Basic information -->
                    <div class="card mb-4">
                        <div class="card-body">
                            <h3 class="h6 mb-4">Выберите клиента</h3>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Клиент</label>
                                        <input type="number" class="form-control autocomplete" autocomplete="on"
                                               list="clients" placeholder="Начните вводить ID клиента" name="client_id">
                                        <datalist id="clients">
                                            @foreach($userClients as $userClient)
                                                <option data-id="{{$userClient->client->id}}"
                                                        value="{{$userClient->client->id}}">
                                            @endforeach
                                        </datalist>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Фамилия</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Телефон</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <div class="card-body">
                            <h3 class="h6 mb-4">Выберите исполнителя</h3>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Исполнитель</label>
                                        <input type="number" class="form-control autocomplete" autocomplete="on"
                                               list="workers" placeholder="Начните вводить ID исполнителя"
                                               name="worker_id">
                                        <datalist id="clients">
                                            @foreach($userWorkers as $userWorker)
                                                <option data-id="{{$userWorker->worker->id}}"
                                                        value="{{$userWorker->worker->id}}">
                                            @endforeach
                                        </datalist>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Фамилия</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Телефон</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Address -->
                    <div class="card mb-4">
                        <div class="card-body">
                            <h3 class="h6 mb-4">Выберите услугу</h3>
                            <div class="mb-3">
                                <label class="form-label">Услуга</label>
                                <input type="number" class="form-control autocomplete" autocomplete="off"
                                       list="services" placeholder="Начните вводить ID услуги" name="service_id">
                                <datalist id="services">
                                    @foreach($userServices as $userService)
                                        <option data-id="{{$userService->service->id}}"
                                                value="{{$userService->service->id}}">
                                    @endforeach
                                </datalist>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Название</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Цена</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Описание</label>
                                        <textarea class="form-control"> </textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Right side -->
                <div class="col-lg-4">
                    <!-- Status -->
                    <div class="card mb-4">
                        <div class="card-body">
                            <h3 class="h6">Статус оплаты</h3>

                            <select class="form-select" name="payment_status">
                                <option value="1">Оплачен</option>
                                <option value="0">Неоплачен</option>
                            </select>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-body">
                            <h3 class="h6">Цена</h3>
                            <input type="number" name="total" class="form-control" placeholder="RUB">
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-body">
                            <h3 class="h6">Скидка</h3>

                            <select class="form-select" name="discount">
                                <option value="0">0</option>
                                <option value="10">10%</option>
                                <option value="20">20%</option>
                                <option value="30">30%</option>
                                <option value="40">40%</option>
                                <option value="50">50%</option>
                            </select>
                        </div>
                    </div>
                    <!-- Notes -->
                    <div class="card mb-4">
                        <div class="card-body">
                            <h3 class="h6">Начало задачи</h3>
                            <input name="start" type="datetime-local" class="form-control">
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-body">
                            <h3 class="h6">Конец задачи</h3>
                            <input name="end" type="datetime-local" class="form-control">
                        </div>
                    </div>
                    <!-- Notification settings -->
                    <div class="card mb-4">
                        <div class="card-body">
                            <h3 class="h6">Настройки уведомлений</h3>
                            <ul class="list-group list-group-flush mx-n2">
                                <li class="list-group-item px-0 d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <h6 class="mb-0">Начало задачи</h6>
                                        <small>Прислать мне уведомление о начале.</small>
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" name="notification_start" value="true"
                                               type="checkbox" role="switch">
                                    </div>
                                </li>
                                <li class="list-group-item px-0 d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <h6 class="mb-0">Напоминание за 1 час</h6>
                                        <small>Прислать мне уведомление за 1 час до начала.</small>
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" name="notification_reminder" value="true"
                                               type="checkbox" role="switch" checked="">
                                    </div>
                                </li>
                                <li class="list-group-item px-0 d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <h6 class="mb-0">Завершение</h6>
                                        <small>Прислать мне уведомление о завершении.</small>
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" name="notification_end" value="true"
                                               type="checkbox" role="switch">
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
        </form>
    </div>


    </div>
@endsection
