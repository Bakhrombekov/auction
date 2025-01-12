@extends('layout.dashboard')

@section('title', $category->name . ' Edit | ')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h1>
            Edit {{ $category->name }} category
        </h1>
        <form action="{{ route('category.update', ['category' => $category->id]) }}" method="POST"
              class="card was-validated">
            @csrf
            @method('PUT')
            <div class="card-header">
                <div class="text-end">
                    <a href="{{ route('category.index') }}"
                       class="btn btn-lg btn-label-dark waves-effect waves-light">
                        <span class="tf-icons ri-list-view ri-16px me-2"></span> All category
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
                                placeholder="Category name"
                                name="name"
                                aria-label="Category name"
                                value="{{ old('name',$category->name) }}"
                                required
                            />
                            <label for="name">Name</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-floating form-floating-outline mb-5">
                            <input
                                type="text"
                                class="form-control"
                                id="icon"
                                placeholder="Category icon"
                                name="icon"
                                aria-label="Category icon"
                                value="{{ old('icon', $category->icon) }}"
                            />
                            <label for="icon">Icon</label>
                            <span class="form-label">https://remixicon.com</span>
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
