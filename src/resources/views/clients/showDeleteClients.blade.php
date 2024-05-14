@extends('auth.layouts')
@section('content')
    <form method="POST" action="{{ route('deleteClient', ['id' => $client->id]) }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <input type="hidden" name="id" value="{{ $client->id }}" />
        <div class="card">
            <div class="card-header">
                Вы действительно хотите удалить клиента {{ $client->name }} {{ $client->surname }}}?
            </div>
            <button type="submit" class="btn btn-primary">Удалить</button>
        </div>
    </form>
@endsection
