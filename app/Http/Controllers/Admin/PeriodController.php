<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PeriodController extends Controller
{
    const TABLE = 'periods';

    public function index()
    {
        $periods = DB::table(self::TABLE)
            ->orderByDesc('start_date')
            ->paginate(10);

        return view('pages.admin.periods.index', [
            'title' => 'Kelola Periode',
            'periods' => $periods
        ]);
    }

    public function create()
    {
        return view('pages.admin.periods.create', [
            'title' => 'Tambah Periode',
            'period' => (object) [
                'id' => null,
                'name' => '',
                'start_date' => '',
                'end_date' => '',
                'is_active' => false
            ]
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ]);

        DB::beginTransaction();
        try {
            $isActive = $request->has('is_active');

            if ($isActive) {
                // Deactivate others
                DB::table(self::TABLE)->update(['is_active' => false]);
            }

            DB::table(self::TABLE)->insert([
                'name' => $request->name,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'is_active' => $isActive,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            DB::commit();
            return redirect()->route('admin.periods.index')->with('success', 'Periode berhasil ditambahkan.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal menambahkan periode: ' . $e->getMessage());
        }
    }

    public function edit(int $id)
    {
        $period = DB::table(self::TABLE)->where('id', $id)->first();
        if (!$period)
            abort(404);

        return view('pages.admin.periods.edit', [
            'title' => 'Edit Periode',
            'period' => $period
        ]);
    }

    public function update(Request $request, int $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ]);

        DB::beginTransaction();
        try {
            // Handle activation logic via separate route usually, but here maybe during update?
            // Let's assume standard update doesn't toggle active easily unless specific checkbox

            // But usually activation is a significant event. 
            // I'll stick to basic data update here.

            DB::table(self::TABLE)->where('id', $id)->update([
                'name' => $request->name,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'updated_at' => now(),
            ]);

            DB::commit();
            return redirect()->route('admin.periods.index')->with('success', 'Periode berhasil diperbarui.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal memperbarui periode: ' . $e->getMessage());
        }
    }

    public function activate(int $id)
    {
        DB::beginTransaction();
        try {
            // Deactivate all
            DB::table(self::TABLE)->update(['is_active' => false]);

            // Activate target
            DB::table(self::TABLE)->where('id', $id)->update(['is_active' => true]);

            DB::commit();
            return back()->with('success', 'Periode berhasil diaktifkan.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal mengaktifkan periode.');
        }
    }

    public function destroy(int $id)
    {
        // Prevent deleting active period
        $period = DB::table(self::TABLE)->where('id', $id)->first();
        if ($period && $period->is_active) {
            return back()->with('error', 'Tidak dapat menghapus periode yang sedang aktif.');
        }

        // Also check if used? For now soft delete logic usually implies checking constraints.
        // But table migration didn't specify soft deletes for periods (checked earlier).
        DB::table(self::TABLE)->delete($id);
        return back()->with('success', 'Periode berhasil dihapus.');
    }
}
