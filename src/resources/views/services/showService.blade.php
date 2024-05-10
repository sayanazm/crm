@extends('auth.layouts')
@section('content')
<form method="POST" action="{{ route('editService', ['id' => $service->id]) }}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <input type="hidden" name="id" value="{{ $service->id }}" />
    <div class="card">
        <div class="card-header">
            Услуга
        </div>
        <div class="card-body">
            <h5 class="card-title">
                Название:
                <input type="text" name="name" placeholder="Название" value="{{ $service->name }}">
            </h5>
            <p class="card-text">
                Цена: <input type="number" value="{{ $service->price }}" name="price" placeholder="RUB">
            </p>

            Описание:
            <textarea class="form-control" maxlength="255" rows="3" name="description" placeholder="Максимум 255 символов">{{ $service->description }}</textarea>
            <button type="submit" class="btn btn-primary">Сохранить изменения</button>
            <button type="submit" class="btn btn-primary" formmethod="get" formaction="{{ route('services') }}">Вернуться к списку услуг</button>
        </div>
    </div>
</form>
@endsection
