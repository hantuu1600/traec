@extends('layouts.dashboard-lecturer-layout')

@section('content')
    <div class="w-full max-w-lg mx-auto py-6">
        <div class="card bg-base-100 border border-base-300">
            <div class="card-body">
                <h2 class="card-title mb-4">Ajukan Perbaikan Data</h2>
                <p class="text-sm text-base-content/60 mb-4">
                    Kegiatan: <strong>{{ $teaching->course_name }}</strong><br>
                    Jelaskan alasan mengapa Anda perlu mengubah data yang sudah diverifikasi ini.
                </p>

                <form action="{{ route('lecturer.teaching.request.store', $teaching->id) }}" method="POST">
                    @csrf
                    <div class="form-control mb-4">
                        <label class="label"><span class="label-text">Alasan Perbaikan</span></label>
                        <textarea name="reason" class="textarea textarea-bordered h-24" required
                            placeholder="Contoh: Salah input SKS..."></textarea>
                    </div>

                    <div class="flex justify-end gap-2">
                        <a href="{{ route('lecturer.teaching.show', $teaching->id) }}" class="btn">Batal</a>
                        <button class="btn btn-primary">Kirim Permintaan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection