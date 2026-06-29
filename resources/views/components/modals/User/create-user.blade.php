<div class="modal fade" id="createUserModal" tabindex="-1">


    <div class="modal-dialog">


        <div class="modal-content">



            <div class="modal-header">


                <h5 class="modal-title">

                    <i class="bi bi-person-plus-fill me-2"></i>

                    Add User

                </h5>



                <button type="button"

                        class="btn-close"

                        data-bs-dismiss="modal">

                </button>


            </div>





            <form action="{{ route('users.store') }}"

                  method="POST">


                @csrf



                <div class="modal-body">



                    {{-- NAME --}}

                    <div class="mb-3">


                        <label class="form-label">

                            Name

                        </label>


                        <input type="text"

                               name="name"

                               class="form-control"

                               placeholder="Full name"

                               autocomplete="off"

                               required>


                    </div>





                    {{-- EMAIL --}}

                    <div class="mb-3">


                        <label class="form-label">

                            Email

                        </label>



                        <input type="email"

                               name="email"

                               class="form-control"

                               placeholder="Email address"

                               autocomplete="off"

                               required>


                    </div>







                    {{-- PHONE --}}

                    <div class="mb-3">


                        <label class="form-label">

                            Phone

                        </label>



                        <input type="text"

                               name="phone"

                               class="form-control"

                               placeholder="Phone number"

                               autocomplete="off">


                    </div>







                    {{-- PASSWORD --}}

                    <div class="mb-3">


                        <label class="form-label">

                            Password

                        </label>



                        <input type="password"

                               name="password"

                               class="form-control"

                               placeholder="Password"

                               required>


                    </div>








                    {{-- ROLE --}}

                    <div class="mb-3">


                        <label class="form-label">

                            Role

                        </label>




                        <select name="role"

                                class="form-select"

                                required>


                            <option value="">

                                Select role

                            </option>


                            @foreach($roles as $role)


                                <option value="{{ $role->name }}">

                                    {{ $role->name }}

                                </option>


                            @endforeach



                        </select>



                    </div>





                </div>







                <div class="modal-footer">



                    <button type="button"

                            class="btn btn-secondary"

                            data-bs-dismiss="modal">


                        Close


                    </button>





                    <button type="submit"

                            class="btn btn-primary">


                        <i class="bi bi-save"></i>


                        Save


                    </button>



                </div>





            </form>




        </div>


    </div>


</div>
