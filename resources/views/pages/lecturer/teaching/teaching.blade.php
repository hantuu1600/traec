@extends('layouts.dashboard-lecturer-layout')

@section('content')
    <div class="space-y-6">

        {{-- Header --}}
        <div class="flex flex-col lg:flex-row lg:items-end lg:justify-between gap-3">
            <div>
                <h1 class="text-2xl font-semibold">Teaching Activity</h1>
                <p class="text-sm opacity-70">Daftar aktivitas mengajar dan statusnya.</p>
            </div>

            <div class="flex gap-2">
                {{-- nanti ganti route kalau sudah ada --}}
                <a href="#" class="btn btn-primary btn-sm">Add Teaching</a>
            </div>
        </div>

        {{-- Card --}}
        <div class="card bg-base-200">
            <div class="card-body p-4 lg:p-6 gap-4">

                {{-- Toolbar --}}
                <div class="flex flex-col lg:flex-row gap-3 lg:items-center lg:justify-between">
                    <div class="join w-full lg:w-auto">
                        <input class="input input-bordered join-item w-full lg:w-80"
                            placeholder="Search course / semester / notes..." />
                        <button class="btn join-item">Search</button>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-3 w-full lg:w-auto">
                        <select class="select select-bordered w-full sm:w-52">
                            <option selected>All Semester</option>
                            <option>2025/2026 Ganjil</option>
                            <option>2025/2026 Genap</option>
                        </select>

                        <select class="select select-bordered w-full sm:w-48">
                            <option selected>All Status</option>
                            <option>Draft</option>
                            <option>Submitted</option>
                            <option>Returned</option>
                            <option>Verified</option>
                        </select>
                    </div>
                </div>

                {{-- Table --}}
                <div class="overflow-x-auto">
                    <table class="table table-zebra">
                        <thead>
                            <tr>
                                <th class="w-[40%]">Course / Activity</th>
                                <th>Semester</th>
                                <th>Status</th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            {{-- Dummy rows (UI dulu) --}}
                            <tr>
                                <td>
                                    <div class="font-medium">Database Systems</div>
                                    <div class="text-sm opacity-70 line-clamp-1">Pengajaran teori & praktikum.</div>
                                </td>
                                <td>2025/2026 Ganjil</td>
                                <td><x-status-badge status="Draft" /></td>
                                <td class="text-right">
                                    <div class="flex justify-end gap-2">
                                        <a href="#" class="btn btn-ghost btn-xs">Detail</a>
                                        <a href="#" class="btn btn-ghost btn-xs">Edit</a>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <div class="font-medium">Web Programming</div>
                                    <div class="text-sm opacity-70 line-clamp-1">Pengajaran berbasis proyek.</div>
                                </td>
                                <td>2025/2026 Genap</td>
                                <td><x-status-badge status="Submitted" /></td>
                                <td class="text-right">
                                    <div class="flex justify-end gap-2">
                                        <a href="#" class="btn btn-ghost btn-xs">Detail</a>
                                        <a href="#" class="btn btn-ghost btn-xs">Edit</a>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <div class="font-medium">Data Mining</div>
                                    <div class="text-sm opacity-70 line-clamp-1">Materi clustering & classification.</div>
                                </td>
                                <td>2024/2025 Genap</td>
                                <td><x-status-badge status="Verified" /></td>
                                <td class="text-right">
                                    <div class="flex justify-end gap-2">
                                        <a href="#" class="btn btn-ghost btn-xs">Detail</a>
                                        <a href="#" class="btn btn-ghost btn-xs">Edit</a>
                                    </div>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>

                {{-- Pagination dummy --}}
                <div class="flex justify-end">
                    <div class="join">
                        <button class="btn btn-sm join-item">«</button>
                        <button class="btn btn-sm join-item btn-active">1</button>
                        <button class="btn btn-sm join-item">2</button>
                        <button class="btn btn-sm join-item">»</button>
                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection
