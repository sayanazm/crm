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
    <form method="POST" action="{{ route('deleteClient', ['id' => $userClient->client->id]) }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <input type="hidden" name="id" value="{{ $userClient->client->id }}" />
        <div class="card">
            <div class="card-header">
                Вы действительно хотите удалить клиента {{ $userClient->client->name }} {{ $userClient->client->surname }}}?
            </div>
            <button type="submit" class="btn btn-primary">Удалить</button>
        </div>
    </form>
@endsection
