<div class="modal fade" id="editArrivalModal" tabindex="-1">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title">

                    <i class="bi bi-pencil-square me-2"></i>

                    Edit Arrival

                </h5>

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal">
                </button>

            </div>

            <form
                method="POST"
                id="editArrivalForm"
                autocomplete="off">

                @csrf
                @method('PUT')

                <div class="modal-body">

                    <div class="mb-3">

                        <label class="form-label">

                            Supplier

                        </label>

                        <select
                            name="supplier_id"
                            id="edit_supplier"
                            class="form-control"
                            required>

                            @foreach($suppliers as $supplier)

                                <option value="{{ $supplier->id }}">

                                    {{ $supplier->name }}

                                </option>

                            @endforeach

                        </select>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">

                            Arrival Date

                        </label>

                        <input
                            type="date"
                            id="edit_date"
                            name="arrival_date"
                            class="form-control"
                            required>

                    </div>

{{--                    <div class="mb-3">--}}

{{--                        <label class="form-label">--}}

{{--                            Status--}}

{{--                        </label>--}}

{{--                        <select--}}
{{--                            name="status"--}}
{{--                            id="edit_status"--}}
{{--                            class="form-control">--}}

{{--                            <option value="Pending">--}}
{{--                                Pending--}}
{{--                            </option>--}}

{{--                            <option value="Received">--}}
{{--                                Received--}}
{{--                            </option>--}}

{{--                        </select>--}}

{{--                    </div>--}}

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

    const editModal=document.getElementById('editArrivalModal');

    editModal.addEventListener('show.bs.modal',function(event){

        const button=event.relatedTarget;

        document.getElementById('editArrivalForm').action=
            '/arrivals/update/'+button.dataset.id;

        document.getElementById('edit_supplier').value=
            button.dataset.supplier;

        document.getElementById('edit_date').value=
            button.dataset.date;

        document.getElementById('edit_status').value=
            button.dataset.status;

    });

</script>

