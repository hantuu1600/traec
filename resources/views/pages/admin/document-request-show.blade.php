@extends('layouts.dashboard-admin-layout', ['title' => $title ?? 'Verification Detail'])

@section('content')
  <div class="w-full max-w-5xl space-y-6">

    <div class="flex items-start justify-between gap-4">
      <div>
        <h1 class="text-xl font-semibold text-secondary">Verification Detail</h1>
        <p class="text-sm text-base-content/60">Review lecturer document submissions</p>
      </div>

      <a href="{{ route('admin.document-request.index') }}" class="btn btn-ghost btn-sm">
        Back
      </a>
    </div>

    {{-- Detail Card --}}
    <div class="card bg-base-100 border border-base-300">
      <div class="card-body space-y-6">

        {{-- Lecturer Info --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm border-b border-base-200 pb-4">
          <div>
            <div class="font-medium text-secondary">Lecturer Name</div>
            <div class="text-lg font-bold text-base-content/80">{{ $activity->lecturer_name ?? '-' }}</div>
          </div>
          <div>
            <div class="font-medium text-secondary">Study program</div>
            <div class="text-base text-base-content/80">{{ $activity->lecturer_prodi ?? '-' }}</div>
          </div>
          <div class="md:col-span-2">
            <div class="font-medium text-secondary">NIDN</div>
            <div class="text-base text-base-content/60">{{ $activity->lecturer_nidn ?? '-' }}</div>
          </div>
        </div>

        {{-- Activity Specific Info --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-sm">

          @if($category === 'TEACHING')
            <div class="md:col-span-2">
              <div class="font-medium text-secondary">Course Name</div>
              <div class="text-xl font-semibold text-base-content">{{ $activity->course_name }}</div>
            </div>
            <div>
              <div class="font-medium text-secondary">Semester</div>
              <div>{{ $activity->semester }}</div>
            </div>
            <div>
              <div class="font-medium text-secondary">Academic Year</div>
              <div>{{ $activity->year }}</div>
            </div>
            <div>
              <div class="font-medium text-secondary">Credits (SKS)</div>
              <div>{{ $activity->credits }} SKS</div>
            </div>
            <div>
              <div class="font-medium text-secondary">Total Meetings</div>
              <div>{{ $activity->meetings_total }} Meetings</div>
            </div>
          @elseif($category === 'RESEARCH')
            <div class="md:col-span-2">
              <div class="font-medium text-secondary">Research Title</div>
              <div class="text-xl font-semibold text-base-content">{{ $activity->title }}</div>
            </div>
            <div>
              <div class="font-medium text-secondary">Role</div>
              <div>{{ $activity->role }}</div>
            </div>
            <div>
              <div class="font-medium text-secondary">Year</div>
              <div>{{ $activity->year }}</div>
            </div>
            <div>
              <div class="font-medium text-secondary">Publisher</div>
              <div>{{ $activity->publisher ?? '-' }}</div>
            </div>
            <div class="md:col-span-2">
              <div class="font-medium text-secondary">Link / DOI</div>
              @if(!empty($activity->link))
                <a href="{{ $activity->link }}" target="_blank" class="link link-primary">{{ $activity->link }}</a>
              @else
                -
              @endif
              @if(!empty($activity->doi))
                <span class="text-xs text-gray-500 ml-2">(DOI: {{ $activity->doi }})</span>
              @endif
            </div>
          @endif

          <div class="md:col-span-2 pt-2">
            <div class="font-medium text-secondary mb-1">Submission Status</div>
            @if($activity->status == 'VERIFIED')
              <span class="badge badge-success text-white">VERIFIED</span>
            @elseif($activity->status == 'REJECTED')
              <span class="badge badge-error text-white">REJECTED</span>
            @elseif($activity->status == 'SUBMITTED')
              <span class="badge badge-warning text-white">PENDING VERIFICATION</span>
            @else
              <span class="badge badge-ghost">{{ $activity->status }}</span>
            @endif
          </div>

          <div class="md:col-span-2">
            <div class="font-medium text-secondary">Last Updated</div>
            <div class="text-base-content/80">
              {{ \Carbon\Carbon::parse($activity->updated_at)->translatedFormat('d F Y H:i') }}
            </div>
          </div>

        </div>

      </div>
    </div>

    {{-- Evidence Card --}}
    <div class="card bg-base-100 border border-base-300">
      <div class="card-body">
        <div class="flex items-center justify-between">
          <h3 class="font-semibold text-secondary">Supporting Evidence</h3>
          <span class="text-sm text-base-content/60">
            {{ count($evidences) }} file
          </span>
        </div>

        <div class="mt-4 space-y-2">
          @forelse($evidences as $e)
            <div
              class="flex items-center justify-between p-3 rounded-xl border border-base-300 hover:bg-base-200/40 transition">
              <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-lg bg-base-200 flex items-center justify-center text-secondary">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z" />
                    <polyline points="14 2 14 8 20 8" />
                  </svg>
                </div>
                <div>
                  <div class="font-medium">{{ $e->filename ?? 'Supporting Evidence File' }}</div>
                  <div class="text-xs text-base-content/60">{{ $e->description ?? '-' }}</div>
                </div>
              </div>
              <a href="{{ Storage::url($e->file_path) }}" target="_blank" class="btn btn-sm btn-ghost btn-square"
                title="Lihat File">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                  stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6" />
                  <polyline points="15 3 21 3 21 9" />
                  <line x1="10" y1="14" x2="21" y2="3" />
                </svg>
              </a>
            </div>
          @empty
            <p class="text-sm text-base-content/60 italic text-center py-4">No supporting evidence uploaded yet.</p>
          @endforelse
        </div>
      </div>
    </div>

    {{-- Action Buttons --}}
    <div class="flex justify-end gap-3 pb-10">
      @if(in_array($activity->status, ['SUBMITTED', 'PENDING']))
        <form method="POST"
          action="{{ route('admin.document-request.approve', ['category' => strtolower($category), 'id' => $activity->id]) }}"
          onsubmit="return confirm('Are you sure you want to verify this document?');">
          @csrf
          @method('PUT')
          <button class="btn btn-success text-white">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <polyline points="20 6 9 17 4 12" />
            </svg>Document Verification Detail
          </button>
        </form>

        <button class="btn btn-outline btn-error" onclick="rejectModal.showModal()">
          Reject Document
        </button>
      @endif
    </div>

  </div>

  {{-- Reject Modal --}}
  <dialog id="rejectModal" class="modal">
    <div class="modal-box">
      <h3 class="font-bold text-lg text-error">Reject Document</h3>
      <p class="text-sm text-base-content/60 mt-1">Please provide a reason for rejection so the lecturer can correct it.</p>

      <form method="POST"
        action="{{ route('admin.document-request.reject', ['category' => strtolower($category), 'id' => $activity->id]) }}"
        class="mt-4 space-y-3">
        @csrf
        @method('PUT')

        <textarea name="reason" class="textarea textarea-bordered w-full" rows="4" required
          placeholder="Tuliskan alasan penolakan di sini..."></textarea>

        <div class="modal-action">
          <button type="button" class="btn btn-ghost" onclick="rejectModal.close()">Cancel</button>
          <button type="submit" class="btn btn-error text-white">Send Rejection</button>
        </div>
      </form>
    </div>
    <form method="dialog" class="modal-backdrop">
      <button>Close</button>
    </form>
  </dialog>
@endsection