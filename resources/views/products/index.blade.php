@extends('dashboard')

@section('title','Products')


@section('content')

    <div class="container-fluid p-5">

        <div class="row justify-content-center">

            <div class="col-md-10">


                <div class="card shadow-sm">


                    <div class="card-header d-flex align-items-center">

                        <h3 class="card-title mb-0">
                            <i class="bi bi-box-seam-fill me-2"></i>
                            Products
                        </h3>

                        <div class="card-tools ms-auto d-flex align-items-center gap-2">

                            <div class="input-group input-group-sm" style="width:220px">

                                <input
                                    type="text"
                                    id="searchProduct"
                                    class="form-control"
                                    placeholder="Search...">

                                <span class="input-group-text">
                <i class="bi bi-search"></i>
            </span>

                            </div>

                            <button
                                type="button"
                                class="btn btn-primary btn-sm"
                                data-bs-toggle="modal"
                                data-bs-target="#createProductModal">

                                <i class="bi bi-plus-circle me-1"></i>
                                Add

                            </button>

                        </div>

                    </div>



                    <div class="card-body">

                        <table class="table table-bordered table-hover">

                            <thead class="table-light">

                            <tr>

                                <th style="width:40px">#</th>

                                <th>Code</th>

                                <th>Category</th>

                                <th>Name</th>

                                <th>Qty</th>

                                <th>Purchase</th>

                                <th>Selling</th>
                                <th>Currency</th>

                                <th width="120">Action</th>

                            </tr>

                            </thead>

                            <tbody id="productTable">

                            @forelse($products as $product)

                                <tr class="align-middle">

                                    <td>{{ $products->firstItem()+$loop->index }}</td>

                                    <td>{{ $product->code }}</td>

                                    <td>{{ $product->category->name }}</td>

                                    <td>{{ $product->name }}</td>

                                    <td>{{ $product->quantity }}</td>

                                    <td>{{ number_format($product->purchase_price,2) }}</td>


                                    <td>{{ number_format($product->selling_price,2) }}</td>


                                    <td>{{ $product->currency }}</td>

                                    <td>

                                        <button
                                            class="btn btn-warning btn-sm"
                                            data-bs-toggle="modal"
                                            data-bs-target="#editProductModal"
                                            data-id="{{ $product->id }}"
                                            data-category="{{ $product->category_id }}"
                                            data-name="{{ $product->name }}"
                                            data-code="{{ $product->code }}"
                                            data-quantity="{{ $product->quantity }}"
                                            data-purchase="{{ $product->purchase_price }}"
                                            data-selling="{{ $product->selling_price }}"
                                            data-discount="{{ $product->discount }}"
                                            data-tax="{{ $product->tax }}"
                                            data-currency="{{ $product->currency }}">

                                            <i class="bi bi-pencil"></i>

                                        </button>

                                        <button
                                            class="btn btn-danger btn-sm"
                                            data-bs-toggle="modal"
                                            data-bs-target="#deleteProductModal"
                                            data-id="{{ $product->id }}"
                                            data-name="{{ $product->name }}">

                                            <i class="bi bi-trash"></i>

                                        </button>

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="8" class="text-center">

                                        No products found

                                    </td>

                                </tr>

                            @endforelse

                            </tbody>

                        </table>

                    </div>




                    <div class="card-footer clearfix">

                        <div class="float-end">

                            {{ $products->links('pagination::bootstrap-5') }}

                        </div>

                    </div>


                </div>


            </div>


        </div>


    </div>



    @include('components.modals.Product.product-create')
    @include('components.modals.Product.product-edit')
    @include('components.modals.Product.product-delete')
    @include('components.alerts')

    <script>

        document
            .getElementById('searchProduct')
            .addEventListener('keyup', function () {

                let value = this.value.toLowerCase();

                let rows = document.querySelectorAll('#productTable tr');

                rows.forEach(function (row) {

                    let text = row.innerText.toLowerCase();

                    if (text.includes(value)) {

                        row.style.display = '';

                    } else {

                        row.style.display = 'none';

                    }

                });

            });

    </script>


@endsection
