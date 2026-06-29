<div class="modal fade" id="deleteRoleModal" tabindex="-1">


    <div class="modal-dialog">


        <div class="modal-content">



            <div class="modal-header bg-danger text-white">


                <h5 class="modal-title">


                    <i class="bi bi-exclamation-triangle"></i>

                    Delete Role


                </h5>




                <button

                    type="button"

                    class="btn-close btn-close-white"

                    data-bs-dismiss="modal">

                </button>


            </div>







            <form id="deleteRoleForm"
                  method="POST">


                @csrf

                @method('DELETE')






                <div class="modal-body text-center">



                    <p>

                        Are you sure you want to delete:

                    </p>




                    <strong id="deleteRoleName"></strong>



                </div>







                <div class="modal-footer justify-content-center">





                    <button

                        type="button"

                        class="btn btn-secondary"

                        data-bs-dismiss="modal">


                        Cancel


                    </button>







                    <button

                        type="submit"

                        class="btn btn-danger">


                        <i class="bi bi-trash"></i>

                        Delete


                    </button>



                </div>





            </form>





        </div>


    </div>


</div>


<script>

    document.querySelectorAll('.deleteRoleBtn')
        .forEach(button => {


            button.addEventListener('click',function(){



                let id = this.dataset.id;


                let name = this.dataset.name;




                document.getElementById('deleteRoleName').innerText = name;



                document.getElementById('deleteRoleForm').action =

                    "/roles/delete/" + id;



            });


        });


</script>
