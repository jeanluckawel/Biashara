<div class="modal fade" id="deleteSupplierModal">


    <div class="modal-dialog">


        <div class="modal-content">



            <div class="modal-header bg-danger text-white">


                <h5 class="modal-title">

                    <i class="bi bi-trash me-2"></i>

                    Delete Supplier

                </h5>



                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal">

                </button>


            </div>





            <form
                method="POST"
                id="deleteSupplierForm">


                @csrf

                @method('DELETE')



                <div class="modal-body">


                    <p>

                        Are you sure you want to delete

                        <strong id="deleteSupplierName"></strong>

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

                        <i class="bi bi-trash"></i>

                        Delete

                    </button>



                </div>



            </form>


        </div>


    </div>


</div>


<script>


    document
        .querySelectorAll('[data-bs-target="#deleteSupplierModal"]')
        .forEach(button => {


            button.addEventListener('click', function(){


                let id = this.dataset.id;

                let name = this.dataset.name;



                document
                    .getElementById('deleteSupplierName')
                    .innerText = name;



                document
                    .getElementById('deleteSupplierForm')
                    .action =
                    "/suppliers/delete/" + id;



            });


        });


</script>
