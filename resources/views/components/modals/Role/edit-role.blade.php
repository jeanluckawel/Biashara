<div class="modal fade" id="editRoleModal" tabindex="-1">


    <div class="modal-dialog">


        <div class="modal-content">



            <div class="modal-header">


                <h5 class="modal-title">

                    <i class="bi bi-pencil-square me-2"></i>

                    Edit Role

                </h5>



                <button

                    type="button"

                    class="btn-close"

                    data-bs-dismiss="modal">

                </button>


            </div>





            <form

                method="POST"

                id="editRoleForm"

                autocomplete="off">


                @csrf

                @method('PUT')





                <div class="modal-body">





                    <div class="mb-3">


                        <label class="form-label">

                            Role Name

                        </label>




                        <input

                            type="text"

                            id="edit_role_name"

                            name="name"

                            class="form-control"

                            required>



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

                        Update


                    </button>




                </div>





            </form>





        </div>


    </div>


</div>





<script>


    const editRoleModal = document.getElementById('editRoleModal');



    editRoleModal.addEventListener('show.bs.modal', function(event){



        const button = event.relatedTarget;



        document.getElementById('editRoleForm').action =

            '/roles/update/' + button.dataset.id;




        document.getElementById('edit_role_name').value =

            button.dataset.name;



    });



</script>
