@extends('auth.layouts')
@section('content')
    <form method="POST" action="{{ route('deleteService', ['id' => $service->id]) }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <input type="hidden" name="id" value="{{ $service->id }}" />
        <div class="card">
            <div class="card-header">
                Вы действительно хотите удалить услугу {{$service->name}}?
            </div>
            <button type="submit" class="btn btn-primary">Удалить</button>
        </div>
    </form>
@endsection
