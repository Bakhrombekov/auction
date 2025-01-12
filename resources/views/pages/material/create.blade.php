@extends('layout.dashboard')

@section('title', 'Create material | ')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h1>
            Create material
        </h1>
        <form action="{{ route('material.store') }}" method="POST" class="card was-validated">
            @csrf
            <div class="card-header">
                <div class="text-end">
                    <a href="{{ route('material.index') }}"
                       class="btn btn-lg btn-label-dark waves-effect waves-light">
                        <span class="tf-icons ri-list-view ri-16px me-2"></span> All materials
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="form-floating form-floating-outline mb-5">
                            <input
                                type="text"
                                class="form-control"
                                id="name"
                                placeholder="Material name"
                                name="name"
                                aria-label="Material name"
                                required
                                value="{{ old('name') }}"
                            />
                            <label for="name">Name</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-floating form-floating-outline">
                            <select id="category"
                                    name="category_id"
                                    class="form-select"
                                    data-placeholder="Select Category"
                                    required
                            >
                                <option value="">Select category</option>
                                @foreach($categories as $model)
                                    <option
                                        value="{{ $model->id }}" @selected(old('category_id') == $model->id)>{{ $model->name }}</option>
                                @endforeach
                            </select>
                            <label for="category">Category</label>
                        </div>
                    </div>
                    <span>

                    </span>
                </div>
            </div>

            <div class="card-footer">
                <div class="text-end">
                    <button type="submit"
                            class="btn btn-lg btn-primary waves-effect waves-light">
                        <span class="tf-icons ri-save-line ri-16px me-2"></span> Save
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
