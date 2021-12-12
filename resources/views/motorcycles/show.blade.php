@extends('layouts.main', ['activePage' => 'motorcycles', 'titlePage' => 'Detalles del motorcycle'])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <!--Header-->
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">motorcycles</h4>
                            <p class="card-category">Vista detallada de {{ $motorcycle->name }}</p>
                        </div>
                        <!--End header-->
                        <!--Body-->
                        <div class="card-body">
                            <div class="row">
                                <!-- first -->
                                <div class="col-md-4">
                                    <div class="card card-user">
                                        <div class="card-body">
                                            <p class="card-text">
                                            <div class="author">
                                                <div class="block block-one"></div>
                                                <div class="block block-two"></div>
                                                <div class="block block-three"></div>
                                                <div class="block block-four"></div>
                                                <a href="#">
                                                    <img class="avatar"
                                                        src="{{ asset('/img/default-avatar.png') }}" alt="">
                                                    <h5 class="title mt-3">{{ $motorcycle->name }}</h5>
                                                </a>
                                                <p class="description">
                                                    {{ _('Ceo/Co-Founder') }} <br>
                                                    {{ $motorcycle->name }} <br>
                                                    {{ $motorcycle->brand }} <br>
                                                    {{ $motorcycle->created_at }}
                                                </p>
                                            </div>
                                            </p>
                                            <div class="card-description">
                                                {{ _('Do not be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...') }}
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="button-container">
                                                <button type="submit" class="btn btn-sm btn-primary">Editar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end first-->
                            </div>
                            <!--end row-->
                        </div>
                        <!--End card body-->
                    </div>
                    <!--End card-->
                </div>
            </div>
        </div>
    </div>
@endsection
