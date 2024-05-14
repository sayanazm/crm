@extends('auth.layouts')
@section('content')
    <form method="POST" action="{{ route('editClient', ['id' => $client->id]) }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <input type="hidden" name="id" value="{{ $client->id }}" />
        <div class="card">
            <div class="card-header">
                Клиент
            </div>
            <div class="card-body">
                <h5 class="card-title">
                    <input type="text" class="form-control" name="name" placeholder="Имя" value="{{ $client->name }}">
                </h5>
                <h5 class="card-title">
                    <input type="text" class="form-control" name="surname" placeholder="Фамилия" value="{{ $client->surname }}">
                </h5>
                <h5 class="card-title">
                    <input type="text" class="form-control" name="patronymic" placeholder="Отчество" value="{{ $client->patronymic }}">
                </h5>
                <h5 class="card-title">
                    <input type="email" class="form-control" name="email" placeholder="почта" value="{{ $client->email }}">
                </h5>
                <p class="card-text">
                    Телефон: <input type="number" class="form-control" value="{{ $client->phone }}" name="phone" placeholder="Телефон">
                </p>
                <p class="card-text">
                    День Рождения: <input type="date" class="form-control" value="{{ $client->birth_date }}" name="birth_date" placeholder="Телефон">
                </p>

                Комментарий:
                <textarea class="form-control" maxlength="255" rows="3" name="comment" placeholder="Максимум 255 символов">{{ $client->comment }}</textarea>
                <button type="submit" class="btn btn-primary">Сохранить изменения</button>
                <button type="submit" class="btn btn-primary" formmethod="get" formaction="{{ route('clients') }}">Вернуться к списку</button>
            </div>
        </div>
    </form>
@endsection
