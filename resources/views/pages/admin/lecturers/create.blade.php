@extends('layouts.dashboard-admin-layout')

@section('content')
    <div class="max-w-2xl mx-auto">
        <div class="flex items-center gap-4 mb-6">
            <a href="{{ route('admin.lecturers.index') }}" class="btn btn-ghost btn-sm">
                &larr; Kembali
            </a>
            <h1 class="text-2xl font-bold">Tambah Dosen Baru</h1>
        </div>

        <div class="card bg-base-100 shadow-md border border-base-300">
            <form action="{{ route('admin.lecturers.store') }}" method="POST">
                @csrf
                <div class="card-body space-y-4">

                    {{-- Nama --}}
                    <div class="form-control">
                        <label class="label"><span class="label-text font-semibold">Nama Lengkap</span></label>
                        <input type="text" name="name" value="{{ old('name') }}" placeholder="Masukkan nama lengkap"
                            class="input input-bordered w-full" required />
                    </div>

                    {{-- NIDN & Prodi --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="form-control">
                            <label class="label"><span class="label-text font-semibold">NIDN</span></label>
                            <input type="text" name="nidn" value="{{ old('nidn') }}" placeholder="Nomor Induk Dosen"
                                class="input input-bordered w-full" required />
                        </div>
                        <div class="form-control">
                            <label class="label"><span class="label-text font-semibold">Program Studi</span></label>
                            <input type="text" name="prodi" value="{{ old('prodi') }}" placeholder="Contoh: Informatika"
                                class="input input-bordered w-full" required />
                        </div>
                    </div>

                    {{-- Email --}}
                    <div class="form-control">
                        <label class="label"><span class="label-text font-semibold">Email</span></label>
                        <input type="email" name="email" value="{{ old('email') }}" placeholder="email@kampus.ac.id"
                            class="input input-bordered w-full" required />
                    </div>

                    {{-- Password --}}
                    <div class="form-control">
                        <label class="label"><span class="label-text font-semibold">Password</span></label>
                        <input type="password" name="password" placeholder="Minimal 6 karakter"
                            class="input input-bordered w-full" required />
                    </div>

                    <div class="card-actions justify-end mt-6">
                        <button type="submit" class="btn btn-primary text-white w-full md:w-auto">Simpan Data</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection