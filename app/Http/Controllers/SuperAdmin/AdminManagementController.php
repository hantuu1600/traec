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
        // Get all users with role 'admin'
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

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'admin',
            // Default nullable fields
            'nidn' => '-',
            'nip' => '-',
            'prodi' => '-',
            'faculty' => '-',
            'position' => 'Admin System',
            'phonenumber' => '-'
        ]);

        return redirect()->route('superadmin.admins.index')->with('success', 'Admin baru berhasil ditambahkan.');
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
