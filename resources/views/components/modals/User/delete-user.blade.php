<div class="modal fade" id="deleteUserModal" tabindex="-1">


    <div class="modal-dialog">


        <div class="modal-content">



            <div class="modal-header bg-danger text-white">


                <h5 class="modal-title">


                    <i class="bi bi-exclamation-triangle"></i>

                    Delete User


                </h5>




                <button

                    type="button"

                    class="btn-close btn-close-white"

                    data-bs-dismiss="modal">

                </button>


            </div>





            <form id="deleteUserForm" method="POST">


                @csrf

                @method('DELETE')





                <div class="modal-body text-center">



                    <p>

                        Are you sure you want to delete:

                    </p>



                    <strong id="deleteUserName"></strong>



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
