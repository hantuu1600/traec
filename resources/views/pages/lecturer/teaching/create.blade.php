@extends('layouts.dashboard-lecturer-layout')

@section('content')
    <div class="w-full max-w-7xl mx-auto space-y-8 p-6">

        <x-lecturer-page-header title="Tambah Jadwal Pengajaran" description="Tambahkan data jadwal pengajaran baru." />

        <div class="card bg-base-100 shadow-sm border border-base-300">
            <div class="card-body px-6 py-6 space-y-6">

                <form id="teaching-create-form" method="POST" action="{{ route('lecturer.teaching.store') }}">
                    @csrf

                    <x-teaching-form :teaching="null" />

                </form>

            </div>
        </div>

        <div class="flex items-center justify-end gap-4 pt-2 pb-10">
            <a href="{{ route('lecturer.teaching.index') }}" class="btn btn-outline btn-secondary">
                Batal
            </a>

            <button form="teaching-create-form" type="submit" class="btn btn-primary text-white font-semibold">
                Simpan
            </button>
        </div>

    </div>
@endsection