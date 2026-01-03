@extends('layouts.dashboard-admin-layout', ['title' => 'Lecturers'])

@section('content')
  @php
    // Dummy Data
    $rows = [
      [
        'id' => 1,
        'name' => 'Dr. Andi Pratama, S.Kom., M.T.',
        'nidn' => '0412345678',
        'email' => 'andi@kampus.ac.id',
        'role' => 'LECTURER',
        'study_program' => 'Teknik Informatika',
        'faculty' => 'Fakultas Teknik',
        'updated_at' => '2026-01-02 10:30:00',
        'view_url' => '#',
        'edit_url' => '#',
      ],
      [
        'id' => 2,
        'name' => 'Rina Sari, S.T., M.Kom.',
        'nidn' => '0499999999',
        'email' => 'rina@kampus.ac.id',
        'role' => 'LECTURER',
        'study_program' => 'Sistem Informasi',
        'faculty' => 'Fakultas Teknik',
        'updated_at' => '2025-12-28 09:10:00',
        'view_url' => '#',
        'edit_url' => '#',
      ],
    ];

    $filters = ['All', 'Teknik Informatika', 'Sistem Informasi'];
  @endphp

  {{-- Searchbar kamu --}}
  <x-search-dashboard
      :filters="$filters"
      placeholder="Search by name / NIDN / email"
      action=""
      method="GET"
      filterName="filter"
      queryName="q"
  />

  <div class="mt-6">
    <x-table-lecturers
      :rows="$rows"
      title="Lecturers"
      subtitle="Data from users table (role = LECTURER)"
      addUrl="#"
      filterName="filter"
      queryName="q"
    />
  </div>
@endsection
