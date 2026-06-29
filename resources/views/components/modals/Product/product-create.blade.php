{{--<div class="modal fade" id="createProductModal" tabindex="-1">--}}

{{--    <div class="modal-dialog">--}}

{{--        <div class="modal-content">--}}


{{--            <div class="modal-header">--}}

{{--                <h5 class="modal-title">--}}

{{--                    <i class="bi bi-box-seam me-2"></i>--}}

{{--                    Add Product--}}

{{--                </h5>--}}


{{--                <button type="button"--}}
{{--                        class="btn-close"--}}
{{--                        data-bs-dismiss="modal">--}}
{{--                </button>--}}

{{--            </div>--}}



{{--            <form action="{{ route('products.store') }}"--}}
{{--                  method="POST">--}}

{{--                @csrf--}}



{{--                <div class="modal-body">--}}


{{--                    --}}{{-- CATEGORY --}}
{{--                    <div class="mb-3">--}}

{{--                        <label class="form-label">--}}
{{--                            Category--}}
{{--                        </label>--}}


{{--                        <select--}}
{{--                            name="category_id"--}}
{{--                            class="form-control"--}}
{{--                            autocomplete="off"--}}
{{--                            required>--}}


{{--                            <option value="">--}}
{{--                                Select category--}}
{{--                            </option>--}}


{{--                            @foreach($categories as $category)--}}

{{--                                <option value="{{ $category->id }}">--}}

{{--                                    {{ $category->name }}--}}

{{--                                </option>--}}

{{--                            @endforeach--}}


{{--                        </select>--}}


{{--                    </div>--}}





{{--                    --}}{{-- NAME --}}
{{--                    <div class="mb-3">--}}


{{--                        <label class="form-label">--}}
{{--                            Product Name--}}
{{--                        </label>--}}


{{--                        <input--}}
{{--                            type="text"--}}
{{--                            name="name"--}}
{{--                            id="product_name"--}}
{{--                            class="form-control"--}}
{{--                            autocomplete="off"--}}
{{--                            required>--}}


{{--                    </div>--}}


{{--                    <div class="row">--}}


{{--                        --}}{{-- QUANTITY --}}
{{--                        <div class="col-md-4 mb-3">--}}

{{--                            <label class="form-label">--}}
{{--                                Quantity--}}
{{--                            </label>--}}

{{--                            <input--}}
{{--                                type="number"--}}
{{--                                name="quantity"--}}
{{--                                class="form-control"--}}
{{--                                min="1"--}}
{{--                                placeholder="0"--}}
{{--                                autocomplete="off"--}}
{{--                                required>--}}

{{--                        </div>--}}





{{--                        --}}{{-- PURCHASE PRICE --}}
{{--                        <div class="col-md-4 mb-3">--}}

{{--                            <label class="form-label">--}}
{{--                                Purchase Price--}}
{{--                            </label>--}}

{{--                            <input--}}
{{--                                type="number"--}}
{{--                                step="0.01"--}}
{{--                                id="purchase_price"--}}
{{--                                name="purchase_price"--}}
{{--                                class="form-control"--}}
{{--                                placeholder="0.00"--}}
{{--                                autocomplete="off"--}}
{{--                                required>--}}

{{--                        </div>--}}






{{--                        --}}{{-- SELLING PRICE --}}
{{--                        <div class="col-md-4 mb-3">--}}

{{--                            <label class="form-label">--}}
{{--                                Selling Price--}}
{{--                            </label>--}}

{{--                            <input--}}
{{--                                type="number"--}}
{{--                                step="0.01"--}}
{{--                                id="selling_price"--}}
{{--                                name="selling_price"--}}
{{--                                class="form-control"--}}
{{--                                placeholder="0.00"--}}
{{--                                autocomplete="off"--}}
{{--                                required>--}}

{{--                        </div>--}}


{{--                    </div>--}}


{{--                    <div class="row">--}}


{{--                        --}}{{-- QUANTITY --}}
{{--                        <div class="col-md-4 mb-3">--}}

{{--                            <label class="form-label">--}}
{{--                                Quantity--}}
{{--                            </label>--}}

{{--                            <input--}}
{{--                                type="number"--}}
{{--                                name="quantity"--}}
{{--                                class="form-control"--}}
{{--                                min="1"--}}
{{--                                value="1"--}}
{{--                                autocomplete="off"--}}
{{--                                required>--}}

{{--                        </div>--}}





{{--                        --}}{{-- TAX --}}
{{--                        <div class="col-md-4 mb-3">--}}

{{--                            <label class="form-label">--}}
{{--                                Tax %--}}
{{--                            </label>--}}

{{--                            <input--}}
{{--                                type="number"--}}
{{--                                step="0.01"--}}
{{--                                name="tax"--}}
{{--                                class="form-control"--}}
{{--                                value="0"--}}
{{--                                autocomplete="off">--}}

{{--                        </div>--}}






{{--                        --}}{{-- CURRENCY --}}
{{--                        <div class="col-md-4 mb-3">--}}

{{--                            <label class="form-label">--}}
{{--                                Currency--}}
{{--                            </label>--}}


{{--                            <select--}}
{{--                                name="currency"--}}
{{--                                class="form-control"--}}
{{--                                autocomplete="off">--}}


