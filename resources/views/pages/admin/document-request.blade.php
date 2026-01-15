@extends('layouts.dashboard-admin-layout', ['title' => 'Documents'])

@section('content')
@php
$rows = [
  [
    'lecturer' => 'Dr. Andi Pratama',
    'prodi' => 'Teknik Informatika',
    'title' => 'Pengajaran Web Lanjut',
    'category' => 'Teaching',
    'period' => '2025/2026 - Ganjil',
    'evidence_count' => 3,
    'status' => 'SUBMITTED',
    'submitted_at' => '02 Jan 2026',
  ],
  [
    'lecturer' => 'Rina Sari, M.Kom',
    'prodi' => 'Sistem Informasi',
    'title' => 'Publikasi Jurnal CNN',
    'category' => 'Research',
    'period' => '2025',
    'evidence_count' => 1,
    'status' => 'VERIFIED',
    'submitted_at' => '28 Dec 2025',
  ],
];
@endphp

<x-request-activity-table :rows="$rows" />
@endsection
