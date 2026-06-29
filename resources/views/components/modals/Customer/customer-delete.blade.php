<div class="modal fade" id="deleteCustomerModal" tabindex="-1">


    <div class="modal-dialog">


        <div class="modal-content">



            <div class="modal-header bg-danger text-white">


                <h5 class="modal-title">

                    <i class="bi bi-trash me-2"></i>

                    Delete Customer

                </h5>



                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal">

                </button>


            </div>




            <form id="deleteCustomerForm" method="POST">


                @csrf

                @method('DELETE')



                <div class="modal-body">


                    <p>

                        Are you sure you want to delete

                        <strong id="customer_name"></strong>

                        ?

                    </p>



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
                        class="btn btn-danger">


                        Delete


                    </button>



                </div>


            </form>



        </div>


    </div>


</div>




<script>


    document
        .getElementById('deleteCustomerModal')
        .addEventListener('show.bs.modal',function(event){


            let button = event.relatedTarget;



            document.getElementById('customer_name').innerText =
                button.dataset.name;



            document.getElementById('deleteCustomerForm').action =
                "/customers/delete/" + button.dataset.id;



        });


</script>
