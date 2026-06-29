<div class="modal fade" id="createSupplierModal">

    <div class="modal-dialog">

        <div class="modal-content">


            <div class="modal-header">

                <h5 class="modal-title">

                    <i class="bi bi-building me-2"></i>
                    Add Supplier

                </h5>


                <button
                    class="btn-close"
                    data-bs-dismiss="modal">
                </button>


            </div>




            <form action="{{ route('suppliers.store') }}"
                  method="POST"
                  autocomplete="off">

                @csrf


                <div class="modal-body">



                    <div class="mb-3">


                        <label class="form-label">
                            Name
                        </label>


                        <input
                            type="text"
                            name="name"
                            class="form-control @error('name') is-invalid @enderror"
                            value="{{ old('name') }}"
                            autocomplete="off"
                            required>


                        @error('name')

                        <div class="invalid-feedback">

                            {{ $message }}

                        </div>

                        @enderror


                    </div>





                    <div class="mb-3">


                        <label class="form-label">
                            Phone
                        </label>


                        <input
                            type="text"
                            name="phone"
                            class="form-control @error('phone') is-invalid @enderror"
                            value="{{ old('phone') }}"
                            autocomplete="off">


                        @error('phone')

                        <div class="invalid-feedback">

                            {{ $message }}

                        </div>

                        @enderror


                    </div>






                    <div class="mb-3">


                        <label class="form-label">
                            Email
                        </label>


                        <input
                            type="email"
                            name="email"
                            class="form-control @error('email') is-invalid @enderror"
                            value="{{ old('email') }}"
                            autocomplete="off">


                        @error('email')

                        <div class="invalid-feedback">

                            {{ $message }}

                        </div>

                        @enderror


                    </div>






                    <div class="mb-3">


                        <label class="form-label">
                            Address
                        </label>


                        <textarea
                            name="address"
                            class="form-control @error('address') is-invalid @enderror"
                            rows="3"
                            autocomplete="off">{{ old('address') }}</textarea>



                        @error('address')

                        <div class="invalid-feedback">

                            {{ $message }}

                        </div>

                        @enderror



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


                        <i class="bi bi-save"></i>

                        Save


                    </button>



                </div>



            </form>


        </div>

    </div>

</div>
