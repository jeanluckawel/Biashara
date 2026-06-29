<div class="modal fade" id="arrivalDetailsModal" tabindex="-1">

    <div class="modal-dialog modal-md">

        <div class="modal-content">

            {{-- HEADER --}}
            <div class="modal-header">

                <h5 class="modal-title">
                    <i class="bi bi-box-seam me-2"></i>
                    Product Details
                </h5>

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal">
                </button>

            </div>


            {{-- BODY --}}
            <div class="modal-body">


                <div class="table-responsive">

                    <table class="table table-sm table-bordered align-middle">

                        <thead class="table-light">

                        <tr>

                            <th>#</th>

                            <th>Product</th>

                            <th class="text-center">
                                Qty
                            </th>

                            <th class="text-end">
                                Price
                            </th>

                            <th class="text-end">
                                Total
                            </th>

                        </tr>

                        </thead>


                        <tbody id="arrivalDetailsBody">

                        {{-- AJAX DATA HERE --}}

                        </tbody>


                    </table>

                </div>



                <div class="d-flex justify-content-end mt-3">

                    <h5>

                        Total :

                        <span
                            class="text-primary"
                            id="arrival_total">

                        </span>

                    </h5>

                </div>


            </div>



            {{-- FOOTER --}}
            <div class="modal-footer">

                <button
                    class="btn btn-secondary btn-sm"
                    data-bs-dismiss="modal">

                    Close

                </button>


            </div>


        </div>

    </div>

</div>



