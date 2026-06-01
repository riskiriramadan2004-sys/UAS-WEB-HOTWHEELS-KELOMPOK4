@extends('layouts.admin')

@section('content')

<div class="welcome-text">
    Edit Product
</div>

<div class="welcome-subtext">
    Update Hot Wheels product information
</div>

<form method="POST"
      action="{{ route('admin.products.update', $product->id) }}"
      enctype="multipart/form-data">

    @csrf
    @method('PUT')

    <div class="table-card">
        <div class="card-body">

            <div class="mb-3">
                <label class="form-label">Product Name</label>

                <input type="text"
                       name="name"
                       class="form-control"
                       value="{{ $product->name }}"
                       required>
            </div>

            <div class="mb-3">
                <label class="form-label">Price</label>

                <input type="number"
                       name="price"
                       class="form-control"
                       value="{{ $product->price }}"
                       required>
            </div>

            <div class="mb-3">
                <label class="form-label">Stock</label>

                <input type="number"
                       name="stock"
                       class="form-control"
                       value="{{ $product->stock }}"
                       required>
            </div>

            <div class="mb-3">
                <label class="form-label">Current Image</label>

                <br>

                @if($product->image)
                    <img src="{{ asset('uploads/'.$product->image) }}"
                         width="120"
                         class="img-thumbnail">
                @else
                    <p>No image available</p>
                @endif
            </div>

            <div class="mb-3">
                <label class="form-label">New Image</label>

                <input type="file"
                       name="image"
                       class="form-control">
            </div>

            <button type="submit"
                    class="btn btn-warning">
                Update Product
            </button>

            <a href="{{ route('admin.products.index') }}"
               class="btn btn-secondary">
                Back
            </a>

        </div>
    </div>  

</form>

@endsection