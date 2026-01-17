@extends('layouts.dashboard-lecturer-layout')

@section('content')
    <div class="p-6 space-y-6">

        <div>
            <h1 class="text-2xl font-semibold">Period Submission Status</h1>
            <p class="text-sm opacity-70">Pantau status pengajuan periode aktif.</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            {{-- INFO --}}
            <div class="card bg-base-200">
                <div class="card-body">
                    <h2 class="font-semibold">Active Period</h2>
                    <p class="text-lg">Semester Ganjil 2025/2026</p>

                    <div class="mt-3 space-y-2 text-sm">
                        <div>Status :
                            <span class="badge badge-outline">Draft</span>
                        </div>
                        <div>Deadline : 31 Jan 2026</div>
                        <div>Last update : 16 Jan 2026</div>
                    </div>

                    <div class="mt-4 space-y-2">
                        <a href="{{ route('lecturer.teaching.index') }}" class="btn btn-outline w-full">
                            Lengkapi Aktivitas
                        </a>
                        <a href="{{ route('lecturer.submissions.index') }}" class="btn btn-ghost w-full">
                            Riwayat Pengajuan
                        </a>
                    </div>
                </div>
            </div>

            {{-- PROGRESS --}}
            <div class="card bg-base-200 lg:col-span-2">
                <div class="card-body space-y-4">

                    <div class="flex justify-between items-start">
                        <div>
                            <h2 class="font-semibold">Progress</h2>
                            <p class="text-sm opacity-70">Ikuti tahapan berikut</p>
                        </div>

                        <div class="flex gap-2">
                            <button class="btn btn-outline btn-sm">Save Draft</button>
                            <button class="btn btn-primary btn-sm">Submit</button>
                        </div>
                    </div>

                    <ul class="steps steps-vertical">
                        <li class="step step-primary">
                            Lengkapi seluruh aktivitas
                        </li>
                        <li class="step">
                            Submit periode
                        </li>
                        <li class="step">
                            Verifikasi admin
                        </li>
                    </ul>

                    <div class="alert alert-info">
                        <span>Pastikan semua evidence sudah terupload.</span>
                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection
