<div class="modal fade" id="createCustomerModal" tabindex="-1">

    <div class="modal-dialog">

        <div class="modal-content">


            <div class="modal-header">

                <h5 class="modal-title">

                    <i class="bi bi-person-plus-fill me-2"></i>

                    Add Customer

                </h5>


                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal">

                </button>


            </div>




            <form action="{{ route('customers.store') }}" method="POST">

                @csrf


                <div class="modal-body">


                    {{-- NAME --}}
                    <div class="mb-3">

                        <label class="form-label">

                            Name

                        </label>


                        <input
                            type="text"
                            name="name"
                            class="form-control"
                            required
                            autocomplete="off">


                    </div>



                    {{-- PHONE --}}
                    <div class="mb-3">

                        <label class="form-label">

                            Phone

                        </label>


                        <input
                            type="text"
                            name="phone"
                            class="form-control"
                            autocomplete="off">


                    </div>




                    {{-- ADDRESS --}}
                    <div class="mb-3">

                        <label class="form-label">

                            Address

                        </label>


                        <textarea
                            name="address"
                            class="form-control"
                            autocomplete="off"
                            rows="3"></textarea>


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
