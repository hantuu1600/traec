@props([
    'number',
    'id',
    'courseName',
    'studyProgram',
    'semester',
    'credits',
    'meetingsTotal',
    'startDate',
    'endDate',
    'year',
    'status',
])


<tr>
    <td class="text-center">{{ $number }}</td>
    <td class="text-center">{{ $courseName }}</td>
    <td class="text-center">{{ $studyProgram }}</td>
    <td class="text-center whitespace-nowrap">{{ $semester }}</td>
    <td class="text-center whitespace-nowrap">{{ $credits }}</td>
    <td class="text-center whitespace-nowrap">{{ $meetingsTotal }}</td>
    <td class="text-center">{{ \Carbon\Carbon::parse($startDate)->format('d M Y') }}</td>
    <td class="text-center">{{ \Carbon\Carbon::parse($endDate)->format('d M Y') }}</td>
    <td class="text-center">{{ $year }}</td>
    <td class="text-center font-bold" >{{ $status }}</td>

    <td class="text-center space-x-2">
        <a href="{{ route('lecturer.teaching.edit', $id) }}"
           class="btn btn-xs btn-outline btn-warning">
            Edit
        </a>
    </td>
</tr>
