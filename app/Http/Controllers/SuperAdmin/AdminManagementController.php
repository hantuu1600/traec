<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminManagementController extends Controller
{
    public function index()
    {
        //get all users with role admin
        $admins = User::where('role', 'admin')->orderBy('created_at', 'desc')->paginate(10);

        return view('pages.superadmin.admins.index', [
            'title' => 'Kelola Admin',
            'admins' => $admins
        ]);
    }

    public function create()
    {
        return view('pages.superadmin.admins.create', [
            'title' => 'Tambah Admin Baru'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        try {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 'admin',
                'nidn' => null,  // Admin tidak perlu NIDN
                'nip' => null,
                'prodi' => null,
                'faculty' => null,
                'position' => 'Admin System',
                'phonenumber' => null
            ]);

            return redirect()->route('superadmin.admins.index')->with('success', 'Admin baru berhasil ditambahkan.');
        } catch (\Illuminate\Database\QueryException $e) {
            \Log::error('Admin creation failed', ['error' => $e->getMessage()]);
            return back()->with('error', 'Gagal menambahkan admin. Email mungkin sudah terdaftar.')->withInput();
        } catch (\Exception $e) {
            \Log::error('Unexpected error in admin creation', ['error' => $e->getMessage()]);
            return back()->with('error', 'Terjadi kesalahan sistem. Silakan coba lagi atau hubungi administrator.')->withInput();
        }
    }

    public function edit($id)
    {
        $admin = User::where('id', $id)->where('role', 'admin')->firstOrFail();

        return view('pages.superadmin.admins.edit', [
            'title' => 'Edit Admin',
            'admin' => $admin
        ]);
    }

    public function update(Request $request, $id)
    {
        $admin = User::where('id', $id)->where('role', 'admin')->firstOrFail();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|min:6|confirmed',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $admin->update($data);

        return redirect()->route('superadmin.admins.index')->with('success', 'Data admin berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $admin = User::where('id', $id)->where('role', 'admin')->firstOrFail();
        $admin->delete();

        return redirect()->route('superadmin.admins.index')->with('success', 'Admin berhasil dihapus.');
    }
}
