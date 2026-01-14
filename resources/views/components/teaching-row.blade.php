@props([
    'id',
    'courseCode',
    'courseName',
    'class',
    'day',
    'time',
    'room',
])

<tr>
    <td>{{ $id }}</td>
    <td>{{ $courseCode }}</td>
    <td>{{ $courseName }}</td>
    <td>{{ $class }}</td>
    <td>{{ $day }}</td>
    <td>{{ $time }}</td>
    <td>{{ $room }}</td>

    <td class="text-center space-x-2">
        <button class="btn btn-xs btn-outline btn-info">
            View
        </button>

        <a href="{{ route('lecturer.teaching.edit', $id) }}"
           class="btn btn-xs btn-outline btn-warning">
            Edit
        </a>

        <button class="btn btn-xs btn-outline btn-error">
            Delete
        </button>
    </td>
</tr>
