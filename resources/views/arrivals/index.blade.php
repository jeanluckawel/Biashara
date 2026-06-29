@extends('dashboard')

@section('title','Arrivals')

@section('content')

    <div class="container-fluid p-5">

        <div class="row justify-content-center">

            <div class="col-md-10">


                <div class="card shadow-sm">



                {{-- HEADER --}}
                    <div class="card-header d-flex align-items-center">

                        <h3 class="card-title mb-0">

                            <i class="bi bi-box-arrow-in-down me-2"></i>

                            Arrivals

                        </h3>

                        <div class="card-tools ms-auto d-flex align-items-center gap-2">

                            {{-- SEARCH --}}
                            <div class="input-group input-group-sm" style="width:220px">

                                <input
                                    type="text"
                                    id="searchArrival"
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
                                data-bs-target="#createArrivalModal">

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

                                <th width="50">#</th>

                                <th>Reference</th>

                                <th>Supplier</th>

                                <th>Date</th>

                                <th>Total</th>

                                <th>Status</th>

                                <th width="150">Action</th>

                            </tr>

                            </thead>

                            <tbody id="arrivalTable">

                            @forelse($arrivals as $arrival)

                                <tr class="align-middle">

                                    <td>

                                        {{ $arrivals->firstItem() + $loop->index }}

                                    </td>

                                    <td>

                                        {{ $arrival->reference }}

                                    </td>

                                    <td>

                                        {{ $arrival->supplier->name }}

                                    </td>

                                    <td>

                                        {{ $arrival->arrival_date }}

                                    </td>

                                    <td>

                                        $ {{ number_format($arrival->total_amount,2) }}

                                    </td>

                                    <td>

                                        @if($arrival->status=='Received')

                                            <span class="badge bg-success">

                                            Received

                                        </span>

                                        @else

                                            <span class="badge bg-warning">

                                            Pending

                                        </span>

                                        @endif

                                    </td>

                                    <td>


                                        {{-- DETAILS --}}
                                        <button
                                            type="button"
                                            class="btn btn-info btn-sm"
                                            data-bs-toggle="modal"
                                            data-bs-target="#arrivalDetailsModal"

                                            data-id="{{ $arrival->id }}"
                                            data-reference="{{ $arrival->reference }}">

                                            <i class="bi bi-list-ul"></i>

                                        </button>


                                        {{-- EDIT --}}
                                        <button
                                            type="button"
                                            class="btn btn-warning btn-sm"

                                            data-bs-toggle="modal"
                                            data-bs-target="#editArrivalModal"

                                            data-id="{{ $arrival->id }}"
                                            data-supplier="{{ $arrival->supplier_id }}"
                                            data-date="{{ $arrival->arrival_date }}"
                                            data-status="{{ $arrival->status }}">

                                            <i class="bi bi-pencil"></i>

                                        </button>






                                        {{-- DELETE --}}
                                        <button
                                            type="button"
                                            class="btn btn-danger btn-sm"

                                            data-bs-toggle="modal"
                                            data-bs-target="#deleteArrivalModal"

                                            data-id="{{ $arrival->id }}"
                                            data-reference="{{ $arrival->reference }}">

                                            <i class="bi bi-trash"></i>

                                        </button>



                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="7" class="text-center">

                                        No arrivals found

                                    </td>

                                </tr>

                            @endforelse

                            </tbody>

                        </table>

                    </div>

                    {{-- FOOTER --}}
                    <div class="card-footer clearfix">

                        <div class="float-end">

                            {{ $arrivals->links('pagination::bootstrap-5') }}

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    @include('components.modals.Arrival.create')
    @include('components.modals.Arrival.edit')
    @include('components.modals.Arrival.delete')
    @include('components.modals.Arrival.details')

    @include('components.alerts')

    <script>

        document.getElementById('searchArrival')
            .addEventListener('keyup',function(){

                let value=this.value.toLowerCase();

                document.querySelectorAll('#arrivalTable tr').forEach(function(row){

                    row.style.display=row.innerText.toLowerCase().includes(value)
                        ? ''
                        : 'none';

                });

            });


        document
            .getElementById('arrivalDetailsModal')
            .addEventListener('show.bs.modal', function(event){


                let button = event.relatedTarget;


                let id = button.getAttribute('data-id');


                let reference = button.getAttribute('data-reference');



                document
                    .getElementById('arrival_reference')
                    .innerText = reference;



                fetch(`/arrivals/${id}/details`)


                    .then(response => response.json())


                    .then(data => {



                        console.log(data);



                        let html = '';



                        data.forEach((detail,index)=>{


                            html += `

            <tr>

                <td>
                    ${index + 1}
                </td>


                <td>
                    ${detail.product.name}
                </td>


                <td class="text-center">
                    ${detail.quantity}
                </td>


                <td>
                    ${detail.purchase_price}
                </td>


                <td>
                    ${detail.subtotal}
                </td>


            </tr>

            `;


                        });



                        document
                            .getElementById('arrivalDetailsBody')
                            .innerHTML = html;



                    })

                    .catch(error => {

                        console.error(error);

                    });



            });

    </script>

@endsection

