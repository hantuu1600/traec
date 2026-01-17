<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class LecturerController extends Controller
{
    private const TABLE = 'users';

    public function index(Request $request)
    {
        $q = trim((string) $request->query('q', ''));

        $query = DB::table(self::TABLE)
            ->where('role', 'dosen') // Lecturer
            ->whereNull('deleted_at')
            ->orderBy('name');

        if ($q !== '') {
            $query->where(function ($w) use ($q) {
                $w->where('name', 'like', "%{$q}%")
                    ->orWhere('nidn', 'like', "%{$q}%")
                    ->orWhere('email', 'like', "%{$q}%")
                    ->orWhere('prodi', 'like', "%{$q}%");
            });
        }

        $lecturers = $query->paginate(10)->withQueryString();

        return view('pages.admin.lecturers.index', [
            'title' => 'Kelola Dosen',
            'lecturers' => $lecturers,
            'q' => $q
        ]);
    }

    public function create()
    {
        return view('pages.admin.lecturers.create', [
            'title' => 'Tambah Dosen'
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'nidn' => 'required|string|max:20|unique:users,nidn',
            'email' => 'required|email|max:255|unique:users,email',
            'prodi' => 'required|string|max:100',
            'password' => 'required|string|min:6',
        ]);

        DB::table(self::TABLE)->insert([
            'name' => $validated['name'],
            'nidn' => $validated['nidn'],
            'email' => $validated['email'],
            'prodi' => $validated['prodi'],
            'password' => Hash::make($validated['password']),
            'role' => 'dosen', // Lecturer
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('admin.lecturers.index')->with('success', 'Dosen berhasil ditambahkan.');
    }

    public function edit(int $id)
    {
        $lecturer = DB::table(self::TABLE)
            ->where('id', $id)
            ->where('role', 'dosen')
            ->whereNull('deleted_at')
            ->first();

        abort_if(!$lecturer, 404);

        return view('pages.admin.lecturers.edit', [
            'title' => 'Edit Dosen',
            'lecturer' => $lecturer
        ]);
    }

    public function update(Request $request, int $id)
    {
        // Ensure user exists and is a lecturer
        $exists = DB::table(self::TABLE)
            ->where('id', $id)
            ->where('role', 'dosen')
            ->whereNull('deleted_at')
            ->exists();

        abort_if(!$exists, 404);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'nidn' => ['required', 'string', 'max:20', Rule::unique('users', 'nidn')->ignore($id)],
            'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')->ignore($id)],
            'prodi' => 'required|string|max:100',
            'password' => 'nullable|string|min:6',
        ]);

        $updateData = [
            'name' => $validated['name'],
            'nidn' => $validated['nidn'],
            'email' => $validated['email'],
            'prodi' => $validated['prodi'],
            'updated_at' => now(),
        ];

        if (!empty($validated['password'])) {
            $updateData['password'] = Hash::make($validated['password']);
        }

        DB::table(self::TABLE)->where('id', $id)->update($updateData);

        return redirect()->route('admin.lecturers.index')->with('success', 'Data dosen berhasil diperbarui.');
    }

    public function destroy(int $id)
    {
        // Soft delete
        $updated = DB::table(self::TABLE)
            ->where('id', $id)
            ->where('role', 'dosen')
            ->update([
                'deleted_at' => now(),
                'updated_at' => now(),
            ]);

        if ($updated) {
            return back()->with('success', 'Dosen berhasil dihapus.');
        }

        return back()->with('error', 'Gagal menghapus dosen. Data tidak ditemukan.');
    }
}
