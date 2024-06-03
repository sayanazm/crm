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
    <form method="POST" action="{{ route('editClient', ['id' => $userClient->client->id]) }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <input type="hidden" name="id" value="{{ $userClient->client->id }}" />
        <div class="card">
            <div class="card-header">
                Клиент
            </div>
            <div class="card-body">
                <h5 class="card-title">
                    <input type="text" class="form-control" name="name" placeholder="Имя" value="{{ $userClient->client->name }}">
                </h5>
                <h5 class="card-title">
                    <input type="text" class="form-control" name="surname" placeholder="Фамилия" value="{{ $userClient->client->surname }}">
                </h5>
                <h5 class="card-title">
                    <input type="text" class="form-control" name="patronymic" placeholder="Отчество" value="{{ $userClient->client->patronymic }}">
                </h5>
                <h5 class="card-title">
                    <input type="email" class="form-control" name="email" placeholder="почта" value="{{ $userClient->client->email }}">
                </h5>
                <p class="card-text">
                    Телефон: <input type="number" class="form-control" value="{{ $userClient->client->phone }}" name="phone" placeholder="Телефон">
                </p>
                <p class="card-text">
                    День Рождения: @if($userClient->client->birth_date)
                    <p>{{ date('y-m-d', strtotime($userClient->client->birth_date)) }} </p>
                    @endif
                    <input type="date" class="form-control" value="" name="birth_date" placeholder="День Рождения">
                </p>

                Комментарий:
                <textarea class="form-control" maxlength="255" rows="3" name="comment" placeholder="Максимум 255 символов">{{ $userClient->client->comment }}</textarea>
                <button type="submit" class="btn btn-primary">Сохранить изменения</button>
                <a type="submit" class="btn btn-primary" href="{{ route('clients') }}">Вернуться к списку</a>
            </div>
        </div>
    </form>
@endsection
