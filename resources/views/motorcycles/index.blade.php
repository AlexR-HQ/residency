@extends('layouts.main', ['activePage' => 'motorcycles', 'titlePage' => 'Motorcycles'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Motorcycles</h4>
                            <p class="card-category">Lista de motorcycles registrados en la base de datos</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 text-right">
                                    @can('motorcycle_create')
                                        <a href="{{ route('motorcycles.create') }}" class="btn btn-sm btn-facebook">Añadir
                                            motorcycles</a>
                                    @endcan
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table ">
                                    <thead class="text-primary">
                                        <th> ID </th>
                                        <th> Nombre </th>
                                        <th> Marca </th>
                                        <th> Tiempo </th>
                                        <th> Fecha de creación </th>
                                        <th class="text-right"> Acciones </th>
                                    </thead>
                                    <tbody>
                                        @forelse ($motorcycles as $motorcycle)
                                            <tr>
                                                <td>{{ $motorcycle->id }}</td>
                                                <td>{{ $motorcycle->title }}</td>
                                                <td class="text-primary">
                                                    {{ $motorcycle->created_at->toFormattedDateString() }}</td>
                                                <td class="td-actions text-right">
                                                    @can('motorcycle_show')
                                                        <a href="{{ route('motorcycles.show', $motorcycle->id) }}"
                                                            class="btn btn-info">
                                                            <i class="material-icons">person</i> </a>
                                                    @endcan
                                                    @can('motorcycle_edit')
                                                        <a href="{{ route('motorcycles.edit', $motorcycle->id) }}"
                                                            class="btn btn-success"> <i class="material-icons">edit</i> </a>
                                                    @endcan
                                                    @can('motorcycle_destroy')
                                                        <form action="{{ route('motorcycles.destroy', $motorcycle->id) }}"
                                                            method="motorcycle" onsubmit="return confirm('areYouSure')"
                                                            style="display: inline-block;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" rel="tooltip" class="btn btn-danger">
                                                                <i class="material-icons">close</i>
                                                            </button>
                                                        </form>
                                                    @endcan
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="2">Sin registros.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                {{-- {{ $users->links() }} --}}
                            </div>
                        </div>
                        <!--Footer-->
                        <div class="card-footer mr-auto">
                            {{ $motorcycles->links() }}
                        </div>
                        <!--End footer-->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
