@props([
  'rows' => [],
])

<div class="mt-8 mx-auto max-w-fit">
  <div class="rounded-2xl border border-base-300 bg-base-100 shadow-sm">

    {{-- Header --}}
    <div class="flex items-start justify-between p-6">
      <div>
        <h2 class="text-lg font-semibold text-secondary">Activity Requests</h2>
        <p class="text-sm text-base-content/60">
          Review and approve lecturer activity submissions
        </p>
      </div>
    </div>

    {{-- Table --}}
    <div class="px-6 pb-6 overflow-x-auto">
      <table class="table">
        <thead>
          <tr class="text-base-content/60">
            <th>Lecturer</th>
            <th>Prodi</th>
            <th>Activity</th>
            <th>Category</th>
            <th>Period</th>
            <th>Evidence</th>
            <th>Status</th>
            <th class="text-right">Actions</th>
          </tr>
        </thead>

        <tbody>
        @forelse($rows as $row)
          @php
            $status = strtoupper($row['status']);
            $badge = match($status) {
              'SUBMITTED' => 'badge-info',
              'VERIFIED'  => 'badge-success',
              'REJECTED'  => 'badge-error',
              default     => 'badge-ghost'
            };
          @endphp

          <tr class="hover:bg-base-200/40">
            {{-- Lecturer --}}
            <td class="font-semibold text-secondary">
              {{ $row['lecturer'] }}
            </td>

            {{-- Prodi --}}
            <td>
              <span class="badge badge-outline
                           whitespace-normal h-auto py-1.5
                           leading-snug text-center max-w-40">
                {{ $row['prodi'] }}
              </span>
            </td>

            {{-- Activity --}}
            <td>
              <div class="font-medium">{{ $row['title'] }}</div>
              <div class="text-xs text-base-content/60">
                {{ $row['submitted_at'] }}
              </div>
            </td>

            {{-- Category --}}
            <td>
              <span class="badge badge-ghost">{{ $row['category'] }}</span>
            </td>

            {{-- Period --}}
            <td class="text-sm">{{ $row['period'] }}</td>

            {{-- Evidence --}}
            <td>
              <span class="badge badge-neutral">
                {{ $row['evidence_count'] }}
              </span>
            </td>

            {{-- Status --}}
            <td>
              <span class="badge {{ $badge }}">
                {{ $status }}
              </span>
            </td>

            {{-- Actions --}}
            <td class="text-right space-x-2">
              <button class="btn btn-sm btn-ghost">View</button>

              @if($status === 'SUBMITTED')
                <button class="btn btn-sm bg-primary text-white border-0">
                  Approve
                </button>
                <button class="btn btn-sm btn-outline btn-error">
                  Reject
                </button>
              @endif
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="8" class="py-10 text-center text-base-content/60">
              No activity requests found.
            </td>
          </tr>
        @endforelse
        </tbody>
      </table>
    </div>
  </div>
</div>
