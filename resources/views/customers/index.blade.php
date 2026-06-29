@extends('dashboard')

@section('title', 'Customers')

@section('content')

    <div class="container-fluid p-5">

        <div class="row justify-content-center">

            <div class="col-md-10">


                <div class="card shadow-sm">


                    {{-- HEADER --}}
                    <div class="card-header d-flex align-items-center">


                        <h3 class="card-title mb-0">

                            <i class="bi bi-people-fill me-2"></i>

                            Customers

                        </h3>



                        <div class="card-tools ms-auto d-flex align-items-center gap-2">


                            {{-- SEARCH --}}
                            <div class="input-group input-group-sm"
                                 style="width:220px">


                                <input
                                    type="text"
                                    id="searchCustomer"
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
                                data-bs-target="#createCustomerModal">


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
                                    Address
                                </th>


                                <th>
                                    Status
                                </th>


                                <th width="120">
                                    Action
                                </th>


                            </tr>


                            </thead>





                            <tbody id="customerTable">


                            @forelse($customers as $customer)


                                <tr class="align-middle">


                                    <td>

                                        {{ $loop->iteration }}

                                    </td>



                                    <td>

                                        {{ $customer->name }}

                                    </td>



                                    <td>

                                        {{ $customer->phone ?? '-' }}

                                    </td>



                                    <td>

                                        {{ $customer->address ?? '-' }}

                                    </td>




{{--                                    <td>--}}


{{--                                        @if($customer->status == 'Active')--}}


{{--                                            <span class="badge bg-success">--}}

{{--                                            Active--}}

{{--                                        </span>--}}


{{--                                        @else--}}


{{--                                            <span class="badge bg-danger">--}}

{{--                                            Inactive--}}

{{--                                        </span>--}}


{{--                                        @endif--}}


{{--                                    </td>--}}




                                    <td>



                                        {{-- EDIT --}}

                                        <button
                                            type="button"
                                            class="btn btn-warning btn-sm"

                                            data-bs-toggle="modal"

                                            data-bs-target="#editCustomerModal"

                                            data-id="{{ $customer->id }}"

                                            data-name="{{ $customer->name }}"

                                            data-phone="{{ $customer->phone }}"

                                            data-address="{{ $customer->address }}"

                                            data-status="{{ $customer->status }}">


                                            <i class="bi bi-pencil"></i>


                                        </button>





                                        {{-- DELETE --}}

                                        <button
                                            type="button"
                                            class="btn btn-danger btn-sm"

                                            data-bs-toggle="modal"

                                            data-bs-target="#deleteCustomerModal"

                                            data-id="{{ $customer->id }}"

                                            data-name="{{ $customer->name }}">


                                            <i class="bi bi-trash"></i>


                                        </button>



                                    </td>



                                </tr>



                            @empty


                                <tr>


                                    <td colspan="6"
                                        class="text-center">


                                        No customers found


                                    </td>


                                </tr>


                            @endforelse



                            </tbody>



                        </table>


                    </div>





                    {{-- FOOTER --}}
                    <div class="card-footer clearfix">


                        <div class="float-end">


                            {{ $customers->links('pagination::bootstrap-5') }}


                        </div>


                    </div>



                </div>


            </div>


        </div>


    </div>





    @include('components.modals.Customer.customer-create')

    @include('components.modals.Customer.customer-edit')

    @include('components.modals.Customer.customer-delete')


    @include('components.alerts')





    <script>


        document
            .getElementById('searchCustomer')
            .addEventListener('keyup',function(){


                let value=this.value.toLowerCase();



                document
                    .querySelectorAll('#customerTable tr')
                    .forEach(function(row){


                        row.style.display =
                            row.innerText
                                .toLowerCase()
                                .includes(value)

                                ? ''

                                : 'none';



                    });



            });



    </script>


@endsection
