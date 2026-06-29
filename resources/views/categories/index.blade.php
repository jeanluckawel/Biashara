@extends('dashboard')

@section('title', 'Categories')

@section('content')
    <div class="container-fluid p-5">

        <div class="row justify-content-center">

            <div class="col-md-10">

                <div class="card mb-4 shadow-sm">

                    <div class="card-header d-flex align-items-center">

                        <h3 class="card-title mb-0">
                            <i class="bi bi-tags-fill me-2"></i>
                            Categories
                        </h3>


                        <div class="card-tools ms-auto d-flex align-items-center gap-2">

                            <div class="input-group input-group-sm" style="width: 220px;">

                                <input
                                    type="text"
                                    id="searchCategory"
                                    class="form-control"
                                    placeholder="Search..."
                                >

                                <span class="input-group-text">
                <i class="bi bi-search"></i>
            </span>

                            </div>


                            <button
                                type="button"
                                class="btn btn-primary btn-sm"
                                data-bs-toggle="modal"
                                data-bs-target="#createCategoryModal">

                                <i class="bi bi-plus-circle me-1"></i>
                                Add

                            </button>

                        </div>

                    </div>


                    <div class="card-body">

                        <table class="table table-bordered table-hover">

                            <thead class="table-light">

                            <tr>

                                <th style="width: 10px">#</th>

                                <th>Name</th>

                                <th>Description</th>

                                <th style="width: 120px">
                                    Action
                                </th>

                            </tr>

                            </thead>


                            <tbody id="categoryTable">

                            @forelse($categories as $category)

                                <tr class="align-middle">

                                    <td>
                                        {{ $loop->iteration }}
                                    </td>


                                    <td>
                                        {{ $category->name }}
                                    </td>


                                    <td>
                                        {{ $category->description ?? '-' }}
                                    </td>


                                    <td>

                                        <button
                                            type="button"
                                            class="btn btn-warning btn-sm"
                                            data-bs-toggle="modal"
                                            data-bs-target="#editCategoryModal"
                                            data-id="{{ $category->id }}"
                                            data-name="{{ $category->name }}"
                                            data-description="{{ $category->description }}"
                                        >

                                            <i class="bi bi-pencil"></i>

                                        </button>


{{--                                        <form action="{{ route('categories.delete',$category->id) }}"--}}
{{--                                              method="POST"--}}
{{--                                              class="d-inline">--}}

{{--                                            @csrf--}}
{{--                                            @method('DELETE')--}}


{{--                                            <button type="submit"--}}
{{--                                                    class="btn btn-danger btn-sm"--}}
{{--                                                    onclick="return confirm('Delete this category?')">--}}

{{--                                                <i class="bi bi-trash"></i>--}}

{{--                                            </button>--}}


{{--                                        </form>--}}

                                        <button
                                            type="button"
                                            class="btn btn-danger btn-sm"
                                            data-bs-toggle="modal"
                                            data-bs-target="#deleteCategoryModal"
                                            data-id="{{ $category->id }}"
                                            data-name="{{ $category->name }}"
                                        >

                                            <i class="bi bi-trash"></i>

                                        </button>


                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="4" class="text-center">

                                        No categories found

                                    </td>

                                </tr>

                            @endforelse


                            </tbody>


                        </table>

                    </div>


                    <div class="card-footer clearfix">

                        <div class="float-end">

                            {{ $categories->links('pagination::bootstrap-5') }}

                        </div>

                    </div>


                </div>


            </div>


        </div>


    </div>

    @include('components.modals.Category.category-create')
    @include('components.modals.Category.category-edit')
    @include('components.modals.Category.category-delete')
    @include('components.alerts')
    <script>
        document
            .getElementById('searchCategory')
            .addEventListener('keyup', function(){

                let value = this.value.toLowerCase();


                let rows = document.querySelectorAll('#categoryTable tr');


                rows.forEach(function(row){

                    let text = row.innerText.toLowerCase();


                    if(text.includes(value)){

                        row.style.display = '';

                    }else{

                        row.style.display = 'none';

                    }

                });


            });
    </script>
@endsection
