@extends('layout.dashboard')

@section('title', 'Products | ')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h1>
            Products
        </h1>
        <div class="card">
            <div class="card-header">
                <div class="text-end">
                    <a href="{{ route('product.create') }}"
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
                        <th>Image</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Author</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @foreach($products as $product)
                        <tr class="text-center">
                            <td>{{ $product->id }}</td>
                            <td>
                                <img src="{{ asset($product->image) }}" alt="image" class="avatar">
                            </td>
                            <td>
                                <strong>{{ $product->name }}</strong><br><small class="text-secondary">{{ $product->code }}</small>
                            </td>
                            <td>
                                <h6 class="text-truncate d-flex align-items-center mb-0 fw-normal">
                                    <span
                                        class="avatar-sm rounded-circle d-flex justify-content-center align-items-center bg-label-primary me-3">
                                        <i class="{{ $product->category->icon }}"></i>
                                    </span>
                                    {{ $product->category->name }}
                                </h6>
                            </td>
                            <td>
                                <h6 class="text-truncate d-flex align-items-center mb-0 fw-normal">
                                    <span
                                        class="avatar-sm rounded-circle d-flex justify-content-center align-items-center bg-label-hover-secondary me-3">
                                        <i class="ri-edit-2-line"></i>
                                    </span>
                                    {{ $product->author }}
                                </h6>
                            </td>
                            <td>
                                <strong>$</strong>{{ $product->price }}
                            </td>
                            <td>
                                @if($product->status->alias == 'in-stock')
                                    <span class="badge rounded-pill bg-label-hover-success me-3">
                                        {{ $product->status->name }}
                                    </span>
                                @elseif($product->status->alias == 'sold')
                                    <span class="badge rounded-pill bg-label-hover-warning me-3">
                                        {{ $product->status->name }}
                                    </span>
                                @elseif($product->status->alias == 'disabled')
                                    <span class="badge rounded-pill bg-label-hover-danger me-3">
                                        {{ $product->status->name }}
                                    </span>
                                @else
                                    <span class="badge rounded-pill bg-label-hover-dark me-3">
                                        No status
                                    </span>
                                @endif
                            </td>
                            <td>
                                <form action="{{ route('product.destroy', ['product' => $product->id]) }}"
                                      method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <a href="{{ route('product.edit',['product' => $product->id]) }}"
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
                {!! $products !!}
            </div>
        </div>
    </div>
@endsection
