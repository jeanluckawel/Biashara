<div class="modal fade" id="editUserModal" tabindex="-1">

    <div class="modal-dialog">

        <div class="modal-content">


            <div class="modal-header">

                <h5 class="modal-title">

                    <i class="bi bi-person-gear me-2"></i>

                    Edit User

                </h5>


                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal">
                </button>

            </div>



            <form id="editUserForm"
                  method="POST">


                @csrf

                @method('PUT')


                <div class="modal-body">


                    <div class="mb-3">

                        <label class="form-label">
                            Name
                        </label>


                        <input type="text"
                               id="edit_name"
                               name="name"
                               class="form-control"
                               required>

                    </div>




                    <div class="mb-3">

                        <label class="form-label">
                            Email
                        </label>


                        <input type="email"
                               id="edit_email"
                               name="email"
                               class="form-control"
                               required>

                    </div>





                    <div class="mb-3">

                        <label class="form-label">
                            Phone
                        </label>


                        <input type="text"
                               id="edit_phone"
                               name="phone"
                               class="form-control">

                    </div>





                    <div class="mb-3">

                        <label class="form-label">
                            Role
                        </label>


                        <select name="role"
                                id="edit_role"
                                class="form-select">


                            @foreach($roles as $role)

                                <option value="{{ $role->name }}">

                                    {{ $role->name }}

                                </option>

                            @endforeach


                        </select>

                    </div>





                    <div class="mb-3">

                        <label class="form-label">
                            Password
                            <small class="text-muted">
                                (optional)
                            </small>
                        </label>


                        <input type="password"
                               name="password"
                               class="form-control"
                               placeholder="Leave empty to keep old password">


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

                        Update

                    </button>


                </div>



            </form>


        </div>

    </div>

</div>
