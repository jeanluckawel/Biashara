<div class="modal fade" id="editCustomerModal" tabindex="-1">


    <div class="modal-dialog">


        <div class="modal-content">



            <div class="modal-header">


                <h5 class="modal-title">

                    <i class="bi bi-pencil-square me-2"></i>

                    Edit Customer

                </h5>



                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal">

                </button>


            </div>




            <form id="editCustomerForm" method="POST">


                @csrf

                @method('PUT')



                <div class="modal-body">



                    <div class="mb-3">


                        <label>

                            Name

                        </label>



                        <input
                            type="text"
                            id="edit_name"
                            name="name"
                            class="form-control"
                            required>


                    </div>




                    <div class="mb-3">


                        <label>

                            Phone

                        </label>



                        <input
                            type="text"
                            id="edit_phone"
                            name="phone"
                            class="form-control">


                    </div>




                    <div class="mb-3">


                        <label>

                            Address

                        </label>



                        <textarea
                            id="edit_address"
                            name="address"
                            class="form-control"
                            rows="3"></textarea>


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


                        Update


                    </button>


                </div>



            </form>



        </div>


    </div>


</div>





<script>


    document
        .getElementById('editCustomerModal')
        .addEventListener('show.bs.modal',function(event){


            let button = event.relatedTarget;


            document.getElementById('edit_name').value =
                button.dataset.name;


            document.getElementById('edit_phone').value =
                button.dataset.phone ?? '';



            document.getElementById('edit_address').value =
                button.dataset.address ?? '';



            document.getElementById('editCustomerForm').action =
                "/customers/update/" + button.dataset.id;



        });



</script>
