@extends('dashboard')

@section('title','Suppliers')


@section('content')


    <div class="container-fluid p-5">

        <div class="row justify-content-center">

            <div class="col-md-10">


                <div class="card shadow-sm">



                    {{-- HEADER --}}
                    <div class="card-header d-flex align-items-center">


                        <h3 class="card-title mb-0">

                            <i class="bi bi-building me-2"></i>

                            Suppliers

                        </h3>



                        <div class="card-tools ms-auto d-flex align-items-center gap-2">



                            {{-- SEARCH --}}
                            <div class="input-group input-group-sm"
                                 style="width:220px">


                                <input
                                    type="text"
                                    id="searchSupplier"
                                    class="form-control"
                                    placeholder="Search...">


                                <span class="input-group-text">

                                <i class="bi bi-search"></i>

                            </span>


                            </div>





                            {{-- ADD --}}
                            <button
                                type="button"
                                class="btn btn-primary btn-sm"
                                data-bs-toggle="modal"
                                data-bs-target="#createSupplierModal">


                                <i class="bi bi-plus-circle me-1"></i>

                                Add


                            </button>



                        </div>



                    </div>






                    {{-- BODY --}}
                    <div class="card-body">


                        <table class="table table-bordered table-hover">


                            <thead class="table-light">


                            <tr>


                                <th width="50">
                                    #
                                </th>


                                <th>
                                    Name
                                </th>


                                <th>
                                    Phone
                                </th>


                                <th>
                                    Email
                                </th>


                                <th>
                                    Address
                                </th>


                                <th width="120">
                                    Action
                                </th>


                            </tr>


                            </thead>






                            <tbody id="supplierTable">


                            @forelse($suppliers as $supplier)


                                <tr class="align-middle">



                                    <td>

                                        {{ $suppliers->firstItem()+$loop->index }}

                                    </td>



                                    <td>

                                        {{ $supplier->name }}

                                    </td>




                                    <td>

                                        {{ $supplier->phone ?? '-' }}

                                    </td>




                                    <td>

                                        {{ $supplier->email ?? '-' }}

                                    </td>




                                    <td>

                                        {{ $supplier->address ?? '-' }}

                                    </td>




                                    <td>


                                        {{-- EDIT --}}
                                        <button
                                            class="btn btn-warning btn-sm"
                                            data-bs-toggle="modal"
                                            data-bs-target="#editSupplierModal"

                                            data-id="{{ $supplier->id }}"
                                            data-name="{{ $supplier->name }}"
                                            data-phone="{{ $supplier->phone }}"
                                            data-email="{{ $supplier->email }}"
                                            data-address="{{ $supplier->address }}">

                                            <i class="bi bi-pencil"></i>

                                        </button>






                                        {{-- DELETE --}}
                                        <button
                                            class="btn btn-danger btn-sm"
                                            data-bs-toggle="modal"
                                            data-bs-target="#deleteSupplierModal"
                                            data-id="{{ $supplier->id }}"
                                            data-name="{{ $supplier->name }}">

                                            <i class="bi bi-trash"></i>

                                        </button>



                                    </td>



                                </tr>




                            @empty


                                <tr>


                                    <td colspan="6"
                                        class="text-center">


                                        No suppliers found


                                    </td>


                                </tr>


                            @endforelse



                            </tbody>


                        </table>



                    </div>







                    {{-- FOOTER --}}
                    <div class="card-footer clearfix">


                        <div class="float-end">


                            {{ $suppliers->links('pagination::bootstrap-5') }}


                        </div>



                    </div>




                </div>



            </div>


        </div>


    </div>





    @include('components.modals.Supplier.create')

    @include('components.modals.Supplier.edit')

    @include('components.modals.Supplier.delete')

    @include('components.alerts')





    <script>


        document
            .getElementById('searchSupplier')
            .addEventListener('keyup', function(){


                let value = this.value.toLowerCase();



                document
                    .querySelectorAll('#supplierTable tr')
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
