<div class="modal fade" id="editCategoryModal" tabindex="-1">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title">
                    Edit Category
                </h5>

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal">
                </button>

            </div>

            <form id="editForm" method="POST">

                @csrf
                @method('PUT')

                <div class="modal-body">

                    <div class="mb-3">

                        <label>Name</label>

                        <input
                            id="edit_name"
                            type="text"
                            name="name"
                            class="form-control"
                            required>

                    </div>

                    <div class="mb-3">

                        <label>Description</label>

                        <textarea
                            id="edit_description"
                            name="description"
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

    const editModal = document.getElementById('editCategoryModal');

    editModal.addEventListener('show.bs.modal', function (event) {

        const button = event.relatedTarget;

        document.getElementById('edit_name').value = button.getAttribute('data-name');
        document.getElementById('edit_description').value = button.getAttribute('data-description');

        document.getElementById('editForm').action =
            "{{ route('categories.update', ':id') }}"
                .replace(':id', button.getAttribute('data-id'));

    });

</script>