{{--                                <option value="USD">--}}
{{--                                    USD--}}
{{--                                </option>--}}


{{--                                <option value="CDF">--}}
{{--                                    CDF--}}
{{--                                </option>--}}


{{--                            </select>--}}


{{--                        </div>--}}


{{--                    </div>--}}















{{--                    --}}{{-- PRICE ERROR --}}
{{--                    <div id="priceError"--}}
{{--                         class="alert alert-danger d-none">--}}


{{--                        Selling price cannot be lower than purchase price.--}}


{{--                    </div>--}}



{{--                </div>--}}







{{--                <div class="modal-footer">--}}


{{--                    <button--}}
{{--                        type="button"--}}
{{--                        class="btn btn-secondary"--}}
{{--                        data-bs-dismiss="modal">--}}


{{--                        Close--}}


{{--                    </button>--}}




{{--                    <button--}}
{{--                        type="submit"--}}
{{--                        class="btn btn-primary">--}}


{{--                        <i class="bi bi-save me-1"></i>--}}

{{--                        Save--}}


{{--                    </button>--}}


{{--                </div>--}}



{{--            </form>--}}


{{--        </div>--}}


{{--    </div>--}}


{{--</div>--}}





{{--<script>--}}

{{--    document.addEventListener('DOMContentLoaded', function(){--}}


{{--        const nameInput =--}}
{{--            document.getElementById('product_name');--}}


{{--        const purchase =--}}
{{--            document.getElementById('purchase_price');--}}


{{--        const selling =--}}
{{--            document.getElementById('selling_price');--}}


{{--        const error =--}}
{{--            document.getElementById('priceError');--}}





{{--        // Format nom produit--}}

{{--        nameInput.addEventListener('input', function(){--}}


{{--            let value = this.value;--}}


{{--            this.value =--}}
{{--                value.charAt(0).toUpperCase()--}}
{{--                +--}}
{{--                value.slice(1).toLowerCase();--}}


{{--        });--}}







{{--        // Vérification prix--}}

{{--        function checkPrice(){--}}


{{--            let buy =--}}
{{--                parseFloat(purchase.value) || 0;--}}


{{--            let sell =--}}
{{--                parseFloat(selling.value) || 0;--}}



{{--            if(sell < buy && sell > 0){--}}


{{--                error.classList.remove('d-none');--}}


{{--                return false;--}}


{{--            }--}}


{{--            error.classList.add('d-none');--}}


{{--            return true;--}}


{{--        }--}}






{{--        purchase.addEventListener(--}}
{{--            'input',--}}
{{--            checkPrice--}}
{{--        );--}}


{{--        selling.addEventListener(--}}
{{--            'input',--}}
{{--            checkPrice--}}
{{--        );--}}







{{--        document--}}
{{--            .querySelector('#createProductModal form')--}}
{{--            .addEventListener('submit', function(e){--}}


{{--                if(!checkPrice()){--}}


{{--                    e.preventDefault();--}}


{{--                }--}}


{{--            });--}}



{{--    });--}}


{{--</script>--}}




<div class="modal fade" id="createProductModal" tabindex="-1">

    <div class="modal-dialog">

        <div class="modal-content">


            <div class="modal-header">

                <h5 class="modal-title">

                    <i class="bi bi-box-seam me-2"></i>

                    Add Product

                </h5>


                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal">
                </button>

            </div>



            <form action="{{ route('products.store') }}"
                  method="POST">

                @csrf


                <div class="modal-body">


                    {{-- CATEGORY --}}
                    <div class="mb-3">

                        <label class="form-label">
                            Category
                        </label>


                        <select
                            name="category_id"
                            class="form-control"
                            required>


                            <option value="">
                                Select category
                            </option>


                            @foreach($categories as $category)

                                <option value="{{ $category->id }}">

                                    {{ $category->name }}

                                </option>

                            @endforeach


                        </select>


                    </div>





                    {{-- PRODUCT NAME --}}
                    <div class="mb-3">


                        <label class="form-label">
                            Product Name
                        </label>


                        <input
                            type="text"
                            name="name"
                            id="product_name"
                            class="form-control"
                            autocomplete="off"
                            required>


                    </div>



                    <div class="row">

                        {{-- SELLING PRICE --}}
                        <div class="col-md-6 mb-3">

                            <label class="form-label">

                                Selling Price

                                <small class="text-muted">
                                    (optional)
                                </small>

                            </label>


                            <input
                                type="number"
                                step="0.01"
                                name="selling_price"
                                id="selling_price"
                                class="form-control"
                                placeholder="0.00"
                                autocomplete="off">

                        </div>





                        {{-- CURRENCY --}}
                        <div class="col-md-6 mb-3">


                            <label class="form-label">

                                Currency

                                <small class="text-muted">
                                    (optional)
                                </small>

                            </label>


                            <select
                                name="currency"
                                class="form-control">


                                <option value="USD">

                                    USD

                                </option>


                                <option value="CDF">

                                    CDF

                                </option>


                            </select>


                        </div>


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

    document.addEventListener('DOMContentLoaded', function(){


        const nameInput =
            document.getElementById('product_name');



        nameInput.addEventListener('input', function(){


            let value = this.value;


            this.value =
                value.charAt(0).toUpperCase()
                +
                value.slice(1).toLowerCase();


        });



    });

</script>
