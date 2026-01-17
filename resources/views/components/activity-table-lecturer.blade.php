@props([
  'rows' => [],
])

<div class="mx-auto max-w-fit px-4 text-secondary mb-10">
    <div class="bg-base-100 border border-base-300 rounded-2xl shadow-sm overflow-hidden">
    <div class="p-4 flex items-center justify-between gap-3">
        <div>
        <h2 class="text-lg font-bold text-base-content">Activity List</h2>
        <p class="text-sm text-base-content/60">Monitor your academic activity status</p>
        </div>

    </div>

    <div class="overflow-x-auto">
        @if(request('q') || request('filter'))
            <div class="px-4 pb-2 text-sm text-base-content/70">
                Showing results
                @if(request('q'))
                    for "<span class="font-semibold">{{ request('q') }}</span>"
                @endif

                @if(request('filter') && request('filter') !== 'all')
                    in <span class="font-semibold capitalize">{{ request('filter') }}</span>
                @endif
            </div>
        @endif
        <table class="table">
        <thead>
            <tr class="text-base-content/70">
            <th>Category</th>
            <th>Lecturer</th>
            <th>Activity</th>
            <th>Period</th>
            <th>Date</th>
            <th>Status</th>
            <th>Updated</th>
            <th class="text-center">Action</th>
            </tr>
        </thead>

        <tbody>
            @forelse($rows as $row)
            @php
                $category = $row['category'] ?? '-';
                $lecturer = $row['lecturer'] ?? '-';
                $title    = $row['title'] ?? '-';
                $period   = $row['period'] ?? '-';
                $date     = $row['date'] ?? '-';
                $status   = strtoupper($row['status'] ?? 'DRAFT');
                $updated  = $row['updated'] ?? '-';

                $badge = match($status) {
                'DRAFT' => 'badge-ghost',
                'SUBMITTED' => 'badge-info',
                'VERIFIED' => 'badge-success',
                'REJECTED' => 'badge-error',
                default => 'badge-ghost'
                };
            @endphp

            <tr class="hover">
                <td>
                <span class="badge badge-outline">
                    {{ $category }}
                </span>
                </td>

                <td>
                <div class="flex flex-col">
                    <span class="font-semibold">{{ $lecturer }}</span>
                </div>
                </td>

                <td class="font-semibold">
                <div class="max-w-[420px] truncate">{{ $title }}</div>
                </td>

                <td class="text-base-content/80">{{ $period }}</td>

                <td class="text-base-content/70">{{ $date }}</td>

                <td>
                <span class="badge {{ $badge }}">{{ $status }}</span>
                </td>

                <td class="text-base-content/70">{{ $updated }}</td>

                <td class="text-right">
                <div class="flex justify-end gap-2">
                    <a href="#" class="btn btn-md btn-ghost">View</a>
                </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="8" class="text-center py-10 text-base-content/60">
                No activities found.
                </td>
            </tr>
            @endforelse
        </tbody>
        </table>
    </div>

    {{-- pagination --}}
    <div class="p-4 border-t border-base-300">
        @if(method_exists($rows, 'links'))
            {{ $rows->links() }}
        @else
            <div class="text-sm text-base-content/60">
                Showing {{ count($rows) }} items
            </div>
        @endif
    </div>
    </div>
</div>

