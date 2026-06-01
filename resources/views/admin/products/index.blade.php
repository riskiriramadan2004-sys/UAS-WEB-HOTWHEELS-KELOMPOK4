@extends('layouts.admin')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <div class="welcome-text">Products Management</div>
        <div class="welcome-subtext">Manage your Hot Wheels collection</div>
    </div>

    <a href="{{ route('admin.products.create') }}" class="btn-primary-custom text-decoration-none">
        <i class="fas fa-plus me-2"></i>
        Add New Product
    </a>
</div>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="table-card">
    <div class="card-header">
        <h5>
            <i class="fas fa-car me-2"></i>
            All Products
        </h5>
    </div>

    <div class="card-body">
        <table class="table table-dark table-hover align-middle mb-0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th width="180">Actions</th>
                </tr>
            </thead>

            <tbody>

                @forelse($products as $product)

                    <tr>

                        <td>#{{ $product->id }}</td>

                        <td>
                            @if($product->image)
                                <img
                                    src="{{ asset('uploads/'.$product->image) }}"
                                    width="55"
                                    height="55"
                                    style="object-fit:cover;border-radius:12px;"
                                >
                            @else
                                <span class="text-muted">
                                    No Image
                                </span>
                            @endif
                        </td>

                        <td>{{ $product->name }}</td>

                        <td>
                            Rp {{ number_format($product->price,0,',','.') }}
                        </td>

                        <td>

                            @if($product->stock <= 0)

                                <span class="badge bg-danger">
                                    Out of Stock
                                </span>

                            @elseif($product->stock <= 5)

                                <span class="badge bg-warning text-dark">
                                    Low Stock ({{ $product->stock }})
                                </span>

                            @else

                                <span class="badge bg-success">
                                    In Stock ({{ $product->stock }})
                                </span>

                            @endif

                        </td>

                        <td>

                            <a
                                href="{{ route('admin.products.edit',$product->id) }}"
                                class="btn btn-warning btn-sm"
                            >
                                Edit
                            </a>

                            <form
                                action="{{ route('admin.products.destroy',$product->id) }}"
                                method="POST"
                                class="d-inline delete-form"
                            >
                                @csrf
                                @method('DELETE')

                                <button
                                    type="button"
                                    class="btn btn-danger btn-sm delete-btn"
                                >
                                    Delete
                                </button>
                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="6" class="text-center text-muted">
                            Belum ada produk tersedia.
                        </td>
                    </tr>

                @endforelse

            </tbody>
        </table>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>

document.querySelectorAll('.delete-btn').forEach(button => {

    button.addEventListener('click', function () {

        const form = this.closest('.delete-form');

        Swal.fire({
            title: 'Delete Product?',
            text: 'Data produk akan dihapus permanen.',
            icon: 'warning',
            background: '#1a162e',
            color: '#ffffff',
            showCancelButton: true,
            confirmButtonColor: '#dc3545',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Yes, Delete',
            cancelButtonText: 'Cancel'
        }).then((result) => {

            if (result.isConfirmed) {
                form.submit();
            }

        });

    });

});

</script>

@endsection