@extends('dashboard')

@section('title','Sales')


@section('content')


    <div class="container-fluid p-5">


        <div class="card shadow-sm">


            {{-- HEADER --}}
            <div class="card-header d-flex align-items-center">


                <h3 class="mb-0">

                    <i class="bi bi-cart-check-fill me-2 text-success"></i>

                    All Sales

                </h3>



                <div class="card-tools ms-auto d-flex align-items-center gap-2">



                    {{-- DATE START --}}
                    <input
                        type="date"
                        class="form-control form-control-sm"
                        style="width:150px;"
                        id="date_start"
                    >





                    {{-- DATE END --}}
                    <input
                        type="date"
                        class="form-control form-control-sm"
                        style="width:150px;"
                        id="date_end"
                    >






                    {{-- SEARCH DATE --}}
                    <button
                        class="btn btn-primary btn-sm"
                        title="Filter">

                        <i class="bi bi-search"></i>

                    </button>






                    {{-- EXPORT ICONS --}}

                    {{-- EXPORT --}}
                    <div class="d-flex gap-2">


                        <button
                            type="button"
                            id="exportExcel"
                            class="btn btn-success btn-sm"
                            title="Excel">

                            <i class="bi bi-file-earmark-excel"></i>

                        </button>



                        <button
                            type="button"
                            id="exportWord"
                            class="btn btn-primary btn-sm"
                            title="Word">

                            <i class="bi bi-file-earmark-word"></i>

                        </button>



                        <button
                            type="button"
                            id="exportPdf"
                            class="btn btn-danger btn-sm"
                            title="PDF">

                            <i class="bi bi-file-earmark-pdf"></i>

                        </button>



                        <button
                            type="button"
                            onclick="window.print()"
                            class="btn btn-secondary btn-sm"
                            title="Print">

                            <i class="bi bi-printer"></i>

                        </button>


                    </div>


                </div>


            </div>



            <div class="card-body">


                <table class="table table-bordered table-hover">


                    <thead class="table-light">


                    <tr>

                        <th>#</th>

                        <th>
                            <i class="bi bi-hash"></i>
                            Reference
                        </th>


                        <th>
                            <i class="bi bi-person"></i>
                            Customer
                        </th>

                        <th>User</th>


                        <th>Date</th>


                        <th>Total</th>


                        <th>Paid</th>


                        <th>Change</th>


                        <th>Status</th>


                        <th>Action</th>


                    </tr>


                    </thead>



                    <tbody>



                    @forelse($sales as $sale)



                        <tr>


                            <td>

                                {{ $sales->firstItem()+$loop->index }}

                            </td>


                            <td>

                                {{ $sale->reference }}

                            </td>



                            <td>

                                {{ $sale->customer?->name ?? '-' }}

                            </td>


                            <td>


                                <i class="bi bi-person-circle me-1"></i>


                                {{ $sale->user?->name ?? '-' }}


                            </td>



                            <td>

                                {{ \Carbon\Carbon::parse($sale->sale_date)->format('d/m/Y') }}

                            </td>



                            <td>

                                {{ number_format($sale->total_amount,2) }}

                            </td>



                            <td>

                                {{ number_format($sale->paid_amount,2) }}

                            </td>




                            <td>

                                @if($sale->paid_amount > $sale->total_amount)

                                    {{ number_format(
                                    $sale->paid_amount - $sale->total_amount,
                                    2
                                    ) }}

                                @else

                                    0.00

                                @endif


                            </td>




                            <td>


                                @switch($sale->status)


                                    @case('Paid')

                                        <span class="badge bg-success">

Paid

</span>

                                        @break



                                    @case('Partial')

                                        <span class="badge bg-warning">

Partial

</span>

                                        @break



                                    @case('Cancelled')

                                        <span class="badge bg-danger">

Cancelled

</span>

                                        @break



                                    @default

                                        <span class="badge bg-secondary">

Pending

</span>


                                @endswitch


                            </td>



                            <td>


                                <a href="{{ route('sales.show',$sale->id) }}"
                                   class="btn btn-primary btn-sm">


                                    <i class="bi bi-eye"></i>


                                </a>



                            </td>



                        </tr>



                    @empty


                        <tr>

                            <td colspan="9"
                                class="text-center">

                                No sales found

                            </td>

                        </tr>


                    @endforelse



                    </tbody>


                </table>



            </div>



            <div class="card-footer">


                <div class="float-end">

                    {{ $sales->links('pagination::bootstrap-5') }}

                </div>


            </div>



        </div>



    </div>


@endsection
