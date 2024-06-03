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
<form method="POST" action="{{ route('editService', ['id' => $userService->service->id]) }}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <input type="hidden" name="id" value="{{ $userService->service->id }}" />
    <div class="card">
        <div class="card-header">
            <h5>Услуга</h5>
        </div>
        <div class="card-body">
            <h4 class="card-title">
                <input type="text" class="form-control" name="name" placeholder="Название" value="{{ $userService->service->name }}">
            </h4>
            <p class="card-text">
                Цена: <input type="number" class="form-control" value="{{ $userService->service->price }}" name="price" placeholder="RUB">
            </p>

            Описание:
            <textarea class="form-control" maxlength="255" rows="3" name="description" placeholder="Максимум 255 символов">{{ $userService->service->description }}</textarea>
            <button type="submit" class="btn btn-primary">Сохранить изменения</button>
            <button type="submit" class="btn btn-primary" formmethod="get" formaction="{{ route('services') }}">Вернуться к списку</button>
        </div>
    </div>
</form>
@endsection
