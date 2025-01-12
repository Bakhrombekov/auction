@extends('layout.dashboard')
@section('title', 'Subject classifications | ')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h1>
            Subject classifications
        </h1>
        <div class="card">
            <div class="card-header">
                <div class="text-end">
                    <a href="{{ route('classification.create') }}"
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
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @foreach($classifications as $classification)
                        <tr class="text-center">
                            <td>{{ $classification->id }}</td>
                            <td>{{ $classification->name }}</td>
                            <td>
                                <form action="{{ route('classification.destroy', ['classification' => $classification->id]) }}"
                                      method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <a href="{{ route('classification.edit',['classification' => $classification->id]) }}"
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
                {!! $classifications !!}
            </div>
        </div>
    </div>
@endsection
