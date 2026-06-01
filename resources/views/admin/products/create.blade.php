@extends('layouts.admin')

@section('content')

<div class="welcome-text">
    Add Product
</div>

<div class="welcome-subtext">
    Add a new Hot Wheels product
</div>

<form method="POST"
      action="{{ route('admin.products.store') }}"
      enctype="multipart/form-data">

    @csrf

    <div class="table-card">
        <div class="card-body">

            <div class="mb-3">
                <label class="form-label">Product Name</label>
                <input type="text"
                       name="name"
                       class="form-control"
                       required>
            </div>

            <div class="mb-3">
                <label class="form-label">Price</label>
                <input type="number"
                       name="price"
                       class="form-control"
                       required>
            </div>

            <div class="mb-3">
                <label class="form-label">Stock</label>
                <input type="number"
                       name="stock"
                       class="form-control"
                       required>
            </div>

            <div class="mb-3">
                <label class="form-label">Image</label>
                <input type="file"
                       name="image"
                       class="form-control">
            </div>

            <button type="submit"
                    class="btn-primary-custom">
                Save Product
            </button>

            <a href="{{ route('admin.products.index') }}"
               class="btn btn-secondary ms-2">
                Back
            </a>

        </div>
    </div>

</form>

@endsection