<div class="modal fade" id="deleteCategoryModal" tabindex="-1">

    <div class="modal-dialog">

        <div class="modal-content">


            <div class="modal-header bg-danger text-white">

                <h5 class="modal-title">

                    <i class="bi bi-exclamation-triangle"></i>
                    Delete Category

                </h5>


                <button
                    type="button"
                    class="btn-close btn-close-white"
                    data-bs-dismiss="modal">
                </button>

            </div>


            <form id="deleteForm" method="POST">


                @csrf
                @method('DELETE')


                <div class="modal-body text-center">


                    <p>
                        Are you sure you want to delete:
                    </p>


                    <strong id="deleteCategoryName"></strong>


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
    const deleteModal = document.getElementById('deleteCategoryModal');


    deleteModal.addEventListener('show.bs.modal', function(event){

        const button = event.relatedTarget;


        const id = button.getAttribute('data-id');

        const name = button.getAttribute('data-name');


        document.getElementById('deleteCategoryName').innerText = name;


        document.getElementById('deleteForm').action =
            "{{ url('categories/delete') }}/" + id;


    });
</script>
