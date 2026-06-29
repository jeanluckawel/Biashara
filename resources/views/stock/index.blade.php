@extends('dashboard')

@section('title','Stock Movements')


<link rel="stylesheet"
      href="https://cdn.datatables.net/1.13.8/css/jquery.dataTables.min.css">

<link rel="stylesheet"
      href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">


@section('content')

    <div class="container-fluid p-5">


        <div class="row justify-content-center">


            <div class="col-md-10">


                <div class="card shadow-sm mb-4">
                    {{-- HEADER --}}
                    <div class="card-header d-flex align-items-center">


                        <h3 class="card-title mb-0">

                            <i class="bi bi-arrow-left-right me-2"></i>

                            Stock Movements

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



                            {{-- ADD STOCK --}}

                            <button
                                type="button"
                                class="btn btn-primary btn-sm"
                                data-bs-toggle="modal"
                                data-bs-target="#addStockModal">


                                <i class="bi bi-plus-circle me-1"></i>

                                Add


                            </button>


                        </div>


                    </div>





                    {{-- BODY --}}
                    <div class="card-body">


                        <table
                            id="movementDataTable"
                            class="table table-bordered table-hover">


                            <thead class="table-light">


                            <tr>


                                <th style="width:50px">
                                    #
                                </th>


                                <th>
                                    Code
                                </th>


                                <th>
                                    Product
                                </th>


                                <th>
                                    Category
                                </th>


                                <th>
                                    Type
                                </th>


                                <th>
                                    Qty
                                </th>


                                <th>
                                    User
                                </th>


                                <th>
                                    Description
                                </th>


                                <th>
                                    Date
                                </th>


                            </tr>


                            </thead>





                            <tbody id="movementTable">


                            @forelse($movements as $movement)


                                <tr class="align-middle">



                                    <td>

                                        {{ $movements->firstItem()+$loop->index }}

                                    </td>



                                    <td>

                                        {{ $movement->product?->code ?? '-' }}

                                    </td>




                                    <td>

                                        {{ $movement->product?->name ?? '-' }}

                                    </td>




                                    <td>

                                        {{ $movement->product?->category?->name ?? '-' }}

                                    </td>




                                    <td>


                                        @if($movement->type == 'IN')

                                            <span class="badge bg-success">

                                            <i class="bi bi-arrow-down-circle me-1"></i>
                                            IN

                                        </span>


                                        @else


                                            <span class="badge bg-danger">

                                            <i class="bi bi-arrow-up-circle me-1"></i>
                                            OUT

                                        </span>


                                        @endif


                                    </td>





                                    <td>

                                        {{ $movement->quantity }}

                                    </td>





                                    <td>

                                        {{ $movement->user?->name ?? '-' }}

                                    </td>





                                    <td>

                                        {{ $movement->description ?? '-' }}

                                    </td>





                                    <td>

                                        {{ $movement->created_at->format('d/m/Y H:i') }}

                                    </td>



                                </tr>



                            @empty


                                <tr>


                                    <td colspan="9"
                                        class="text-center">


                                        No stock movements found


                                    </td>


                                </tr>


                            @endforelse



                            </tbody>


                        </table>



                    </div>





                    {{-- FOOTER --}}
                    <div class="card-footer clearfix">


                        <div class="float-end">


                            {{ $movements->links('pagination::bootstrap-5') }}


                        </div>


                    </div>



                </div>



            </div>


        </div>


    </div>




    @include('components.modals.Stock.add-stock')
    @include('components.alerts')


    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.8.2/jspdf.plugin.autotable.min.js"></script>

    <script>


        document
            .getElementById('searchMovement')
            .addEventListener('keyup', function(){


                let value = this.value.toLowerCase();


                document
                    .querySelectorAll('#movementTable tr')
                    .forEach(function(row){


                        let text =
                            row.innerText.toLowerCase();



                        row.style.display =
                            text.includes(value)
                                ? ''
                                : 'none';


                    });


            });
    </script>

@endsection
