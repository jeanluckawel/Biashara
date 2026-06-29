<tbody>

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

            <button class="btn btn-warning btn-sm">
                <i class="bi bi-pencil"></i>
            </button>


            <button class="btn btn-danger btn-sm">
                <i class="bi bi-trash"></i>
            </button>

        </td>

    </tr>

@empty

    <tr>

        <td colspan="4" class="text-center">
            No category found
        </td>

    </tr>

@endforelse

</tbody>
