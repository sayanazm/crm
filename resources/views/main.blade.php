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
        <div class="row align-items-center">
            <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                <!-- Bg -->
                <div class="card rounded-bottom smooth-shadow-sm">
                    <div class="d-flex align-items-center justify-content-between
                  pt-4 pb-6 px-4">
                        <!-- avatar -->
                        <div class="d-flex align-items-center">
                            <div class="avatar-xxl avatar-indicators avatar-online me-2
                      position-relative d-flex justify-content-end
                      align-items-end mt-n10">
                                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="avatar-xxl
                        rounded-circle border border-2 " alt="Image">
                                <a href="#!" class="position-absolute top-0 right-0 me-2">
                                    <img src="https://dashui.codescandy.com/dashuipro/assets/images/svg/checked-mark.svg" alt="Image" class="icon-sm">
                                </a>
                            </div>
                            <!-- content -->
                            <div class="lh-1">
                                <h2 class="mb-0">{{ $user->name }} {{ $user->surname }}
                                    <a href="#!" class="text-decoration-none">
                                    </a>
                                </h2>
                            </div>
                        </div>
                        <div>
                            <!-- button -->
                            <a href="{{ route('profile') }}" class="btn btn-outline-primary
                      d-none d-md-block">Изменить профиль</a>
                        </div>
                    </div>
                    <!-- nav -->
                    <ul class="nav nav-lt-tab px-4" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Мои записи</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- page content -->
        <div class="py-6">
            <div class="row">
                <div class="offset-lg-1 col-lg-10 col-md-12 col-12">
                    <!-- row -->
                    <div class="row align-items-center mb-6">
                        <div class="col-lg-6 col-md-12 col-12">
                            <!-- form поиск -->
                            <form>
                                <input type="search" class="form-control" placeholder="Search Your Activity">
                            </form>
                        </div>
                        <div class="col-lg-6 col-md-12 col-12 d-flex justify-content-end">
                            <!-- form -->
                            <div>
                                <a href="#!" class="btn btn-ghost btn-icon btn-sm rounded-circle texttooltip" data-template="filterOne">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-filter icon-xs"><polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon></svg>
                                    <div class="d-none" id="filterOne">
                                        <span>Filter</span>
                                    </div>
                                </a>
                                <a href="#!" class="btn btn-outline-secondary ms-3">
                                    Delete
                                </a>
                            </div>

                        </div>
                    </div>
                    <!-- hr -->

                    <div class="mb-8">
                        <!-- card -->
                        <div class="card bg-gray-300 shadow-none mb-4">
                            <!-- card body -->
                            <div class="card-body">
                                <div class="d-flex justify-content-between
                        align-items-center">
                                    <div>
                                        <h5 class="mb-0">Сегодня</h5>
                                    </div>
                                    <div>
                                        <a href="#!" class="text-muted"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 icon-xs"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- card -->
                        <div class="card">
                            <!-- list group -->
                            @if(empty($ordersToday))
                                <li class="list-group-item p-3">
                                    <div class="d-flex justify-content-between
                          align-items-center">
                                        <div class="d-flex align-items-center">
                                            <div class="ms-3">
                                                <p class="mb-0 font-weight-medium">
                                                    Задач нет.
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endif
                            @foreach ($ordersToday as $orderToday)
                            <ul class="list-group list-group-flush">
                                <!-- list group item -->
                                <li class="list-group-item p-3">
                                    <div class="d-flex justify-content-between
                          align-items-center">
                                        <div class="d-flex align-items-center">
                                            <!-- img -->
                                            <div>
                                                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="Image" class="avatar-sm rounded-circle">
                                            </div>
                                            <!-- content -->
                                            <div class="ms-3">
                                                <p class="mb-0 font-weight-medium">
                                                    <a href="#!"> </a>{{ $orderToday->order->start }} -- {{ $orderToday->order->end }} {{ $orderToday->order->userService->service->name }}
                                                     <a href="#!"></a></p>
                                            </div>
                                        </div>
                                        <div>
                                            <!-- dropdown -->
                                            <div class="dropdown dropstart">
                                                <a href="#!" class="btn btn-ghost btn-icon btn-sm rounded-circle" id="dropdownactivityOne" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical icon-xs"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="dropdownactivityOne">
                                                    <a class="dropdown-item d-flex align-items-center" href="#!">Action</a>
                                                    <a class="dropdown-item d-flex align-items-center" href="#!">Another action</a>
                                                    <a class="dropdown-item d-flex align-items-center" href="#!">Something else
                                                        here</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            @endforeach
                        </div>
                    </div>
                    <div class="mb-8">
                        <!-- card -->
                        <div class="card bg-gray-300 shadow-none mb-4">
                            <!-- card body -->
                            <div class="card-body">
                                <div class="d-flex justify-content-between
                        align-items-center">
                                    <div>
                                        <h5 class="mb-0">Завтра</h5>
                                    </div>
                                    <div>
                                        <a href="#!" class="text-muted"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 icon-xs"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if(empty($ordersTomor))
                            <li class="list-group-item p-3">
                                <div class="d-flex justify-content-between
                          align-items-center">
                                    <div class="d-flex align-items-center">
                                        <div class="ms-3">
                                            <p class="mb-0 font-weight-medium">
                                                Задач нет.
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endif
                        @foreach ($ordersTomor as $orderTomor)
                        <!-- card -->
                        <div class="card">
                            <!-- list group -->
                            <ul class="list-group list-group-flush">
                                <!-- list group item  -->
                                <li class="list-group-item p-3">
                                    <div class="d-flex justify-content-between
                          align-items-center">
                                        <div class="d-flex align-items-center">
                                            <!-- avatar  -->
                                            <div>
                                                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Image" class="avatar-sm rounded-circle">
                                            </div>
                                            <!-- content  -->
                                            <div class="ms-3">
                                                <p class="mb-0
                                font-weight-medium"><a href="#!"></a> {{ $orderTomor->order->start }} -- {{ $orderTomor->order->end }} {{ $orderTomor->order->userService->service->name }}
                                                    <a href="#!"></a></p>
                                            </div>
                                        </div>
                                        <div>
                                            <!-- dropdown  -->
                                            <div class="dropdown dropstart">
                                                <a href="#!" class="btn btn-ghost btn-icon btn-sm rounded-circle" id="dropdownactivitySeven" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical icon-xs"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="dropdownactivitySeven">
                                                    <a class="dropdown-item d-flex align-items-center" href="#!">Action</a>
                                                    <a class="dropdown-item d-flex align-items-center" href="#!">Another action</a>
                                                    <a class="dropdown-item d-flex align-items-center" href="#!">Something else
                                                        here</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        @endforeach
                    </div>
                    <!-- ТРЕТИЙ ДЕНЬ -->
                    <div class="mb-8">
                        <!-- card  -->
                        <div class="card bg-gray-300 shadow-none mb-4">
                            <!-- card body  -->
                            <div class="card-body">
                                <div class="d-flex justify-content-between
                        align-items-center">
                                    <div>
                                        <h5 class="mb-0">{{ $week['thirdDay'] }}</h5>
                                    </div>
                                    <div>
                                        <a href="#!" class="text-muted"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 icon-xs"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if(empty($ordersThirdDay))
                            <li class="list-group-item p-3">
                                <div class="d-flex justify-content-between
                          align-items-center">
                                    <div class="d-flex align-items-center">
                                        <div class="ms-3">
                                            <p class="mb-0 font-weight-medium">
                                                Задач нет.
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endif
                        @foreach ($ordersThirdDay as $orderThirdDay)
                        <!-- card  -->
                        <div class="card">
                            <!-- list group  -->
                            <ul class="list-group list-group-flush">
                                <!-- list group item  -->
                                <li class="list-group-item p-3">
                                    <div class="d-flex justify-content-between
                          align-items-center">
                                        <div class="d-flex align-items-center">
                                            <!-- avatar  -->
                                            <div>
                                                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="Image" class="avatar-sm rounded-circle">
                                            </div>
                                            <!-- content -->
                                            <div class="ms-3">
                                                <p class="mb-0
                                font-weight-medium"><a href="#!"></a>
                                                    {{ $orderThirdDay->order->start }} -- {{ $orderThirdDay->order->end }} {{ $orderThirdDay->order->userService->service->name }}
                                                    <a href="#!"></a></p>
                                            </div>
                                        </div>
                                        <div>
                                            <!-- dropdown  -->
                                            <div class="dropdown dropstart">
                                                <a href="#!" id="dropdownactivityTen" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn btn-ghost btn-sm btn-icon rounded-circle">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical icon-xs"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="dropdownactivityTen">
                                                    <a class="dropdown-item d-flex align-items-center" href="#!">Action</a>
                                                    <a class="dropdown-item d-flex align-items-center" href="#!">Another action</a>
                                                    <a class="dropdown-item d-flex align-items-center" href="#!">Something else
                                                        here</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                    </div>
                        @endforeach
                </div>
                    <!-- ЧЕТВЕРТЫЙ ДЕНЬ -->

                    <div class="mb-8">
                        <!-- card  -->
                        <div class="card bg-gray-300 shadow-none mb-4">
                            <!-- card body  -->
                            <div class="card-body">
                                <div class="d-flex justify-content-between
                        align-items-center">
                                    <div>
                                        <h5 class="mb-0">{{ $week['fourthDay'] }}</h5>
                                    </div>
                                    <div>
                                        <a href="#!" class="text-muted"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 icon-xs"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if(empty($ordersFourthDay))
                            <li class="list-group-item p-3">
                                <div class="d-flex justify-content-between
                          align-items-center">
                                    <div class="d-flex align-items-center">
                                        <div class="ms-3">
                                            <p class="mb-0 font-weight-medium">
                                                Задач нет.
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endif
                        @foreach ($ordersFourthDay as $orderFourthDay)
                            <!-- card  -->
                            <div class="card">
                                <!-- list group  -->
                                <ul class="list-group list-group-flush">
                                    <!-- list group item  -->
                                    <li class="list-group-item p-3">
                                        <div class="d-flex justify-content-between
                          align-items-center">
                                            <div class="d-flex align-items-center">
                                                <!-- avatar  -->
                                                <div>
                                                    <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="Image" class="avatar-sm rounded-circle">
                                                </div>
                                                <!-- content -->
                                                <div class="ms-3">
                                                    <p class="mb-0
                                font-weight-medium"><a href="#!"></a>
                                                        {{ $orderFourthDay->order->start }} -- {{ $orderFourthDay->order->end }} {{ $orderFourthDay->order->userService->service->name }}                                                        <a href="#!"></a></p>
                                                </div>
                                            </div>
                                            <div>
                                                <!-- dropdown  -->
                                                <div class="dropdown dropstart">
                                                    <a href="#!" id="dropdownactivityTen" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn btn-ghost btn-sm btn-icon rounded-circle">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical icon-xs"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                                                    </a>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownactivityTen">
                                                        <a class="dropdown-item d-flex align-items-center" href="#!">Action</a>
                                                        <a class="dropdown-item d-flex align-items-center" href="#!">Another action</a>
                                                        <a class="dropdown-item d-flex align-items-center" href="#!">Something else
                                                            here</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        @endforeach
                    </div>
                    <!-- ПЯТЫЙ ДЕНЬ -->

                    <div class="mb-8">
                        <!-- card  -->
                        <div class="card bg-gray-300 shadow-none mb-4">
                            <!-- card body  -->
                            <div class="card-body">
                                <div class="d-flex justify-content-between
                        align-items-center">
                                    <div>
                                        <h5 class="mb-0">{{ $week['fifthDay'] }}</h5>
                                    </div>
                                    <div>
                                        <a href="#!" class="text-muted"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 icon-xs"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if(empty($ordersFifthDay))
                            <li class="list-group-item p-3">
                                <div class="d-flex justify-content-between
                          align-items-center">
                                    <div class="d-flex align-items-center">
                                        <div class="ms-3">
                                            <p class="mb-0 font-weight-medium">
                                                Задач нет.
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endif
                        @foreach ($ordersFifthDay as $orderFifthDay)
                            <!-- card  -->
                            <div class="card">
                                <!-- list group  -->
                                <ul class="list-group list-group-flush">
                                    <!-- list group item  -->
                                    <li class="list-group-item p-3">
                                        <div class="d-flex justify-content-between
                          align-items-center">
                                            <div class="d-flex align-items-center">
                                                <!-- avatar  -->
                                                <div>
                                                    <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="Image" class="avatar-sm rounded-circle">
                                                </div>
                                                <!-- content -->
                                                <div class="ms-3">
                                                    <p class="mb-0
                                font-weight-medium"><a href="#!"></a>
                                                        {{ $orderFifthDay->order->start }} -- {{ $orderFifthDay->order->end }} {{ $orderFifthDay->order->userService->service->name }}                                                        <a href="#!"></a></p>
                                                        <a href="#!"></a></p>
                                                </div>
                                            </div>
                                            <div>
                                                <!-- dropdown  -->
                                                <div class="dropdown dropstart">
                                                    <a href="#!" id="dropdownactivityTen" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn btn-ghost btn-sm btn-icon rounded-circle">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical icon-xs"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                                                    </a>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownactivityTen">
                                                        <a class="dropdown-item d-flex align-items-center" href="#!">Action</a>
                                                        <a class="dropdown-item d-flex align-items-center" href="#!">Another action</a>
                                                        <a class="dropdown-item d-flex align-items-center" href="#!">Something else
                                                            here</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        @endforeach
                    </div>
                    <!-- ШЕСТОЙ ДЕНЬ -->

                    <div class="mb-8">
                        <!-- card  -->
                        <div class="card bg-gray-300 shadow-none mb-4">
                            <!-- card body  -->
                            <div class="card-body">
                                <div class="d-flex justify-content-between
                        align-items-center">
                                    <div>
                                        <h5 class="mb-0">{{ $week['sixthDay'] }}</h5>
                                    </div>
                                    <div>
                                        <a href="#!" class="text-muted"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 icon-xs"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if(empty($ordersSixthDay))
                            <li class="list-group-item p-3">
                                <div class="d-flex justify-content-between
                          align-items-center">
                                    <div class="d-flex align-items-center">
                                        <div class="ms-3">
                                            <p class="mb-0 font-weight-medium">
                                                Задач нет.
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endif
                        @foreach ($ordersSixthDay as $orderSixthDay)
                            <!-- card  -->
                            <div class="card">
                                <!-- list group  -->
                                <ul class="list-group list-group-flush">
                                    <!-- list group item  -->
                                    <li class="list-group-item p-3">
                                        <div class="d-flex justify-content-between
                          align-items-center">
                                            <div class="d-flex align-items-center">
                                                <!-- avatar  -->
                                                <div>
                                                    <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="Image" class="avatar-sm rounded-circle">
                                                </div>
                                                <!-- content -->
                                                <div class="ms-3">
                                                    <p class="mb-0
                                font-weight-medium"><a href="#!"></a>
                                                        {{ $orderSixthDay->order->start }} -- {{ $orderSixthDay->order->end }} {{ $orderSixthDay->order->userService->service->name }}                                                        <a href="#!"></a></p>
                                                        <a href="#!"></a></p>
                                                </div>
                                            </div>
                                            <div>
                                                <!-- dropdown  -->
                                                <div class="dropdown dropstart">
                                                    <a href="#!" id="dropdownactivityTen" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn btn-ghost btn-sm btn-icon rounded-circle">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical icon-xs"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                                                    </a>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownactivityTen">
                                                        <a class="dropdown-item d-flex align-items-center" href="#!">Action</a>
                                                        <a class="dropdown-item d-flex align-items-center" href="#!">Another action</a>
                                                        <a class="dropdown-item d-flex align-items-center" href="#!">Something else
                                                            here</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        @endforeach
                    </div>
                    <!-- СЕДЬМОЙ ДЕНЬ -->

                    <div class="mb-8">
                        <!-- card  -->
                        <div class="card bg-gray-300 shadow-none mb-4">
                            <!-- card body  -->
                            <div class="card-body">
                                <div class="d-flex justify-content-between
                        align-items-center">
                                    <div>
                                        <h5 class="mb-0">{{ $week['seventhDay'] }}</h5>
                                    </div>
                                    <div>
                                        <a href="#!" class="text-muted"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 icon-xs"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if(empty($ordersSeventhDay))
                            <li class="list-group-item p-3">
                                <div class="d-flex justify-content-between
                          align-items-center">
                                    <div class="d-flex align-items-center">
                                        <div class="ms-3">
                                            <p class="mb-0 font-weight-medium">
                                                Задач нет.
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endif
                        @foreach ($ordersSeventhDay as $orderSeventhDay)
                            <!-- card  -->
                            <div class="card">
                                <!-- list group  -->
                                <ul class="list-group list-group-flush">
                                    <!-- list group item  -->
                                    <li class="list-group-item p-3">
                                        <div class="d-flex justify-content-between
                          align-items-center">
                                            <div class="d-flex align-items-center">
                                                <!-- avatar  -->
                                                <div>
                                                    <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="Image" class="avatar-sm rounded-circle">
                                                </div>
                                                <!-- content -->
                                                <div class="ms-3">
                                                    <p class="mb-0
                                font-weight-medium"><a href="#!"></a>
                                                        {{ $orderSeventhDay->order->start }} -- {{ $orderSeventhDay->order->end }} {{ $orderSeventhDay->order->userService->service->name }}                                                        <a href="#!"></a></p>
                                                        <a href="#!"></a></p>
                                                </div>
                                            </div>
                                            <div>
                                                <!-- dropdown  -->
                                                <div class="dropdown dropstart">
                                                    <a href="#!" id="dropdownactivityTen" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn btn-ghost btn-sm btn-icon rounded-circle">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical icon-xs"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                                                    </a>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownactivityTen">
                                                        <a class="dropdown-item d-flex align-items-center" href="#!">Action</a>
                                                        <a class="dropdown-item d-flex align-items-center" href="#!">Another action</a>
                                                        <a class="dropdown-item d-flex align-items-center" href="#!">Something else
                                                            here</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        @endforeach
                    </div>
            </div>
        </div>
    </div>
