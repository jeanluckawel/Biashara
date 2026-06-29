<div class="modal fade" id="deleteArrivalModal" tabindex="-1">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header bg-danger text-white">

                <h5 class="modal-title">

                    <i class="bi bi-trash me-2"></i>

                    Delete Arrival

                </h5>

                <button
                    type="button"
                    class="btn-close btn-close-white"
                    data-bs-dismiss="modal">
                </button>

            </div>

            <form
                method="POST"
                id="deleteArrivalForm">

                @csrf
                @method('DELETE')

                <div class="modal-body">

                    <p class="mb-0">

                        Are you sure you want to delete

                        <strong id="arrivalReference"></strong> ?

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

                        <i class="bi bi-trash me-1"></i>

                        Delete

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

<script>

    const deleteModal=document.getElementById('deleteArrivalModal');

    deleteModal.addEventListener('show.bs.modal',function(event){

        const button=event.relatedTarget;

        document.getElementById('deleteArrivalForm').action=
            '/arrivals/delete/'+button.dataset.id;

        document.getElementById('arrivalReference').innerText=
            button.dataset.reference;

    });

</script>

