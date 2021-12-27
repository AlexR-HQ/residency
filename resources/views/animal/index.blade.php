@extends('layouts.main', ['activePage' => 'animal', 'titlePage' => 'Animal'])
@section('content')
    {{--  --}}
    {{-- JQuery --}}
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>
    {{-- Datatables --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.3/datatables.min.css" />
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.3/datatables.min.js"></script>
    {{-- toastr.js --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css"
        integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{--  --}}
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-nav-tabs card-plain">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Animal</h4>
                            <p class="card-category">Lista de animales registrados en la base de datos</p>
                            <br>
                            <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
                            <div class="nav-tabs-navigation">
                                <div class="nav-tabs-wrapper">
                                    <ul class="nav nav-tabs" data-tabs="tabs" id="myTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                                data-bs-target="#home" type="button" role="tab" aria-controls="home"
                                                aria-selected="true">Lista de Animales</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                                                data-bs-target="#profile" type="button" role="tab" aria-controls="profile"
                                                aria-selected="false">Nuevo Animal</button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-body ">
                            @php
                                $DateAndTime = date('m-d-Y h:i:s a', time());
                                echo "The current date and time are $DateAndTime.";
                            @endphp
                            <div class="tab-content text-center">
                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <table id="tabla-animal" class="table table-hover">
                                        <thead>
                                            <td>ID</td>
                                            <td>NOMBRE</td>
                                            <td>ESPECIE</td>
                                            <td>GENERO</td>
                                            <td>ACCIONES</td>
                                        </thead>

                                    </table>
                                </div>
                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <form id="registro-animal">
                                        @csrf
                                        <div class="form-group">
                                            <div class="row">
                                                <label for="title" class="col-sm-2 col-form-label">Nombre</label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control" id="txtNombre"
                                                        name="txtNombre" aria-describedby="emailHelp">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label for="exampleFormControlSelect1"
                                                    class="col-sm-2 col-form-label">Especie</label>
                                                <div class="col-sm-7">
                                                    <select class="form-select form-select-sm"
                                                        aria-label=".form-select-sm example" id="selEspecie"
                                                        name="selEspecie">
                                                        <option value="Gato">Gato</option>
                                                        <option value="Perro">Perro</option>
                                                        <option value="Ave">Ave</option>
                                                        <option value="Otros">Otros</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <div class="row">
                                                <label for="exampleFormControlSelect1"
                                                    class="col-sm-2 col-form-label">Genero</label>
                                                <div class="col-sm-7">
                                                    <div class="form-check form-check-radio">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input" type="radio" name="rbGenero"
                                                                id="rbGeneroMacho" value="Macho" checked>
                                                            Macho
                                                            <span class="circle">
                                                                <span class="check"></span>
                                                            </span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-radio">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input" type="radio" name="rbGenero"
                                                                id="rbGeneroHembra" value="Hembra">
                                                            Hembra
                                                            <span class="circle">
                                                                <span class="check"></span>
                                                            </span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Registrar</button>
                                    </form>
                                </div>
                            </div>
                            <!--modal para editar datos-->
                            <!-- Modal -->
                            <div class="modal fade" id="animal_edit_modal" data-bs-backdrop="static"
                                data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Editar Animal</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form id="animal_edit_form">

                                            <div class="modal-body">
                                                @csrf
                                                <input type="hidden" id="txtId2" name="txtId2 ">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label for="title2" class="col-sm-2 col-form-label">Nombre</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control" id="txtNombre2"
                                                                name="txtNombre2" aria-describedby="emailHelp">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label for="exampleFormControlSelect1"
                                                            class="col-sm-2 col-form-label">Especie</label>
                                                        <div class="col-sm-7">
                                                            <select class="form-select form-select-sm"
                                                                aria-label=".form-select-sm example" id="selEspecie2"
                                                                name="selEspecie2">
                                                                <option value="Gato">Gato</option>
                                                                <option value="Perro">Perro</option>
                                                                <option value="Ave">Ave</option>
                                                                <option value="Otros">Otros</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label for="exampleFormControlSelect1"
                                                            class="col-sm-2 col-form-label">Genero</label>
                                                        <div class="col-sm-7">
                                                            <div class="form-check form-check-radio">
                                                                <label class="form-check-label">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="rbGenero2" id="rbGeneroMacho2" value="Macho"
                                                                        checked>
                                                                    Macho
                                                                    <span class="circle">
                                                                        <span class="check"></span>
                                                                    </span>
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-radio">
                                                                <label class="form-check-label">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="rbGenero2" id="rbGeneroHembra2" value="Hembra">
                                                                    Hembra
                                                                    <span class="circle">
                                                                        <span class="check"></span>
                                                                    </span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Cancelar</button>
                                                <button type="submit" class="btn btn-primary">Actualizar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            {{-- Modal Eliminar --}}
                            <!-- Modal -->
                            <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Confirmacion</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            ¿Desea eliminar?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="button" id="btnEliminar" name="btnEliminar"
                                                class="btn btn-danger">Eliminar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script>
                            //LISTAR REGISTROS CON DATATABLE
                            $(document).ready(function() {
                                var tablaAnimal = $('#tabla-animal').DataTable({
                                    processing: true,
                                    serverSide: true,
                                    ajax: {
                                        url: "{{ route('animal.index') }}",
                                    },
                                    columns: [{
                                            data: 'id'
                                        },
                                        {
                                            data: 'nombre'
                                        },
                                        {
                                            data: 'especie'
                                        },
                                        {
                                            data: 'genero'
                                        },
                                        {
                                            data: 'action',
                                            orderable: false
                                        }
                                    ]
                                });
                            });
                        </script>

                        <script>
                            // REGISTRAR NUEVO ANIMAL
                            $('#registro-animal').submit(function(e) {
                                e.preventDefault();
                                var nombre = $('#txtNombre').val();
                                var especie = $('#selEspecie').val();
                                var genero = $("input[name='rbGenero']:checked").val();
                                var _token = $("input[name=_token]").val();
                                $.ajax({
                                    url: "{{ route('animal.registrar') }}",
                                    type: "POST",
                                    data: {
                                        nombre: nombre,
                                        especie: especie,
                                        genero: genero,
                                        _token: _token
                                    },
                                    success: function(response) {
                                        if (response) {
                                            $('#registro-animal')[0].reset();
                                            toastr.success('El registro se ingreso correctamente.', 'Nuevo Registro', {
                                                timeOut: 3000
                                            });
                                            $('#tabla-animal').DataTable().ajax.reload();
                                        }
                                    }
                                });
                            });
                        </script>

                        <script>
                            // ELIMINAR UN REGISTRO
                            var ani_id;
                            $(document).on('click', '.delete', function() {
                                ani_id = $(this).attr('id');
                                $('#confirmModal').modal('show');
                            });
                            $('#btnEliminar').click(function() {
                                $.ajax({
                                    url: "animal/eliminar/" + ani_id,
                                    beforeSend: function() {
                                        $('#btnEliminar').text('Eliminando...');
                                    },
                                    success: function(data) {
                                        setTimeout(function() {
                                            $('#confirmModal').modal('hide');
                                            toastr.warning('El registro fue eliminado correctamente.',
                                                'Eliminar Registro', {
                                                    timeOut: 3000
                                                });
                                            $('#tabla-animal').DataTable().ajax.reload();
                                        }, 2000);
                                        $('#btnEliminar').text('Eliminar');
                                    }
                                });
                            });
                        </script>

                        <script>
                            //EDITAR UN REGISTRO
                            function editarAnimal(id) {
                                $.get('animal/editar/' + id, function(animal) {
                                    //asignar los datos recuperados a la ventana modal
                                    $('#txtId2').val(animal[0].id);
                                    $('#txtNombre2').val(animal[0].nombre);
                                    $('#selEspecie2').val(animal[0].especie);
                                    //$('#rbGenero2').val(animal[0].genero);
                                    if (animal[0].genero == "Macho") {
                                        $('input[name=rbGenero2][value="Macho"]').prop('checked', true);
                                    }
                                    if (animal[0].genero == "Hembra") {
                                        $('input[name=rbGenero2][value="Hembra"]').prop('checked', true);
                                    }
                                    $("input[name=_token]").val();
                                    $('#animal_edit_modal').modal('toggle');
                                })
                            }
                        </script>

                        <script>
                            //ACTUALIZAR UN REGISTRO
                            $('#animal_edit_form').submit(function(e) {
                                e.preventDefault();
                                var id2 = $('#txtId2').val();
                                var nombre2 = $('#txtNombre2').val();
                                var especie2 = $('#selEspecie2').val();
                                var genero2 = $("input[name='rbGenero2']:checked").val();
                                var _token2 = $("input[name=_token]").val();
                                $.ajax({
                                    url: "{{ route('animal.actualizar') }}",
                                    type: "POST",
                                    data: {
                                        id: id2,
                                        nombre: nombre2,
                                        especie: especie2,
                                        genero: genero2,
                                        _token: _token2
                                    },
                                    success: function(response) {
                                        if (response) {
                                            $('#animal_edit_modal').modal('hide');
                                            toastr.info('El registro fue actualizado correctamente.',
                                                'Actualizar Registro', {
                                                    timeOut: 3000
                                                });
                                            $('#tabla-animal').DataTable().ajax.reload();
                                        }
                                    }
                                })
                            });
                        </script>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
@endsection
