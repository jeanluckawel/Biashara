<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">

<div class="modal fade" id="addStockModal">



    <div class="modal-dialog">


        <div class="modal-content">


            <div class="modal-header">


                <h5 class="modal-title">

                    <i class="bi bi-box-arrow-in-down me-2"></i>

                    Add Stock

                </h5>


                <button
                    class="btn-close"
                    data-bs-dismiss="modal">

                </button>


            </div>





            <form action="{{ route('stock-movements.store') }}"
                  method="POST">


                @csrf



                <div class="modal-body">


                    <div class="mb-3">

                        <label class="form-label">

                            Product

                        </label>


                        <select
                            name="product_id"
                            id="product_id"
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

                                    (Stock:
                                    {{ $product->quantity }}
                                    )

                                </option>


                            @endforeach


                        </select>


                    </div>






                    <div class="mb-3">

                        <label>
                            Quantity
                        </label>


                        <input
                            type="number"
                            name="quantity"
                            class="form-control"
                            min="1"
                            required>


                    </div>





                    <div class="mb-3">

                        <label>
                            Description
                        </label>


                        <input
                            type="text"
                            name="description"
                            class="form-control"
                            value="Restock">


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
                        class="btn btn-primary">

                        <i class="bi bi-save"></i>

                        Save

                    </button>


                </div>



            </form>


        </div>


    </div>


</div>




<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


<script>

    $(document).ready(function(){


        $('#product_id').select2({


            dropdownParent: $('#addStockModal'),


            placeholder: "Search product...",


            allowClear:true,


            width:'100%'


        });



    });


</script>
