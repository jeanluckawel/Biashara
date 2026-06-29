@if(session('success') || session('error'))

    <div class="toast-container position-fixed bottom-0 end-0 p-3">

        <div
            id="liveToast"
            class="toast text-bg-{{ session('success') ? 'success' : 'danger' }} border-0"
            role="alert"
            aria-live="assertive"
            aria-atomic="true"
            data-bs-delay="5000"
        >

            <div class="d-flex">

                <div class="toast-body">

                    @if(session('success'))
                        <i class="bi bi-check-circle-fill me-2"></i>
                        {{ session('success') }}
                    @endif

                    @if(session('error'))
                        <i class="bi bi-x-circle-fill me-2"></i>
                        {{ session('error') }}
                    @endif

                </div>

                <button
                    type="button"
                    class="btn-close btn-close-white me-2 m-auto"
                    data-bs-dismiss="toast">
                </button>

            </div>

        </div>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {

            const toastElement = document.getElementById('liveToast');

            if (toastElement) {
                const toast = new bootstrap.Toast(toastElement);
                toast.show();
            }

        });
    </script>

@endif
