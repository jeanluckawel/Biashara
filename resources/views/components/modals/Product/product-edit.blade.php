<div class="modal fade" id="editProductModal" tabindex="-1">


    <div class="modal-dialog">


        <div class="modal-content">



            <div class="modal-header">


                <h5 class="modal-title">

                    <i class="bi bi-pencil-square me-2"></i>

                    Edit Product

                </h5>


                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal">

                </button>


            </div>





            <form id="editForm" method="POST">


                @csrf
                @method('PUT')



                <div class="modal-body">



                    <input type="hidden" id="edit_id">





                    {{-- CATEGORY --}}

                    <div class="mb-3">

                        <label>
                            Category
                        </label>


                        <select
                            id="edit_category"
                            name="category_id"
                            class="form-control"
                            required>


                            @foreach($categories as $category)

                                <option value="{{ $category->id }}">

                                    {{ $category->name }}

                                </option>


                            @endforeach


                        </select>


                    </div>







                    {{-- NAME --}}

                    <div class="mb-3">


                        <label>

                            Product Name

                        </label>


                        <input
                            type="text"
                            id="edit_name"
                            name="name"
                            class="form-control"
                            required>


                    </div>








                    {{-- CODE --}}

                    <div class="mb-3">


                        <label>

                            Code

                        </label>


                        <input
                            type="text"
                            id="edit_code"
                            class="form-control bg-light"
                            readonly>


                    </div>









                    <div class="row">



                        {{-- SELLING PRICE --}}

                        <div class="col-md-6 mb-3">


                            <label>

                                Selling Price

                                <small class="text-muted">
                                    (optional)
                                </small>


                            </label>


                            <input
                                type="number"
                                step="0.01"
                                id="edit_selling_price"
                                name="selling_price"
                                class="form-control">


                        </div>







                        {{-- CURRENCY --}}

                        <div class="col-md-6 mb-3">


                            <label>

                                Currency

                            </label>


                            <select
                                id="edit_currency"
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









                    <div class="row">



                        <div class="col-md-6 mb-3">


                            <label>

                                Discount %

                            </label>


                            <input
                                type="number"
                                step="0.01"
                                id="edit_discount"
                                name="discount"
                                class="form-control"
                                value="0">


                        </div>






                        <div class="col-md-6 mb-3">


                            <label>

                                Tax %

                            </label>


                            <input
                                type="number"
                                step="0.01"
                                id="edit_tax"
                                name="tax"
                                class="form-control"
                                value="0">


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
                        class="btn btn-primary">


                        <i class="bi bi-save me-1"></i>

                        Update


                    </button>



                </div>



            </form>



        </div>


    </div>


</div>

<script>
    const editModal =
        document.getElementById('editProductModal');


    editModal.addEventListener(
        'show.bs.modal',
        function(event){


            let button = event.relatedTarget;



            document.getElementById('edit_category').value =
                button.dataset.category;



            document.getElementById('edit_name').value =
                button.dataset.name;



            document.getElementById('edit_code').value =
                button.dataset.code;



            document.getElementById('edit_selling_price').value =
                button.dataset.selling ?? '';



            document.getElementById('edit_discount').value =
                button.dataset.discount ?? 0;



            document.getElementById('edit_tax').value =
                button.dataset.tax ?? 0;



            document.getElementById('edit_currency').value =
                button.dataset.currency ?? 'USD';



            document.getElementById('editForm').action =
                "/products/update/"+button.dataset.id;



        });
</script>
