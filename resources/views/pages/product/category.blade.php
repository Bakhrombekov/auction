@extends('layout.dashboard')

@section('title', 'Product categories | ')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row gy-6 align-items-center justify-content-center">
            <div class="col-12 mb-5">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-md-6 order-2 order-md-1">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Welcome <span class="fw-bold">{{ (auth()->check()) ? str(auth()->user()->username)->ucfirst() : 'John' }}!</span> 🎉</h4>
                                <p class="mb-5">Choose a category to create a product 😎 </p>
{{--                                <p>Check your new badge in your profile.</p>--}}
                                <a href="{{ route('product.index') }}" class="btn btn-primary"><i class="ri-list-view me-2"></i> All products</a>
                            </div>
                        </div>
                        <div class="col-md-6 text-center text-md-end order-1 order-md-2">
                            <div class="card-body pb-0 px-0 pt-1_5">
                                <img
                                    src="{{ asset('assets/img/illustrations/illustration-john-light.png') }}"
                                    height="186"
                                    class="scaleX-n1-rtl"
                                    alt="" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @foreach($categories as $category)
                <div class="col-12 col-sm-4 col-md-4">
                    <a href="{{ route('product.show',['product' => $category->id]) }}"
                       class="card card-border-shadow-primary h-100 pt-5 pb-5">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-center mb-2">
                                <div class="avatar me-4">
                                    <i class="{{ $category->icon }}  ri-48px"></i>
                                </div>
                            </div>
                            <h3 class="mt-5 mb-3 fw-normal text-center">{{ $category->name }}</h3>
                            <p class="mb-0 text-center">
                                <span class="me-1 fw-medium">{{ $category->products()->count() }}</span>
                                <small class="text-muted">pc</small>
                            </p>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
