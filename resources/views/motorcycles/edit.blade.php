@extends('layouts.main', ['activePage' => 'motorcycles', 'titlePage' => 'Editar Motorcycle'])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="motorcycle" action="{{ route('motorcycles.update', $motorcycle->id) }}" class="form-horizontal">
                        @csrf
                        @method('PUT')
                        <div class="card">
                            <!--Header-->
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Editar motorcycle</h4>
                                <p class="card-category">Editar datos del motorcycle</p>
                            </div>
                            <!--End header-->
                            <!--Body-->
                            <div class="card-body">
                                <div class="row">
                                    <label for="title" class="col-sm-2 col-form-label">Title</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="title"
                                            placeholder="Ingrese el title" value="{{ old('title', $motorcycle->title) }}"
                                            autocomplete="off" autofocus>
                                    </div>
                                </div>
                            </div>
                            <!--End body-->
                            <!--Footer-->
                            <div class="card-footer ml-auto mr-auto">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </div>
                        <!--End footer-->
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
