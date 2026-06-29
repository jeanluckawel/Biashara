<div class="modal fade" id="deleteProductModal" tabindex="-1">


    <div class="modal-dialog">


        <div class="modal-content">



            <div class="modal-header bg-danger text-white">


                <h5 class="modal-title">

                    <i class="bi bi-trash me-2"></i>

                    Delete Product

                </h5>


                <button
                    class="btn-close"
                    data-bs-dismiss="modal">

                </button>


            </div>




            <form id="deleteProductForm"
                  method="POST">


                @csrf

                @method('DELETE')



                <div class="modal-body text-center">


                    <p>

                        Are you sure you want to delete

                    </p>


                    <strong id="deleteProductName"></strong>


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


                        Delete


                    </button>


                </div>


            </form>



        </div>


    </div>


</div>



<script>


    const deleteModal =
        document.getElementById('deleteProductModal');



    deleteModal.addEventListener('show.bs.modal', function(event){


        let button = event.relatedTarget;


        let id =
            button.getAttribute('data-id');


        let name =
            button.getAttribute('data-name');



        document.getElementById('deleteProductName').innerHTML =
            name;



        document.getElementById('deleteProductForm').action =
            "/products/delete/" + id;



    });


</script>
