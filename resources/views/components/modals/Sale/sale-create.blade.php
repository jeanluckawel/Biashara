<div class="modal fade" id="createSaleModal" tabindex="-1">


    <div class="modal-dialog modal-lg">


        <div class="modal-content">



            <div class="modal-header">


                <h5 class="modal-title">

                    <i class="bi bi-cart-plus me-2"></i>

                    Add Sale

                </h5>


                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal">

                </button>


            </div>





            <form action="{{ route('sales.store') }}" method="POST">

                @csrf



                <div class="modal-body">



                    {{-- CUSTOMER --}}
                    <div class="mb-3">


                        <label class="form-label">

                            Customer

                        </label>


                        <select
                            name="customer_id"
                            class="form-control"
                            required>


                            <option value="">

                                Select customer

                            </option>


                            @foreach($customers as $customer)


                                <option value="{{ $customer->id }}">

                                    {{ $customer->name }}

                                </option>


                            @endforeach


                        </select>


                    </div>






                    {{-- DATE --}}
                    <div class="mb-3">


                        <label class="form-label">

                            Sale Date

                        </label>


                        <input
                            type="date"
                            name="sale_date"
                            class="form-control"
                            value="{{ date('Y-m-d') }}"
                            required>


                    </div>






                    <hr>


                    <h6>

                        Products

                    </h6>





                    <table class="table table-bordered">


                        <thead class="table-light">


                        <tr>


                            <th>

                                Product

                            </th>


                            <th width="120">

                                Qty

                            </th>


                            <th width="150">

                                Price

                            </th>


                            <th width="150">

                                Total

                            </th>


                            <th width="50">

                                #

                            </th>


                        </tr>


                        </thead>





                        <tbody id="saleRows">


                        <tr>


                            <td>


                                <select
                                    name="products[0][product_id]"
                                    class="form-control product-select"
                                    required>


                                    <option value="">

                                        Select product

                                    </option>


                                    @foreach($products as $product)


                                        <option
                                            value="{{ $product->id }}"
                                            data-price="{{ $product->selling_price }}">

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
                                    class="form-control quantity"
                                    min="1"
                                    value="1"
                                    required>


                            </td>




                            <td>


                                <input
                                    type="number"
                                    name="products[0][price]"
                                    class="form-control price"
                                    readonly>


                            </td>




                            <td>


                                <input
                                    type="number"
                                    class="form-control subtotal"
                                    readonly>


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
                        id="addSaleRow">


                        <i class="bi bi-plus-circle"></i>

                        Add Product


                    </button>






                    <div class="text-end mt-3">


                        <h5>

                            Total :

                            <span id="saleTotal">

                                0

                            </span>


                        </h5>


                    </div>



                </div>






                <div class="modal-footer">


                    <button
                        type="button"
                        class="btn btn-secondary"
                        data-bs-dismiss="modal">

                        Close

                    </button>



                    <button
                        type="submit"
                        class="btn btn-primary">


                        <i class="bi bi-save me-1"></i>

                        Save


                    </button>



                </div>



            </form>



        </div>


    </div>


</div>






<script>


    let saleRow = 1;



    document
        .getElementById('addSaleRow')
        .addEventListener('click',function(){


            let html = `

<tr>


<td>


<select
name="products[${saleRow}][product_id]"
class="form-control product-select"
required>


<option value="">

Select product

</option>


@foreach($products as $product)

            <option
            value="{{ $product->id }}"
data-price="{{ $product->selling_price }}">

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
            name="products[${saleRow}][quantity]"
class="form-control quantity"
min="1"
value="1">

</td>




<td>

<input
type="number"
name="products[${saleRow}][price]"
class="form-control price"
readonly>

</td>



<td>

<input
type="number"
class="form-control subtotal"
readonly>

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
                .getElementById('saleRows')
                .insertAdjacentHTML('beforeend',html);


            saleRow++;


        });






    document.addEventListener('change',function(e){


        if(e.target.classList.contains('product-select')){


            let price =
                e.target.selectedOptions[0].dataset.price || 0;


            let row =
                e.target.closest('tr');


            row.querySelector('.price').value = price;


            calculateSale();


        }


    });






    document.addEventListener('input',function(e){


        if(e.target.classList.contains('quantity')){


            calculateSale();


        }


    });






    function calculateSale(){


        let total = 0;



        document.querySelectorAll('#saleRows tr')
            .forEach(function(row){


                let qty =
                    parseFloat(row.querySelector('.quantity').value) || 0;


                let price =
                    parseFloat(row.querySelector('.price').value) || 0;



                let subtotal = qty * price;



                row.querySelector('.subtotal').value =
                    subtotal.toFixed(2);



                total += subtotal;



            });



        document.getElementById('saleTotal').innerText =
            total.toFixed(2);



    }







    document.addEventListener('click',function(e){


        if(e.target.closest('.removeRow')){


            e.target.closest('tr').remove();


            calculateSale();


        }


    });



</script>
