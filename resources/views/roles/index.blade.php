@extends('dashboard')

@section('title','Roles')


@section('content')


    <div class="container-fluid p-5">


        <div class="row justify-content-center">


            <div class="col-md-11">


                <div class="card shadow-sm">


                    {{-- HEADER --}}
                    <div class="card-header d-flex align-items-center">


                        <h3 class="card-title mb-0">

                            <i class="bi bi-shield-lock-fill me-2"></i>

                            Roles

                        </h3>



                        <div class="ms-auto">


                            @can('roles.create')

                                <button
                                    class="btn btn-primary btn-sm"

                                    data-bs-toggle="modal"

                                    data-bs-target="#createRoleModal">


                                    <i class="bi bi-plus-circle me-1"></i>

                                    Add Role


                                </button>

                            @endcan


                        </div>



                    </div>





                    {{-- BODY --}}
                    <div class="card-body">


                        <table class="table table-bordered table-hover align-middle">


                            <thead class="table-light">


                            <tr>


                                <th width="50">

                                    #

                                </th>


                                <th>

                                    Role

                                </th>



                                <th>

                                    Permissions

                                </th>



                                <th width="200">

                                    Action

                                </th>



                            </tr>


                            </thead>





                            <tbody>



                            @forelse($roles as $role)


                                <tr>



                                    <td>

                                        {{ $roles->firstItem()+$loop->index }}

                                    </td>





                                    <td>


                                    <span class="badge bg-primary">


                                        <i class="bi bi-shield-check me-1"></i>


                                        {{ $role->name }}


                                    </span>


                                    </td>






                                    <td>


                                        @forelse($role->permissions as $permission)


                                            <span class="badge bg-info mb-1">


                                             {{ __('permissions.'.str_replace('.','_',$permission->name)) }}



                                        </span>



                                        @empty


                                            <span class="text-muted">

                                            No permissions

                                        </span>


                                        @endforelse



                                    </td>







                                    <td>

{{--                                        <i class="bi bi-key-fill"></i>--}}






                                        <button
                                            class="btn btn-success btn-sm permissionBtn"
                                            data-id="{{ $role->id }}"
                                            data-name="{{ $role->name }}"
                                            data-permissions='@json($role->permissions->pluck("id"))'
                                            data-bs-toggle="modal"
                                            data-bs-target="#permissionRoleModal">

                                            <i class="bi bi-key-fill"></i>

                                        </button>












                                                <button

                                                    class="btn btn-warning btn-sm editRoleBtn"

                                                    data-id="{{ $role->id }}"

                                                    data-name="{{ $role->name }}"

                                                    data-bs-toggle="modal"

                                                    data-bs-target="#editRoleModal">

                                                    <i class="bi bi-pencil-square"></i>

                                                </button>



                                            <button

                                                class="btn btn-danger btn-sm deleteRoleBtn"


                                                data-id="{{ $role->id }}"

                                                data-name="{{ $role->name }}"


                                                data-bs-toggle="modal"

                                                data-bs-target="#deleteRoleModal">


                                                <i class="bi bi-trash"></i>


                                            </button>






                                    </td>



                                </tr>




                            @empty


                                <tr>


                                    <td colspan="4"
                                        class="text-center">


                                        No roles found


                                    </td>


                                </tr>


                            @endforelse



                            </tbody>


                        </table>



                    </div>





                    {{-- FOOTER --}}
                    <div class="card-footer">


                        <div class="float-end">


                            {{ $roles->links('pagination::bootstrap-5') }}


                        </div>


                    </div>



                </div>


            </div>


        </div>


    </div>





    {{-- MODALS --}}

    @include('components.modals.Role.create-role')
    @include('components.alerts')

    @include('components.modals.Role.edit-role')

    @include('components.modals.Role.delete-role')

    @include('components.modals.Role.permission-role')




@endsection
