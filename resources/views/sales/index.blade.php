@extends('dashboard')

@section('title','New Sale')


<link
    href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css"
    rel="stylesheet" />


<style>


    .select2-container{
        width:100% !important;
    }

    .select2-container .select2-selection--single{

        height:38px !important;

        border:1px solid #ced4da !important;

    }

    .select2-selection__rendered{

        line-height:36px !important;

    }

    .select2-selection__arrow{

        height:36px !important;

    }

</style>




@section('content')

    <form id="saleForm"
          action="{{ route('sales.store') }}"
          method="POST">
        @csrf

    <div class="container-fluid p-4">

        <div class="row">

            {{-- LEFT --}}
            <div class="col-lg-8">

                <div class="card shadow-sm">

                    <div class="card-header d-flex justify-content-between align-items-center">

                        <div>

                            <h4 class="mb-0">

                                <i class="bi bi-cart-check-fill text-success me-2"></i>

                                New Sale

                            </h4>


                        </div>

                        <div>


                        </div>

                    </div>

                    <div class="card-body">

                        {{-- CUSTOMER --}}

                        <div class="row mb-4">

                            <div class="col-md-8">

                                <label class="form-label fw-bold">

                                    Customer

                                </label>

                                    <select name="customer_id" id="customerSelect" class="form-select">

                                    <option value="">

                                        Walk-in Customer

                                    </option>

                                    @foreach($customers as $customer)

                                        <option value="{{ $customer->id }}">

                                            {{ $customer->name }}

                                            @if($customer->phone)

                                                - {{ $customer->phone }}

                                            @endif

                                        </option>

                                    @endforeach

                                </select>

                            </div>

                            <div class="col-md-4 text-end">

                                <label class="form-label">&nbsp;</label>

                                <button
                                    type="button"
                                    class="btn btn-success w-100"
                                    data-bs-toggle="modal"
                                    data-bs-target="#createCustomerModal">

                                    <i class="bi bi-person-plus-fill me-1"></i>

                                    New Customer

                                </button>

                            </div>

                        </div>

                        <hr>


                        {{-- PRODUCT SEARCH --}}

                        <div class="row mb-4">

                            <div class="col-md-8">

                                <label class="form-label fw-bold">

                                    Search Product

                                </label>

                                <select
                                    id="productSelect"
                                    class="form-select">

                                    <option value="">

                                        Search Product...

                                    </option>

                                    @foreach($products as $product)

                                        <option

                                            value="{{ $product->id }}"

                                            data-name="{{ $product->name }}"

                                            data-price="{{ $product->selling_price }}"

                                            data-stock="{{ $product->quantity }}"

                                            data-currency="{{ $product->currency }}"

                                        >

                                            {{ $product->code }}

                                            -

                                            {{ $product->name }}

                                            |

                                            Stock :

                                            {{ $product->quantity }}

                                            |

                                            {{ $product->selling_price }} - {{ $product->currency }}

                                        </option>

                                    @endforeach

                                </select>

                            </div>

                            <div class="col-md-4">

                                <label class="form-label fw-bold">

                                    Barcode

                                </label>

                                <input
                                    type="text"
                                    id="barcode"
                                    class="form-control"
                                    placeholder="Scan barcode">

                            </div>

                        </div>




                        <hr>



                        {{-- PRODUCT TABLE --}}

                        <table class="table table-bordered table-hover align-middle">

                            <thead class="table-light">

                            <tr>

                                <th width="40">#</th>

                                <th>Product</th>

                                <th width="120">Qty</th>

                                <th width="120">Price</th>

                                <th width="120">Total</th>

                                <th width="70">Action</th>

                            </tr>

                            </thead>

                            <tbody id="saleItems">

                            {{-- Products will appear here --}}

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

            {{-- RIGHT --}}

            <div class="col-lg-4">

                <div class="card shadow-sm">

                    <div class="card-header bg-primary text-white">

                        <h5 class="mb-0">

                            <i class="bi bi-receipt me-2"></i>

                            Sale Summary

                        </h5>

                    </div>

                    <div class="card-body">


                        <table class="table table-sm">


                            <tr>

                                <th>

                                    Items

                                </th>

                                <td class="text-end" id="itemCount">

                                    0

                                </td>

                            </tr>



                            <tr>

                                <th>

                                    Subtotal

                                </th>

                                <td class="text-end" id="subtotal">

                                    0

                                </td>

                            </tr>



                            <tr>

                                <th>

                                    Discount

                                </th>

                                <td class="text-end">

                                    0

                                </td>

                            </tr>



                            <tr>

                                <th>

                                    Tax

                                </th>

                                <td class="text-end">

                                    0 {{ $products->first()->currency ?? '' }}

                                </td>

                            </tr>



                        </table>





                        <div class="alert alert-success text-center py-2">


                            <h6 class="mb-1">

                                TOTAL

                            </h6>



                            <h4 class="fw-bold mb-0" id="grandTotal">

                                0

                            </h4>


                        </div>





                        <div class="mb-3">


                            <label class="form-label">

                                Payment

                            </label>



                            <select name="payment_method" class="form-select" id="paymentMethod">


                                <option value="cash">

                                    Cash

                                </option>


                                <option value="card">

                                    Card

                                </option>


                                <option value="mobile">

                                    Mobile Money

                                </option>


                            </select>


                        </div>



                        <div class="mb-3">

                            <label class="form-label">

                                Amount Received

                            </label>

                            <input
                                type="number"
                                name="paid_amount"
                                id="amountReceived"
                                class="form-control">


                        </div>





                        <div class="mb-4">

                            <label class="form-label">

                                Change

                            </label>


                            <input
                                type="text"
                                class="form-control bg-light"
                                id="changeAmount"
                                value="0"
                                readonly>


                        </div>



                        <input type="hidden" name="products" id="productsInput">

                        <input type="hidden" name="total_amount" id="totalInput">




                        <div class="d-flex justify-content-between">


                            <button
                                type="button"
                                onclick="cancelSale()"
                                class="btn btn-secondary">



                                <i class="bi bi-x-circle me-1"></i>

                                Cancel


                            </button>




                            <button
                                type="submit"
                                class="btn btn-success"
                                onclick="prepareSale()">

                                <i class="bi bi-check-circle me-1"></i>

                                Complete Sale

                            </button>



                        </div>



                    </div>

                </div>

            </div>

        </div>

    </div>

    </form>

    @include('components.alerts')


    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>



    <script>
        let saleItems = [];


        $(document).ready(function(){


            $('#customerSelect').select2({

                placeholder:"Walk-in Customer",

                allowClear:true

            });



            $('#productSelect').select2({

                placeholder:"Search Product",

                allowClear:true

            });





            $('#productSelect').on('select2:select',function(){



                let option = $(this).find(':selected');



                let product = {

                    id: option.val(),

                    name: option.data('name'),

                    price: Number(option.data('price')),

                    currency: option.data('currency'),

                    stock: Number(option.data('stock')),

                    qty:1

                };



                addProduct(product);



                $(this)
                    .val(null)
                    .trigger('change');



            });



        });






        function addProduct(product){


            let exist = saleItems.find(
                item => item.id == product.id
            );



            if(exist){


                if(exist.qty < exist.stock){

                    exist.qty++;

                }


            }else{


                saleItems.push(product);


            }



            renderItems();



        }









        function renderItems(){



            let html='';


            let total=0;


            let count=0;




            saleItems.forEach(function(item,index){



                let subtotal =
                    item.qty * item.price;



                total += subtotal;


                count += item.qty;




                html += `


<tr>


<td>
${index+1}
</td>


<td>

${item.name}

</td>



<td>

<input

type="number"

class="form-control"

value="${item.qty}"

min="1"

max="${item.stock}"

onchange="changeQty(${index},this.value)"

>

</td>




<td>

${item.price} ${item.currency}

</td>




<td>

${subtotal} ${item.currency}

</td>




<td>

<button

class="btn btn-danger btn-sm"

onclick="removeItem(${index})">


<i class="bi bi-trash"></i>


</button>


</td>


</tr>


`;



            });





            $('#saleItems').html(html);



            updateSummary(count,total);



        }









        function changeQty(index,qty){



            qty=parseInt(qty);



            if(qty > saleItems[index].stock){


                qty=saleItems[index].stock;


            }



            if(qty < 1){

                qty=1;

            }



            saleItems[index].qty=qty;



            renderItems();



        }









        function removeItem(index){



            saleItems.splice(index,1);



            renderItems();



        }









        function updateSummary(count,total){


            $('#itemCount').text(count);


            let currency = '';


            if(saleItems.length > 0){

                currency = saleItems[0].currency;

            }



            $('#subtotal')
                .text(total.toFixed(2) + ' ' + currency);



            $('#grandTotal')
                .text(total.toFixed(2) + ' ' + currency);




            let received =
                Number($('#amountReceived').val());



            let change =
                received - total;



            if(change < 0){

                change = 0;

            }



            $('#changeAmount')
                .val(change + ' ' + currency);



        }



        $('#amountReceived').on('input',function(){

            let received = Number($(this).val()) || 0;


            let total = 0;

            saleItems.forEach(function(item){

                total += item.qty * item.price;

            });



            let change = received - total;


            if(change < 0){

                change = 0;

            }



            let currency = '';

            if(saleItems.length > 0){

                currency = saleItems[0].currency;

            }



            $('#changeAmount')
                .val(change.toFixed(2) + ' ' + currency);


        });


        function cancelSale(){

            saleItems=[];

            renderItems();

            $('#amountReceived').val(0);

            $('#changeAmount').val(0);

        }



        function prepareSale(){

            $('#productsInput').val(
                JSON.stringify(saleItems)
            );

            let total = 0;

            saleItems.forEach(function(item){

                total += item.qty * item.price;

            });

            $('#totalInput').val(total);


        }

        $('form').on('submit', function () {

            $('#productsInput').val(JSON.stringify(saleItems));

            let total = 0;

            saleItems.forEach(function(item){
                total += item.qty * item.price;
            });

            $('#totalInput').val(total);

        });

        $('#saleForm').submit(function(){

            $('#productsInput').val(JSON.stringify(saleItems));

            let total = 0;

            saleItems.forEach(function(item){

                total += item.qty * item.price;

            });

            $('#totalInput').val(total);

        });



    </script>




@endsection

