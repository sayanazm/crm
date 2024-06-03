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
    <form method="POST" action="{{ route('deleteService', ['id' => $userService->service->id]) }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <input type="hidden" name="id" value="{{ $userService->service->id }}" />
        <div class="card">
            <div class="card-header">
                Вы действительно хотите удалить услугу {{$userService->service->name}}?
            </div>
            <button type="submit" class="btn btn-primary">Удалить</button>
        </div>
    </form>
@endsection
