@props([
  'rows' => [],
  'filterName' => 'filter',
  'queryName'  => 'q',

  // opsional
  'title' => 'Lecturers',
  'addUrl' => '#',
])

@php
  $q = trim((string) request($queryName, ''));
  $filter = (string) request($filterName, 'all');

  // helper filter
  $contains = function ($haystack, $needle) {
      return $needle === '' || str_contains(mb_strtolower((string)$haystack), mb_strtolower((string)$needle));
  };

  // filter rows
  $filtered = array_values(array_filter($rows, function ($r) use ($q, $filter, $contains) {
      $role = strtoupper($r['role'] ?? 'LECTURER');

      if ($role !== 'LECTURER') return false;

      $name  = $r['name'] ?? '';
      $nidn  = $r['nidn'] ?? '';
      $email = $r['email'] ?? '';
      $prodi = $r['study_program'] ?? '';

      $matchQuery = $contains($name, $q) || $contains($nidn, $q) || $contains($email, $q);
      $matchFilter = ($filter === 'all') || (mb_strtolower($prodi) === mb_strtolower($filter));

      return $matchQuery && $matchFilter;
  }));
@endphp

<div class="mx-auto max-w-fit">
  <div class="rounded-2xl border border-base-300 bg-base-100 shadow-sm">
    {{-- Header --}}
    <div class="flex items-start justify-between gap-4 p-6">
      <div>
        <h2 class="text-lg font-semibold text-secondary">{{ $title }}</h2>
      </div>

      <a href="{{ $addUrl }}"
         class="btn btn-sm rounded-full bg-primary text-white hover:bg-primary/90 border-0">
        + Add Lecturer
      </a>
    </div>

    {{-- Table --}}
    <div class="px-6 pb-6">
      <div class="overflow-x-auto">
        <table class="table">
          <thead>
            <tr class="text-base-content/60">
              <th class="w-36">NIDN</th>
              <th>Name</th>
              <th class="w-44">Study Program</th>
              <th class="w-64">Email</th>
              <th class="w-36">Updated</th>
              <th class="w-40 text-right">Actions</th>
            </tr>
          </thead>

          <tbody>
            @forelse($filtered as $row)
              @php
                $id   = $row['id'] ?? null;
                $nidn = $row['nidn'] ?? '-';
                $name = $row['name'] ?? '-';
                $email = $row['email'] ?? '-';
                $prodi = $row['study_program'] ?? '-';
                $faculty = $row['faculty'] ?? null;

                $updated = $row['updated_at'] ?? ($row['updated'] ?? '-');

                // URL fallbacks
                $viewUrl = $row['view_url'] ?? '#';
                $editUrl = $row['edit_url'] ?? '#';
              @endphp

              <tr class="hover:bg-base-200/40">
                <td class="font-medium">{{ $nidn }}</td>

                <td>
                  <div class="font-semibold text-secondary">{{ $name }}</div>
                  @if($faculty)
                    <div class="text-xs text-base-content/60">{{ $faculty }}</div>
                  @endif
                </td>

                <td class="text-base-content/80">{{ $prodi }}</td>

                <td class="text-base-content/80">{{ $email }}</td>

                <td class="text-base-content/70">
                  {{ is_string($updated) ? $updated : '-' }}
                </td>

                <td class="text-right">
                  <div class="inline-flex items-center gap-2">
                    <a href="{{ $viewUrl }}" class="btn btn-ghost btn-sm rounded-full">View</a>
                    <a href="{{ $editUrl }}" class="btn btn-ghost btn-sm rounded-full">Edit</a>
                  </div>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="7" class="py-10 text-center text-base-content/60">
                  No lecturers found.
                </td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>

      <div class="mt-4 text-sm text-base-content/60">
        Showing {{ count($filtered) }} lecturers
        @if($q !== '' || $filter !== 'all')
          <span class="ml-2">
            (filtered)
          </span>
        @endif
      </div>
    </div>
  </div>
</div>
