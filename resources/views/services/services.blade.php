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
<form method="POST" action="{{ route('addService') }}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <div class="form-group">

        <label for="exampleInputEmail1">Название услуги</label>
        <input type="text" class="form-control" id="exampleInputEmail1" name="name" placeholder="">
        <small id="emailHelp" class="form-text text-muted"></small>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Цена</label>
        <input type="number" class="form-control" id="exampleInputPassword1" name="price"placeholder="RUB">
    </div>

    <div class="form-group">

        <label for="exampleFormControlTextarea1">Описание услуги</label>
        <textarea class="form-control" maxlength="255" id="exampleFormControlTextarea1" rows="3" name="description" placeholder="Максимум 255 символов"></textarea>
    </div>


    <button type="submit" class="btn btn-primary">Создать</button>
</form>

        <div class="card-body">
            <h5 class="mb-0">Список услуг</h5>
        </div>

    @if(empty($userServices))
        <li class="list-group-item p-3">
            <div class="d-flex justify-content-between
                          align-items-center">
                <div class="d-flex align-items-center">
                    <div class="ms-3">
                        <p class="mb-0 font-weight-medium">
                            Услуг нет.
                    </div>
                </div>
            </div>
        </li>
    @endif
    <table class="table">
        <thead class="thead-light">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Название</th>
            <th scope="col">Описание</th>
            <th scope="col">Цена, RUB</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($userServices as $userService)
        <tr>
            <th scope="row">{{ $quantity += 1 }}</th>
            <td>{{ $userService->service->name }}</a></td>
            <td>{{ $userService->service->description }}</td>
            <td>{{ $userService->service->price }}</td>
            <td><a href="{{ route('services.show', $userService->service->id) }}"  >
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                    </svg>
                </a>
            </td>
            <td><a class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover"
                   href="{{ route('showDeleteService', $userService->service->id) }}"  >
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                        <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                    </svg>
                </a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
