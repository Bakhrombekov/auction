@extends('layout.dashboard')

@section('title', 'Create product | ')

@section('vendor-css')
    {{--    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/typeahead-js/typeahead.css') }}"/>--}}
@endsection

@section('page-js')
    {{--    <script src="{{ asset('assets/js/app-ecommerce-product-add.js') }}"></script>--}}
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <form class="app-ecommerce was-validated" action="{{ route('product.store') }}" method="POST"
              enctype="multipart/form-data">
            @csrf
            <!-- Add Product -->
            <div
                class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-6 row-gap-4">
                <div class="d-flex flex-column justify-content-center">
                    <h4 class="mb-1">Add a new Product for {{ $category->name }} category</h4>
                    <p class="mb-0">Products placed across your auction board</p>
                </div>
                <div class="d-flex align-content-center flex-wrap gap-4">
                    <a href="{{ route('product.index') }}" class="btn btn-outline-secondary"><i
                            class="ri-list-view me-2"></i> All Products</a>
                    <button type="submit" class="btn btn-primary">
                        <i class="ri-save-3-line me-2"></i> Save
                    </button>
                </div>
            </div>

            <div class="row">
                <!-- First column-->
                <div class="col-12 col-lg-8">
                    <!-- Product Information -->
                    <div class="card mb-6">
                        <div class="card-header">
                            <h5 class="card-tile mb-0">Product information</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-floating form-floating-outline mb-5">
                                <input
                                    type="text"
                                    class="form-control"
                                    id="product-name"
                                    placeholder="Product name"
                                    name="name"
                                    aria-label="Product title"
                                    required
                                    value="{{ old('name') }}"
                                />
                                <label for="product-name">Name</label>
                            </div>

                            <div class="row mb-5 gx-5">
                                <div class="col-12 col-sm-12 col-md-6">
                                    <div class="form-floating form-floating-outline">
                                        <input
                                            type="number"
                                            class="form-control"
                                            id="product-code"
                                            placeholder="00000"
                                            name="code"
                                            min="10000000"
                                            max="99999999"
                                            value="{{ old('code','10000000') }}"
                                            aria-label="Product Code"
                                            required

                                        />
                                        <label for="product-code">Code</label>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-6">
                                    <div class="form-floating form-floating-outline">
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="product-author"
                                            placeholder="John Doe"
                                            name="author"
                                            aria-label="Product author"
                                            required
                                            value="{{ old('author') }}"
                                        />
                                        <label for="product-author">Author</label>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-12">
                                    <p class="mb-1 mt-3">Description (Optional)</p>

                                    <div class="form-floating form-floating-outline mb-6">
                                        <textarea
                                            name="description"
                                            class="form-control h-px-100"
                                            id="product-description"
                                            placeholder="Comments here..."
                                            aria-label="Product description"
                                        >{{ old('description') }}</textarea>
                                        <label for="product-description">Description</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Product Information -->
                    <!-- Media -->
                    <div class="card mb-6">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0 card-title">Product Image</h5>
                            {{--                            <a href="javascript:void(0);" class="fw-medium">Add media from URL</a>--}}
                        </div>
                        <div class="card-body">
                            <div class="form-floating form-floating-outline">
                                <input
                                    type="file"
                                    class="form-control"
                                    id="product-image"
                                    placeholder="Choose image"
                                    name="image"
                                    aria-label="Product image"
                                    required
                                />
                                <label for="product-image">Image</label>
                            </div>
                        </div>
                    </div>
                    <!-- /Media -->
                </div>
                <!-- /Second column -->

                <!-- Second column -->
                <div class="col-12 col-lg-4">
                    <!-- Pricing Card -->
                    <div class="card mb-6">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Pricing</h5>
                        </div>
                        <div class="card-body">
                            <!-- Product Price -->
                            <div class="form-floating form-floating-outline mb-5">
                                <input
                                    type="number"
                                    class="form-control"
                                    id="product-price"
                                    placeholder="Price"
                                    name="price"
                                    aria-label="Product price"
                                    min="0"
                                    required
                                    value="{{ old('price') }}"
                                />
                                <label for="product-price">Price</label>
                            </div>

                            <!-- Auction date -->
                            <div class="form-floating form-floating-outline mb-5">
                                <input
                                    type="date"
                                    class="form-control"
                                    id="product-auction-date"
                                    placeholder="Auction Date"
                                    name="auction_date"
                                    aria-label="Product auction date"
                                    value="{{ old('auction_date') }}"
                                />
                                <label for="product-auction-date">Auction Date</label>
                            </div>
                        </div>
                    </div>
                    <!-- /Pricing Card -->
                    <!-- Organize Card -->
                    <div class="card mb-6">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Organize</h5>
                        </div>
                        <div class="card-body">
                            <!-- Category -->
                            <div class="mb-5 col ecommerce-select2-dropdown">
                                <div class="form-floating form-floating-outline">
                                    <select id="product-category"
                                            name="category_id"
                                            class="select2 form-select"
                                            data-placeholder="Select Category"
                                            required
                                            disabled
                                    >
                                        <option value="">Select category</option>
                                        @foreach($categories as $model)
                                            <option
                                                value="{{ $model->id }}" @selected(old('category_id', $category->id) == $model->id)>{{ $model->name }}</option>
                                        @endforeach
                                    </select>
                                    <label for="product-category">Category</label>
                                </div>
                                <input type="hidden" name="category_id" value="{{ $category->id }}">
                            </div>
                            <!-- Subject Classification -->
                            <div class="mb-5 col ecommerce-select2-dropdown">
                                <div class="form-floating form-floating-outline">
                                    <select id="product-classification"
                                            name="classification_id"
                                            class="select2 form-select"
                                            data-placeholder="Select subject classification"
                                            required
                                    >
                                        <option value="">Select subject classification</option>
                                        @foreach($classifications as $classification)
                                            <option
                                                @selected(old('classification_id') == $classification->id)
                                                value="{{ $classification->id }}">{{ $classification->name }}</option>
                                        @endforeach
                                    </select>
                                    <label for="product-classification">Subject Classification</label>
                                </div>
                            </div>
                            <!-- Material -->
                            <div class="mb-5 col ecommerce-select2-dropdown">
                                <div class="form-floating form-floating-outline">
                                    <select id="product-material"
                                            name="material_id"
                                            class="select2 form-select"
                                            data-placeholder="Select material or type"
                                            required
                                    >
                                        <option value="">Select material or type</option>
                                        @foreach($materials as $material)
                                            <option
                                                value="{{ $material->id }}" @selected(old('material_id') == $material->id)>{{ $material->name }}</option>
                                        @endforeach
                                    </select>
                                    <label for="product-material">Material or type</label>
                                </div>
                            </div>
                            <div class="mb-5 col">
                                <div class="form-floating form-floating-outline mb-5">
                                    <input
                                        type="number"
                                        class="form-control"
                                        id="product-year"
                                        placeholder="Price"
                                        name="year"
                                        aria-label="Product year"
                                        min="0"
                                        max="9999"
                                        required
                                        value="{{ old('year') }}"
                                    />
                                    <label for="product-year">Year</label>
                                </div>
                            </div>
                            <!-- Status -->
                            <div class="mb-5 col ecommerce-select2-dropdown">
                                <div class="form-floating form-floating-outline">
                                    <select id="product-status"
                                            name="status_id"
                                            class="select2 form-select"
                                            data-placeholder="Select Product Status"
                                            required
                                    >
                                        <option value="">Select product status</option>
                                        @foreach($statuses as $status)
                                            <option
                                                value="{{ $status->id }}" @selected(old('status_id') == $status->id)>{{ $status->name }}</option>
                                        @endforeach
                                    </select>
                                    <label for="product-material">Status</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Organize Card -->
                </div>
                <!-- /Second column -->
            </div>
        </form>
    </div>
@endsection
