@extends('layout.dashboard')

@section('vendor-css')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/typeahead-js/typeahead.css') }}"/>
    <link rel="stylesheet" href="{{ asset('/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}"/>
    <link rel="stylesheet"
          href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/swiper/swiper.css') }}"/>
@endsection

@section('page-css')
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/cards-statistics.css') }}"/>
@endsection

@section('vendor-js')
    <script src="{{ asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/swiper/swiper.js') }}"></script>
@endsection

@section('page-js')
    <script src="{{ asset('assets/js/app-ecommerce-dashboard.js') }}"></script>
@endsection

@section('content')
    <div class="container-fluid flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-12 col-xxl-3 col-md-4 mb-3">
                <div class="col-12">
                    <h1 class="text-center">
                        Filters
                    </h1>
                </div>
                <div class="col-12">
                    <form class="card" action="{{ route('dashboard.index') }}" method="GET">
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="name" class="form-label">Product name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Product name" value="{{ request()->query('name') }}">
                            </div>
                            <div class="mb-3">
                                <label for="category" class="form-label">Category</label>
                                <select id="category" name="category_id" class="form-select" data-placeholder="Select Category">
                                    <option value="">Select category</option>
                                    @foreach($categories as $model)
                                        <option value="{{ $model->id }}" @selected(request()->query('category_id') == $model->id)>{{ $model->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="classification" class="form-label">Classification</label>
                                <select id="classification" name="classification_id" class="form-select" data-placeholder="Select Classification">
                                    <option value="">Select classification</option>
                                    @foreach($classifications as $model)
                                        <option value="{{ $model->id }}" @selected(request()->query('classification_id') == $model->id)>{{ $model->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="material" class="form-label">Material</label>
                                <select id="material" name="material_id" class="form-select" data-placeholder="Select Material">
                                    <option value="">Select material</option>
                                    @foreach($materials as $model)
                                        <option value="{{ $model->id }}" @selected(request()->query('material_id') == $model->id)>{{ $model->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="author" class="form-label">Author</label>
                                <input type="text" class="form-control" id="author" name="author" placeholder="Author" value="{{ request()->query('author') }}">
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="price-from" class="form-label">Price from</label>
                                        <input type="number" min="0" class="form-control" id="price-from" name="price_from" placeholder="Price from" value="{{ request()->query('price_from') }}">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="price-to" class="form-label">Price to</label>
                                        <input type="number" min="0" class="form-control" id="price-to" name="price_to" placeholder="Price to" value="{{ request()->query('price_to') }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <a href="{{ route('dashboard.index') }}" class="btn btn-outline-dark">Reset</a>
                            <button type="submit" class="btn btn-primary">Filter</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-12 col-xxl-9 col-md-8 mb-3">
                <div class="row">
                    <div class="col-12">
                        <h1 class="text-center">
                            Auction board
                        </h1>
                    </div>
                    @foreach($products as $product)
                        <div class="col-12 col-xxl-4 col-md-6 mb-3">
                            <div class="card h-100">
                                <div class="card-body">
                                    <div class="bg-label-primary text-center mb-3 pt-2 rounded-3">
                                        <img
                                            class="img-fluid w-px-150"
                                            src="{{asset($product->image)}}"
                                            alt="image"/>
                                    </div>
                                    <h4 class="text-center mb-0">{{ $product->name }}</h4>
                                    <h5 class="text-center">
                                        <small>Auction date</small><br>
                                        {{ $product->auction_date->format('d.m.Y H:i:s') }}
                                    </h5>

                                    <div class="row mb-1 g-4">
                                        <div class="col-7 align-items-center">
                                            <div class="d-flex align-items-center">
                                                <div class="avatar flex-shrink-0 me-4">
                              <span class="avatar-initial rounded-3 bg-label-primary"
                              ><i class="{{ $product->category->icon }} ri-24px"></i
                                  ></span>
                                                </div>
                                                <div>
                                                    <h6 class="mb-0 fw-normal">{{ $product->category->name }}</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-5 align-items-center">
                                            <div class="d-flex">
                                                <div class="avatar flex-shrink-0 me-4">
                                          <span class="avatar-initial rounded-3 bg-label-primary">
                                              <i class="ri-money-dollar-box-line ri-24px"></i>
                                          </span>
                                                </div>
                                                <div>
                                                    <small>Price:</small>
                                                    <h6 class="mb-0 text-nowrap fw-normal">
                                                        <strong>$</strong> {{ number_format($product->price) }}
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-6 g-4">
                                        <div class="col-7 align-items-center">
                                            <div class="d-flex align-items-center">
                                                <div class="avatar flex-shrink-0 me-4">
                                          <span class="avatar-initial rounded-3 bg-label-primary">
                                              <i class="ri-remixicon-line ri-24px"></i>
                                          </span>
                                                </div>
                                                <div>
                                                    <h6 class="mb-0 fw-normal">{{ $product->classification->name }}</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-5 align-items-center">
                                            <div class="d-flex">
                                                <div class="avatar flex-shrink-0 me-4">
                              <span class="avatar-initial rounded-3 bg-label-primary"
                              ><i class="ri-box-3-line ri-24px"></i
                                  ></span>
                                                </div>
                                                <div>
                                                    <small>Material:</small>
                                                    <h6 class="mb-0 text-nowrap fw-normal">
                                                        <strong>{{ $product->material->name }}</strong>
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="card-footer border-top pt-3">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar avatar me-4">
                                                <img src="{{ asset('assets/img/avatars/'.rand(1,20).'.png') }}" alt="Avatar"
                                                     class="rounded-circle">
                                            </div>
                                            <div>
                                                <div>
                                                    <h6 class="mb-0 text-truncate">{{ $product->author }}</h6>
                                                    <small class="text-truncate">Author</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-end">
                                            <a href="javascript:void(0);" class="btn btn-primary w-100">View</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>


        </div>
    </div>
@endsection
