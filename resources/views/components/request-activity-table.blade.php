@props([
    'rows' => [],
])

@php
    $get = function ($row, string $key, $default = null) {
        return is_array($row) ? $row[$key] ?? $default : data_get($row, $key, $default);
    };

    $badgeClass = function (?string $status) {
        return match (strtoupper((string) $status)) {
            'SUBMITTED' => 'badge-info',
            'VERIFIED' => 'badge-success',
            'REJECTED' => 'badge-error',
            'RETURNED' => 'badge-warning',
            default => 'badge-ghost',
        };
    };
@endphp

<div class="w-full">
    <div class="rounded-2xl border border-base-300 bg-base-100 shadow-sm">
        <div class="flex flex-col gap-1 p-6">
            <h2 class="text-lg font-semibold text-secondary">Activity Requests</h2>
            <p class="text-sm text-base-content/60">Review and approve lecturer activity submissions</p>
        </div>

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
                            $id = (int) $get($row, 'id', 0);
                            $category = strtoupper((string) $get($row, 'category', ''));
                            $lecturer = (string) $get($row, 'lecturer', '-');
                            $prodi = (string) $get($row, 'prodi', '-');
                            $title = (string) $get($row, 'title', '-');
                            $period = (string) $get($row, 'period', '-');
                            $evidence = (int) $get($row, 'evidence_count', 0);
                            $submittedAt = (string) $get($row, 'submitted_at', '-');
                            $status = strtoupper((string) $get($row, 'status', ''));
                            $badge = $badgeClass($status);

                            $canAction = $status === 'SUBMITTED';

                            $viewRoute =
                                $id && $category
                                    ? route('admin.document-request.show', ['category' => $category, 'id' => $id])
                                    : '#';
                            $approveRoute =
                                $id && $category
                                    ? route('admin.document-request.approve', ['category' => $category, 'id' => $id])
                                    : '#';
                            $rejectRoute =
                                $id && $category
                                    ? route('admin.document-request.reject', ['category' => $category, 'id' => $id])
                                    : '#';
                        @endphp

                        <tr class="hover:bg-base-200/40">
                            <td class="font-semibold text-secondary">
                                {{ $lecturer }}
                            </td>

                            <td>
                                <span
                                    class="badge badge-outline whitespace-normal h-auto py-1.5 leading-snug text-center max-w-48">
                                    {{ $prodi }}
                                </span>
                            </td>

                            <td>
                                <div class="font-medium line-clamp-1">{{ $title }}</div>
                                <div class="text-xs text-base-content/60">{{ $submittedAt }}</div>
                            </td>

                            <td>
                                <span class="badge badge-ghost">{{ $category ?: '—' }}</span>
                            </td>

                            <td class="text-sm whitespace-nowrap">{{ $period }}</td>

                            <td>
                                <span class="badge badge-neutral">{{ $evidence }}</span>
                            </td>

                            <td>
                                <span class="badge {{ $badge }}">{{ $status ?: '—' }}</span>
                            </td>

                            <td class="text-right">
                                <div class="inline-flex items-center gap-2">
                                    <a href="{{ $viewRoute }}" class="btn btn-sm btn-ghost">
                                        View
                                    </a>

                                    @if ($canAction)
                                        <button class="btn btn-sm bg-primary text-white border-0"
                                            onclick="document.getElementById('approve-{{ $category }}-{{ $id }}').showModal()">
                                            Approve
                                        </button>

                                        <button class="btn btn-sm btn-outline btn-error"
                                            onclick="document.getElementById('reject-{{ $category }}-{{ $id }}').showModal()">
                                            Reject
                                        </button>

                                        <dialog id="approve-{{ $category }}-{{ $id }}" class="modal">
                                            <div class="modal-box">
                                                <h3 class="font-bold text-lg">Approve request?</h3>
                                                <p class="text-sm text-base-content/70 mt-1">
                                                    This will mark the submission as <span
                                                        class="font-semibold">VERIFIED</span>.
                                                </p>

                                                <div class="modal-action">
                                                    <form method="dialog">
                                                        <button class="btn">Cancel</button>
                                                    </form>

                                                    <form method="POST" action="{{ $approveRoute }}">
                                                        @csrf
                                                        @method('PUT')
                                                        <button
                                                            class="btn bg-primary text-white border-0">Approve</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </dialog>

                                        <dialog id="reject-{{ $category }}-{{ $id }}" class="modal">
                                            <div class="modal-box">
                                                <h3 class="font-bold text-lg">Reject request?</h3>
                                                <p class="text-sm text-base-content/70 mt-1">
                                                    Add a short reason so the lecturer can fix it.
                                                </p>

                                                <form method="POST" action="{{ $rejectRoute }}"
                                                    class="mt-4 space-y-3">
                                                    @csrf
                                                    @method('PUT')

                                                    <textarea name="reason" class="textarea textarea-bordered w-full" rows="3" placeholder="Reason (required)"
                                                        required></textarea>

                                                    <div class="modal-action">
                                                        <form method="dialog">
                                                            <button class="btn" type="submit">Cancel</button>
                                                        </form>

                                                        <button type="submit" class="btn btn-outline btn-error">
                                                            Reject
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </dialog>
                                    @endif
                                </div>
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
