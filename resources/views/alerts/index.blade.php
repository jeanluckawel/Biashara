@extends('dashboard')

@section('title','Products')

@section('content')

    <div class="container-fluid p-5">

        <div class="row justify-content-center">

            <div class="col-md-10">

                <div class="card shadow-sm">
                    <div class="card-header d-flex align-items-center">

                        <div>

                            <h3 class="card-title mb-0">

                                <i class="bi bi-exclamation-triangle-fill text-warning me-2"></i>

                                Low Stock Alert

                            </h3>
                            <br>

                            <small class="text-muted">

                                Products that have reached the minimum stock level.

                            </small>

                        </div>

                    </div>

                    <div class="card-body">

                        @if($lowStockProducts->count() > 0)

                            <div class="alert alert-warning d-flex align-items-center">

                                <div>

                                    @foreach($lowStockProducts as $product)

                                        <span class="badge bg-danger ms-2">

                                        {{ $product->name }} :

                                        {{ $product->quantity }}

                                    </span>

                                    @endforeach

                                </div>

                            </div>

                        @endif

                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection
