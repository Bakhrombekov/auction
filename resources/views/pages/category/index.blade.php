@extends('layout.dashboard')
@section('title', 'Categories | ')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h1>
            Categories
        </h1>
        <div class="card">
            <div class="card-header">
                <div class="text-end">
                    <a href="{{ route('category.create') }}"
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
                        <th>Icon</th>
                        <th>Name</th>
                        <th>Alias</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @foreach($categories as $category)
                        <tr class="text-center">
                            <td>{{ $category->id }}</td>
                            <td>
                                <i class="{{ $category->icon }} ri-22px text-primary me-4"></i>
                            </td>
                            <td>{{ $category->name }}</td>

                            <td>
                                    <span class="badge rounded-pill bg-label-primary">
                                        {{ $category->alias }}
                                    </span>
                            </td>
                            <td>
                                <form action="{{ route('category.destroy', ['category' => $category->id]) }}"
                                      method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <a href="{{ route('category.edit',['category' => $category->id]) }}"
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
                {!! $categories !!}
            </div>
        </div>
    </div>
@endsection
