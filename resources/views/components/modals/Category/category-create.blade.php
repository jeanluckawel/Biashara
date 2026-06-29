<div class="modal fade" id="createCategoryModal" tabindex="-1">

    <div class="modal-dialog">

        <div class="modal-content">


            <div class="modal-header">

                <h5 class="modal-title">
                    <i class="bi bi-tags-fill me-2"></i>
                    Add Category
                </h5>


                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal">
                </button>

            </div>


            <form action="{{ route('categories.store') }}"
                  method="POST">

                @csrf


                <div class="modal-body">


                    <div class="mb-3">

                        <label class="form-label">
                            Name
                        </label>

                        <input type="text"
                               name="name"
                               class="form-control"
                               placeholder="Category name"
                               autocomplete="off"
                               required>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">
                            Description
                        </label>

                        <textarea name="description"
                                  class="form-control"
                                  rows="3"
                                  autocomplete="off"></textarea>

                    </div>


                </div>


                <div class="modal-footer">


                    <button type="button"
                            class="btn btn-secondary"
                            data-bs-dismiss="modal">

                        Close

                    </button>



                    <button type="submit"
                            class="btn btn-primary">

                        <i class="bi bi-save"></i>
                        Save

                    </button>


                </div>


            </form>


        </div>

    </div>

</div>