@endsection

<style>
    body{padding-top:20px;
        background-color:#f1f5f9;
    }
    .card {
        border: 0;
        border-radius: 0.5rem;
        box-shadow: 0 2px 4px rgba(0,0,20,.08), 0 1px 2px rgba(0,0,20,.08);
    }
    .rounded-bottom {
        border-bottom-left-radius: 0.375rem !important;
        border-bottom-right-radius: 0.375rem !important;
    }

    .avatar-xxl {
        height: 7.5rem;
        width: 7.5rem;
    }
    .nav-lt-tab {
        border-top: 1px solid var(--dashui-border-color);
    }
    .px-4 {
        padding-left: 1rem!important;
        padding-right: 1rem!important;
    }

    .avatar-sm {
        height: 2rem;
        width: 2rem;
    }

    .nav-lt-tab .nav-item {
        margin: -0.0625rem 1rem 0;
    }
    .nav-lt-tab .nav-item .nav-link {
        border-radius: 0;
        border-top: 2px solid transparent;
        color: var(--dashui-gray-600);
        font-weight: 500;
        padding: 1rem 0;
    }

    .pt-20 {
        padding-top: 8rem!important;
    }

    .avatar-xxl.avatar-indicators:before {
        bottom: 5px;
        height: 16%;
        right: 17%;
        width: 16%;
    }
    .avatar-online:before {
        background-color: #198754;
    }
    .avatar-indicators:before {
        border: 2px solid #FFF;
        border-radius: 50%;
        bottom: 0;
        content: "";
        display: table;
        height: 30%;
        position: absolute;
        right: 5%;
        width: 30%;
    }

    .avatar-xxl {
        height: 7.5rem;
        width: 7.5rem;
    }
    .mt-n10 {
        margin-top: -3rem!important;
    }
    .me-2 {
        margin-right: 0.5rem!important;
    }
    .align-items-end {
        align-items: flex-end!important;
    }
    .rounded-circle {
        border-radius: 50%!important;
    }
    .border-2 {
        --dashui-border-width: 2px;
    }
    .border {
        border: 1px solid #dcdcdc !important;
    }

    .py-6 {
        padding-bottom: 1.5rem!important;
        padding-top: 1.5rem!important;
    }

    .bg-gray-300 {
        --dashui-bg-opacity: 1;
        background-color: #cbd5e1!important;
    }

    .mb-6 {
        margin-bottom: 1.5rem!important;
    }
    .align-items-center {
        align-items: center!important;
    }


    .mb-4 {
        margin-bottom: 1rem!important;
    }

    .mb-8 {
        margin-bottom: 2rem!important;
    }
    .shadow-none {
        box-shadow: none!important;
    }

    .card>.list-group:last-child {
        border-bottom-left-radius: 0.5rem;
        border-bottom-right-radius: 0.5rem;
        border-bottom-width: 0;
    }
    .card>.list-group:first-child {
        border-top-left-radius: 0.5rem;
        border-top-right-radius: 0.5rem;
        border-top-width: 0;
    }
    .card>.list-group {
        border-bottom: inherit;
        border-top: inherit;
    }

</style>

