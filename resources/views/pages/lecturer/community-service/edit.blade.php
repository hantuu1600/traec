@extends('layouts.dashboard-lecturer-layout')

@section('content')
    <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 py-6 space-y-6">

        <x-lecturer-page-header title="Edit Pengabdian Masyarakat" description="Perbarui data kegiatan pengabdian." />

        <div class="card bg-base-100 border border-base-300">
            <div class="card-body p-4 lg:p-6 space-y-6">
                <x-community-form :activity="$activity" />
            </div>
        </div>

        <div class="flex justify-end gap-3 pt-4">
            <a href="{{ route('lecturer.community-service.index') }}" class="btn btn-outline btn-secondary">
                Batal
            </a>

            <button form="community-form" type="submit" class="btn btn-primary">
                Simpan Perubahan
            </button>
        </div>

    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            let memberIndex = 0;
            const tableBody = document.getElementById('members-table-body');
            const addBtn = document.getElementById('add-member-btn');

            // Data from controller
            const lecturers = @json($lecturers);
            const existingMembers = @json($members ?? []);

            function createLecturerOptions(selectedId = null) {
                let options = '<option value="">-- Pilih Dosen --</option>';
                lecturers.forEach(l => {
                    const selected = l.id == selectedId ? 'selected' : '';
                    options += `<option value="${l.id}" ${selected}>${l.name}</option>`;
                });
                return options;
            }

            function addRow(data = null) {
                const row = document.createElement('tr');
                const i = memberIndex;

                let isInternal = true;
                let userId = '';
                let name = '';
                let role = '';

                if (data) {
                    userId = data.user_id || '';
                    name = data.name || '';
                    role = data.role || '';
                    if (!userId && name) {
                        isInternal = false;
                    }
                }

                row.innerHTML = `
                    <td>
                        <select class="select select-bordered select-sm w-full mb-1 member-type-select">
                            <option value="internal" ${isInternal ? 'selected' : ''}>Dosen (Internal)</option>
                            <option value="external" ${!isInternal ? 'selected' : ''}>Eksternal / Mahasiswa</option>
                        </select>
                    </td>
                    <td>
                        <div class="member-input-container">
                            <select name="members[${i}][user_id]" class="select select-bordered select-sm w-full internal-input ${!isInternal ? 'hidden' : ''}" ${!isInternal ? 'disabled' : ''}>
                                ${createLecturerOptions(userId)}
                            </select>
                            <input type="text" name="members[${i}][name]" 
                                   value="${name}"
                                   class="input input-bordered input-sm w-full external-input ${isInternal ? 'hidden' : ''}" 
                                   placeholder="Nama Lengkap" ${isInternal ? 'disabled' : ''}>
                        </div>
                    </td>
                    <td>
                        <input type="text" name="members[${i}][role]"
                               value="${role}"
                               class="input input-bordered input-sm w-full"
                               placeholder="Peran">
                    </td>
                    <td class="text-center">
                        <button type="button" class="btn btn-xs btn-outline btn-error remove-member-btn">
                            Hapus
                        </button>
                    </td>
                    `;

                tableBody?.appendChild(row);
                memberIndex++;

                const typeSelect = row.querySelector('.member-type-select');
                const internalInput = row.querySelector('.internal-input');
                const externalInput = row.querySelector('.external-input');

                typeSelect.addEventListener('change', (e) => {
                    if (e.target.value === 'internal') {
                        internalInput.classList.remove('hidden');
                        internalInput.disabled = false;
                        externalInput.classList.add('hidden');
                        externalInput.disabled = true;
                    } else {
                        internalInput.classList.add('hidden');
                        internalInput.disabled = true;
                        externalInput.classList.remove('hidden');
                        externalInput.disabled = false;
                    }
                });
            }

            addBtn?.addEventListener('click', () => addRow());

            tableBody?.addEventListener('click', (e) => {
                if (e.target && e.target.classList.contains('remove-member-btn')) {
                    e.target.closest('tr')?.remove();
                }
            });

            if (existingMembers && existingMembers.length > 0) {
                existingMembers.forEach(member => addRow(member));
            }
        });
    </script>
@endpush