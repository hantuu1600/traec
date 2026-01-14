@props([
    'number',
    'id',
    'title',
    'typeId',
    'rankId',
    'role',
    'publisher',
    'year',
    'doi',
    'link',
    'status',
])

<tr>
    <td class="text-center">{{ $number }}</td>
    <td class="text-center">{{ $title }}</td>
    <td class="text-center">{{ $typeId }}</td>
    <td class="text-center whitespace-nowrap">{{ $rankId }}</td>
    <td class="text-center whitespace-nowrap">{{ $role }}</td>
    <td class="text-center whitespace-nowrap">{{ $publisher }}</td>
    <td class="text-center whitespace-nowrap">{{ $year }}</td>
    <td class="text-center whitespace-nowrap">{{ $doi }}</td>
    <td class="text-center whitespace-nowrap">{{ $link }}</td>
    <td class="text-center font-bold">{{ $status }}</td>

    <td class="text-center space-x-2">
        <a href="{{ route('lecturer.research.edit', $id) }}"
           class="btn btn-xs btn-outline btn-warning">
            Edit
        </a>
        <label
            for="research-member-modal-{{ $id }}"
            class="btn btn-xs btn-outline btn-success cursor-pointer"
        >
            View
        </label>
    </td>
</tr>
