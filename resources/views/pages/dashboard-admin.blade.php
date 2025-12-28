{{-- Dummy Data --}}
@php
    $rows = [
      [
        'category' => 'Teaching',
        'lecturer' => 'Dr. Bayu Pratama Putra S.Kom., M.Kom.',
        'title' => 'Pengajaran Pemrograman Web Lanjut',
        'period' => '2025/2026 - Ganjil',
        'date' => 'Sep 2025 - Dec 2025',
        'status' => 'Submitted',
        'evidence' => 3,
        'updated' => '28 Dec 2025',
      ],
      [
        'category' => 'Research',
        'lecturer' => 'Dr. Fuja Fajrian S.Kom., M.M.',
        'title' => 'Publikasi Jurnal: Cara Bercocok Tanam',
        'period' => '2025/2026 - Ganjil',
        'date' => '2025',
        'status' => 'Draft',
        'evidence' => 1,
        'updated' => '27 Dec 2025',
      ],
      [
        'category' => 'Support',
        'lecturer' => 'Dr. Oji Asmodeus S.Kom., M.T.',
        'title' => 'Panitia Seminar Internal Fakultas',
        'period' => '2025/2026 - Ganjil',
        'date' => '10 Oct 2025',
        'status' => 'Verified',
        'evidence' => 2,
        'updated' => '20 Dec 2025',
      ],
    ];

    $stats = [
      ['label' => 'Total Activities', 'value' => 24, 'icon' => 'total'],
      ['label' => 'Teaching', 'value' => 8, 'icon' => 'teaching'],
      ['label' => 'Research', 'value' => 5, 'icon' => 'research'],
      ['label' => 'Verified', 'value' => 12, 'icon' => 'verified'],
    ];
@endphp

@extends('layouts.dashboard-layout')

@section('content')
    {{-- HERO + SEARCH --}}
    <x-hero-dashboard
        title="Tracker Academic"
        subtitle="Track your daily routines, stay consistent, and turn goals into habits all in one beautiful app."
    >
        <x-search-dashboard
            :filters="['All','Teaching','Research','Community Service','Support','Other']"
            placeholder="Search activity..."
            action="{{ url()->current() }}"
        />
    </x-hero-dashboard>
    {{-- ACTIVITY STATS --}}
    <x-activity-stats :stats="$stats" />
    
    {{-- ACTIVITY TABLE --}}
    <x-activity-table :rows="$rows"/>

@endsection
