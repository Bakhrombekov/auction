@extends('layout.dashboard')
@section('title', 'Materials and types | ')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h1>
            Material and types
        </h1>
        <div class="card">
            <div class="card-header">
                <div class="text-end">
                    <a href="{{ route('material.create') }}"
                       class="btn btn-lg rounded-pill btn-primary waves-effect waves-light">
                        <span class="tf-icons ri-add-circle-line ri-16px me-2"></span> Create
                    </a>
                </div>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table card-table border-top border-bottom">
                    <thead>
                    <tr class="text-center">
                        <th>#</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @foreach($materials as $material)
                        <tr class="text-center">
                            <td>{{ $material->id }}</td>
                            <td>{{ $material->name }}</td>
                            <td>
                                <span class="badge rounded-pill bg-label-primary">
                                    <i class="{{ $material->category->icon }} me-2"></i>{{ $material->category->name }}
                                </span>
                            </td>
                            <td>
                                <form action="{{ route('material.destroy', ['material' => $material->id]) }}"
                                      method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <a href="{{ route('material.edit',['material' => $material->id]) }}"
                                       class="btn rounded-pill btn-label-dark waves-effect waves-light">
                                        <span class="tf-icons ri-edit-box-line ri-16px me-2"></span> Edit
                                    </a>
                                    <button type="submit"
                                            class="btn rounded-pill btn-label-danger waves-effect waves-light">
                                        <span class="tf-icons ri-delete-bin-2-line ri-16px me-2"></span> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                {!! $materials !!}
            </div>
        </div>
    </div>
@endsection
