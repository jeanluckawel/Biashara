<div class="modal fade" id="createArrivalModal">


    <div class="modal-dialog">


        <div class="modal-content">


            <div class="modal-header">

                <h5 class="modal-title">

                    <i class="bi bi-box-arrow-in-down me-2"></i>
                    Add Arrival

                </h5>


                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal">

                </button>

            </div>




            <form action="{{ route('arrivals.store') }}" method="POST">

                @csrf


                <div class="modal-body">


                    <div class="mb-3">

                        <label>
                            Supplier
                        </label>


                        <select
                            name="supplier_id"
                            class="form-control"
                            required>


                            <option value="">
                                Select supplier
                            </option>


                            @foreach($suppliers as $supplier)

                                <option value="{{ $supplier->id }}">

                                    {{ $supplier->name }}

                                </option>

                            @endforeach


                        </select>

                    </div>





                    <div class="mb-3">

                        <label>
                            Arrival Date
                        </label>


                        <input
                            type="date"
                            name="arrival_date"
                            class="form-control"
                            value="{{ date('Y-m-d') }}"
                            required>

                    </div>




                    <hr>


                    <h6>
                        Products
                    </h6>



                    <table class="table table-bordered"
                           id="productsTable">


                        <thead class="table-light">

                        <tr>

                            <th>
                                Product
                            </th>


                            <th width="120">
                                Qty
                            </th>


                            <th width="150">
                                Purchase
                            </th>


                            <th width="80">
                                #
                            </th>


                        </tr>

                        </thead>



                        <tbody id="productRows">



                        <tr>


                            <td>


                                <select
                                    name="products[0][product_id]"
                                    class="form-control"
                                    required>


                                    <option value="">
                                        Select product
                                    </option>


                                    @foreach($products as $product)

                                        <option value="{{ $product->id }}">

                                            {{ $product->code }}
                                            -
                                            {{ $product->name }}

                                        </option>

                                    @endforeach


                                </select>


                            </td>




                            <td>

                                <input
                                    type="number"
                                    name="products[0][quantity]"
                                    class="form-control"
                                    min="1"
                                    required>

                            </td>




                            <td>

                                <input
                                    type="number"
                                    step="0.01"
                                    name="products[0][purchase_price]"
                                    class="form-control"
                                    required>


                            </td>




                            <td>


                                <button
                                    type="button"
                                    class="btn btn-danger btn-sm removeRow">

                                    <i class="bi bi-trash"></i>

                                </button>


                            </td>


                        </tr>



                        </tbody>


                    </table>




                    <button
                        type="button"
                        class="btn btn-success btn-sm"
                        id="addRow">


                        <i class="bi bi-plus-circle"></i>

                        Add Product


                    </button>



                </div>





                <div class="modal-footer">


                    <button
                        type="button"
                        class="btn btn-secondary"
                        data-bs-dismiss="modal">

                        Close

                    </button>



                    <button
                        class="btn btn-primary">


                        <i class="bi bi-save"></i>

                        Save


                    </button>



                </div>


            </form>


        </div>


    </div>


</div>






<script>


    let row = 1;



    document
        .getElementById('addRow')
        .addEventListener('click',function(){


            let html = `

<tr>


<td>


<select
name="products[${row}][product_id]"
class="form-control"
required>


<option value="">
Select product
</option>


@foreach($products as $product)

            <option value="{{ $product->id }}">

{{ $product->code }} -
{{ $product->name }}

            </option>

@endforeach


            </select>


            </td>



            <td>

            <input
            type="number"
            name="products[${row}][quantity]"
class="form-control"
min="1"
required>

</td>




<td>

<input
type="number"
step="0.01"
name="products[${row}][purchase_price]"
class="form-control"
required>

</td>




<td>

<button
type="button"
class="btn btn-danger btn-sm removeRow">


<i class="bi bi-trash"></i>


</button>


</td>



</tr>


`;



            document
                .getElementById('productRows')
                .insertAdjacentHTML(
                    'beforeend',
                    html
                );



            row++;


        });





    document.addEventListener(
        'click',
        function(e){


            if(e.target.closest('.removeRow')){


                e.target.closest('tr').remove();


            }


        });


</script>
