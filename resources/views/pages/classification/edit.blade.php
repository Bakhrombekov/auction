@extends('layout.dashboard')

@section('title', $classification->name . ' Edit | ')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h1>
            Edit {{ $classification->name }} classification
        </h1>
        <form action="{{ route('classification.update', ['classification' => $classification->id]) }}" method="POST"
              class="card was-validated">
            @csrf
            @method('PUT')
            <div class="card-header">
                <div class="text-end">
                    <a href="{{ route('classification.index') }}"
                       class="btn btn-lg btn-label-dark waves-effect waves-light">
                        <span class="tf-icons ri-list-view ri-16px me-2"></span> All subject classifications
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
                                placeholder="Classification name"
                                name="name"
                                aria-label="Classification name"
                                value="{{ old('name',$classification->name) }}"
                                required
                            />
                            <label for="name">Name</label>
                        </div>
                    </div>
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
