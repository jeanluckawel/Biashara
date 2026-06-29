<div class="modal fade" id="editSupplierModal" tabindex="-1">


    <div class="modal-dialog">


        <div class="modal-content">



            {{-- HEADER --}}
            <div class="modal-header">


                <h5 class="modal-title">

                    <i class="bi bi-pencil-square me-2"></i>

                    Edit Supplier

                </h5>



                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal">

                </button>


            </div>





            {{-- FORM --}}
            <form
                method="POST"
                id="editSupplierForm"
                autocomplete="off">

                @csrf

                @method('PUT')



                <div class="modal-body">



                    {{-- NAME --}}
                    <div class="mb-3">


                        <label class="form-label">

                            Supplier Name

                        </label>



                        <input
                            type="text"
                            id="edit_name"
                            name="name"
                            class="form-control"
                            required>


                    </div>





                    {{-- PHONE --}}
                    <div class="mb-3">


                        <label class="form-label">

                            Phone

                        </label>



                        <input
                            type="text"
                            id="edit_phone"
                            name="phone"
                            class="form-control">


                    </div>





                    {{-- EMAIL --}}
                    <div class="mb-3">


                        <label class="form-label">

                            Email

                        </label>



                        <input
                            type="email"
                            id="edit_email"
                            name="email"
                            class="form-control">


                    </div>





                    {{-- ADDRESS --}}
                    <div class="mb-3">


                        <label class="form-label">

                            Address

                        </label>



                        <textarea
                            id="edit_address"
                            name="address"
                            class="form-control"
                            rows="3"></textarea>


                    </div>




                </div>





                {{-- FOOTER --}}
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

                        Update


                    </button>



                </div>



            </form>



        </div>


    </div>


</div>


<script>

    document
        .querySelectorAll('[data-bs-target="#editSupplierModal"]')
        .forEach(button => {


            button.addEventListener('click', function(){


                let id = this.dataset.id;


                document
                    .getElementById('edit_name')
                    .value = this.dataset.name;


                document
                    .getElementById('edit_phone')
                    .value = this.dataset.phone ?? '';



                document
                    .getElementById('edit_email')
                    .value = this.dataset.email ?? '';



                document
                    .getElementById('edit_address')
                    .value = this.dataset.address ?? '';



                document
                    .getElementById('editSupplierForm')
                    .action =
                    "/suppliers/update/" + id;


            });


        });


</script>
