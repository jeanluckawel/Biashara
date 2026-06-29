{{--<style>--}}

{{--    .permission-box{--}}

{{--        padding:8px;--}}

{{--        border:1px solid #dee2e6;--}}

{{--        border-radius:6px;--}}

{{--        background:#f8f9fa;--}}

{{--    }--}}


{{--    .permission-box:hover{--}}

{{--        background:#e9f5ff;--}}

{{--    }--}}


{{--</style>--}}





{{--<div class="modal fade" id="permissionRoleModal" tabindex="-1">--}}


{{--    <div class="modal-dialog modal-xl">--}}


{{--        <div class="modal-content">--}}





{{--            --}}{{-- HEADER --}}

{{--            <div class="modal-header">--}}


{{--                <h5 class="modal-title">--}}


{{--                    <i class="bi bi-shield-lock me-2"></i>--}}

{{--                    Role Permissions--}}


{{--                </h5>--}}




{{--                <button--}}

{{--                    type="button"--}}

{{--                    class="btn-close"--}}

{{--                    data-bs-dismiss="modal">--}}

{{--                </button>--}}


{{--            </div>--}}







{{--            <form--}}

{{--                method="POST"--}}

{{--                id="permissionRoleForm">--}}


{{--                @csrf--}}

{{--                @method('PUT')--}}







{{--                <div class="modal-body">--}}



{{--                    --}}{{-- ROLE NAME --}}


{{--                    <div class="mb-3" hidden="hidden">--}}


{{--                        <label class="form-label fw-bold">--}}


{{--                            Role--}}


{{--                        </label>--}}



{{--                        <input--}}

{{--                            type="text"--}}

{{--                            id="permission_role_name"--}}

{{--                            class="form-control"--}}

{{--                            readonly>--}}


{{--                    </div>--}}



{{--                    <div class="row g-2">--}}





{{--                        @foreach($permissions as $permission)--}}



{{--                            <div class="col-md-3">--}}



{{--                                <div class="permission-box">--}}



{{--                                    <div class="form-check">--}}



{{--                                        <input--}}

{{--                                            class="form-check-input permissionCheck"--}}

{{--                                            type="checkbox"--}}

{{--                                            name="permissions[]"--}}

{{--                                            value="{{ $permission->id }}"--}}

{{--                                            id="permission_{{ $permission->id }}">--}}





{{--                                        <label--}}

{{--                                            class="form-check-label"--}}

{{--                                            for="permission_{{ $permission->id }}">--}}


{{--                                            {{ $permission->name }}--}}


{{--                                        </label>--}}



{{--                                    </div>--}}



{{--                                </div>--}}



{{--                            </div>--}}



{{--                        @endforeach--}}





{{--                    </div>--}}





{{--                </div>--}}







{{--                --}}{{-- FOOTER --}}

{{--                <div class="modal-footer">--}}



{{--                    <button--}}

{{--                        type="button"--}}

{{--                        class="btn btn-secondary"--}}

{{--                        data-bs-dismiss="modal">--}}


{{--                        Close--}}


{{--                    </button>--}}






{{--                    <button--}}

{{--                        type="submit"--}}

{{--                        class="btn btn-primary">--}}


{{--                        <i class="bi bi-save me-1"></i>--}}


{{--                        Save--}}


{{--                    </button>--}}




{{--                </div>--}}





{{--            </form>--}}






{{--        </div>--}}


{{--    </div>--}}


{{--</div>--}}







{{--<script>--}}


{{--    const permissionRoleModal = document.getElementById('permissionRoleModal');--}}



{{--    permissionRoleModal.addEventListener('show.bs.modal', function(event){--}}



{{--        let button = event.relatedTarget;--}}



{{--        let id = button.dataset.id;--}}

{{--        let name = button.dataset.name;--}}

{{--        let permissions = JSON.parse(button.dataset.permissions);--}}





{{--        document.getElementById('permission_role_name').value = name;--}}





{{--        document.getElementById('permissionRoleForm').action =--}}

{{--            '/roles/' + id + '/permissions';--}}







{{--        document.querySelectorAll('.permissionCheck')--}}

{{--            .forEach(function(check){--}}



{{--                check.checked = permissions.includes(--}}

{{--                    parseInt(check.value)--}}

{{--                );--}}



{{--            });--}}



{{--    });--}}



{{--</script>--}}


@php /** permission-role.blade.php */ @endphp
<style>
    .permission-box{padding:8px;border:1px solid #dee2e6;border-radius:6px;background:#f8f9fa}
    .permission-box:hover{background:#e9f5ff}
</style>

<div class="modal fade" id="permissionRoleModal" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title"><i class="bi bi-shield-lock me-2"></i>{{ __('messages.permissions') }}</h5>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form method="POST" id="permissionRoleForm">
                @csrf
                @method('PUT')

                <div class="modal-body">

                    <input type="hidden" id="permission_role_name">

                    <div class="row g-2">
                        @foreach($permissions as $permission)
                            <div class="col-md-3">
                                <div class="permission-box">
                                    <div class="form-check">
                                        <input class="form-check-input permissionCheck"
                                               type="checkbox"
                                               name="permissions[]"
                                               value="{{ $permission->id }}"
                                               id="permission_{{ $permission->id }}">

                                        <label class="form-check-label w-100"
                                               for="permission_{{ $permission->id }}">
<span class="badge bg-info mb-1">
{{ __('permissions.'.str_replace(' ','_',str_replace('.','_',$permission->name))) }}
</span>
                                        </label>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal" type="button">{{ __('messages.close') }}</button>
                    <button class="btn btn-primary" type="submit">
                        <i class="bi bi-save me-1"></i>{{ __('messages.save') }}
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>

<script>
    document.getElementById('permissionRoleModal').addEventListener('show.bs.modal',function(e){

        const button=e.relatedTarget;

        const id=button.dataset.id;
        const name=button.dataset.name;
        const permissions=JSON.parse(button.dataset.permissions||'[]');

        document.getElementById('permission_role_name').value=name;
        document.getElementById('permissionRoleForm').action='/roles/'+id+'/permissions';

        document.querySelectorAll('.permissionCheck').forEach(function(check){
            check.checked=permissions.map(Number).includes(Number(check.value));
        });

    });
</script>

