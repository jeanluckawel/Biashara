<div class="modal fade" id="createRoleModal" tabindex="-1">


    <div class="modal-dialog">


        <div class="modal-content">



            <div class="modal-header">


                <h5 class="modal-title">


                    <i class="bi bi-shield-plus me-2"></i>

                    Add Role


                </h5>



                <button

                    type="button"

                    class="btn-close"

                    data-bs-dismiss="modal">

                </button>


            </div>





            <form action="{{ route('roles.store') }}"
                  method="POST">


                @csrf





                <div class="modal-body">





                    <div class="mb-3">


                        <label class="form-label">

                            Role Name

                        </label>



                        <input

                            type="text"

                            name="name"

                            class="form-control"

                            placeholder="Enter role name"

                            autocomplete="off"

                            required>


                    </div>




                </div>







                <div class="modal-footer">


                    <button

                        type="button"

                        class="btn btn-secondary"

                        data-bs-dismiss="modal">


                        Cancel


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
