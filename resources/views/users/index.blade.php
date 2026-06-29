@extends('dashboard')

@section('title','Users')

<link rel="stylesheet"
      href="https://cdn.datatables.net/1.13.8/css/jquery.dataTables.min.css">

<link rel="stylesheet"
      href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">

@section('content')

    <div class="container-fluid p-5">

        <div class="row justify-content-center">

            <div class="col-md-11">

                <div class="card shadow-sm">

                    {{-- HEADER --}}
                    <div class="card-header d-flex align-items-center">

                        <h3 class="card-title mb-0">

                            <i class="bi bi-people-fill me-2"></i>

                            Users

                        </h3>

                        <div class="ms-auto d-flex align-items-center gap-2">

                            <input
                                type="text"
                                id="searchUser"
                                class="form-control form-control-sm"
                                style="width:250px"
                                placeholder="Search user...">

                            @can('users.create')
                                <button
                                    class="btn btn-primary btn-sm"
                                    data-bs-toggle="modal"
                                    data-bs-target="#createUserModal">

                                    <i class="bi bi-person-plus-fill me-1"></i>

                                    Add User

                                </button>
                            @endcan

                        </div>

                    </div>

                    {{-- BODY --}}
                    <div class="card-body">

                        <table
                            id="userTable"
                            class="table table-bordered table-hover align-middle">

                            <thead class="table-light">

                            <tr>

                                <th width="50">#</th>

                                <th>Name</th>

                                <th>Email</th>

                                <th>Phone</th>

                                <th>Role</th>

                                <th>Created</th>

                                <th width="150">Action</th>

                            </tr>

                            </thead>


                            <tbody id="userTableBody">


                            @forelse($users as $user)


                                <tr>


                                    <td>
                                        {{ $users->firstItem() + $loop->index }}
                                    </td>



                                    <td>

                                        <div class="d-flex align-items-center">


                                            <div
                                                class="rounded-circle bg-primary text-white d-flex justify-content-center align-items-center me-2"
                                                style="width:40px;height:40px;">

                                                {{ strtoupper(substr($user->name,0,1)) }}

                                            </div>


                                            {{ $user->name }}


                                        </div>

                                    </td>



                                    <td>

                                        {{ $user->email }}

                                    </td>



                                    <td>

                                        {{ $user->phone ?? '-' }}

                                    </td>



                                    <td>

                                        @foreach($user->roles as $role)

                                            <span class="badge bg-info">

                        {{ $role->name }}

                    </span>

                                        @endforeach


                                    </td>




                                    <td>

                                        {{ $user->created_at->format('d/m/Y') }}

                                    </td>



                                    <td>



                                        @can('users.edit')

                                            <button
                                                class="btn btn-warning btn-sm editBtn"

                                                data-id="{{ $user->id }}"
                                                data-name="{{ $user->name }}"
                                                data-email="{{ $user->email }}"
                                                data-phone="{{ $user->phone }}"
                                                data-role="{{ $user->roles->first()->name ?? '' }}"

                                                data-bs-toggle="modal"
                                                data-bs-target="#editUserModal">

                                                <i class="bi bi-pencil-square"></i>

                                            </button>

                                        @endcan



                                            @can('users.delete')


                                                <button
                                                    type="button"
                                                    class="btn btn-danger btn-sm deleteUserBtn"

                                                    data-id="{{ $user->id }}"
                                                    data-name="{{ $user->name }}"

                                                    data-bs-toggle="modal"
                                                    data-bs-target="#deleteUserModal">

                                                    <i class="bi bi-trash"></i>

                                                </button>


                                            @endcan



                                    </td>


                                </tr>


                            @empty


                                <tr>

                                    <td colspan="7" class="text-center">

                                        No users found

                                    </td>

                                </tr>


                            @endforelse


                            </tbody>


                        </table>

                    </div>

                    <div class="card-footer">

                        <div class="float-end">

                            {{ $users->links('pagination::bootstrap-5') }}

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>


    @include('components.modals.User.create-user')


    @include('components.modals.User.edit-user')

    @include('components.modals.User.delete-user')

    @include('components.alerts')


    <script>

        document
            .getElementById('searchUser')
            .addEventListener('keyup',function(){


                let value=this.value.toLowerCase();


                document
                    .querySelectorAll('#userTableBody tr')
                    .forEach(function(row){


                        let text=row.innerText.toLowerCase();


                        row.style.display =
                            text.includes(value)
                                ? ''
                                : 'none';


                    });


            });


        // delete


            document.querySelectorAll('.deleteBtn')
            .forEach(button => {


            button.addEventListener('click', function(){


                let id = this.dataset.id;

                let name = this.dataset.name;



                document.getElementById('deleteUserName').innerText = name;



                document.getElementById('deleteUserForm').action =
                    "/users/delete/" + id;



            });


        });


            // edit



            document.querySelectorAll('.editBtn').forEach(button => {


            button.addEventListener('click',function(){


                let id = this.dataset.id;


                document.getElementById('edit_name').value =
                    this.dataset.name;


                document.getElementById('edit_email').value =
                    this.dataset.email;


                document.getElementById('edit_phone').value =
                    this.dataset.phone ?? '';



                document.getElementById('edit_role').value =
                    this.dataset.role;



                document.getElementById('editUserForm').action =
                    "/users/update/" + id;



            });


        });






    </script>

@endsection

