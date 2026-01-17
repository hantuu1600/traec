@extends('layouts.dashboard-lecturer-layout')

@section('content')
    <div class="w-full max-w-7xl mx-auto space-y-8 p-6">

        <x-lecturer-page-header title="Edit Jadwal Pengajaran" description="Perbarui informasi jadwal pengajaran Anda." />

        <div class="card bg-base-100 shadow-sm border border-base-300">
            <div class="card-body px-6 py-6 space-y-6">

                {{-- IMPORTANT: form action harus ke route update --}}
                <form id="teaching-edit-form" method="POST" action="{{ route('lecturer.teaching.update', $teaching->id) }}">
                    @csrf
                    @method('PUT')
                    <x-teaching-form :teaching="$teaching" />

                </form>

            </div>
        </div>

        <div class="flex items-center justify-end gap-4 pt-2 pb-10">
            <a href="{{ route('lecturer.teaching.index') }}" class="btn btn-outline btn-secondary">
                Batal
            </a>

            <button form="teaching-edit-form" type="submit" class="btn btn-primary text-white font-semibold">
                Simpan Perubahan
            </button>
        </div>

    </div>
@endsection