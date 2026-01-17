@extends('layouts.dashboard-lecturer-layout')

@section('content')

    <div class="overflow-x-auto">
        <table class="table table-zebra">
            <thead>
                <tr>
                    <th>Period</th>
                    <th>Submitted At</th>
                    <th>Status</th>
                    <th>Remarks</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Ganjil 2025/2026</td>
                    <td>10 Jan 2026</td>
                    <td>
                        <span class="badge badge-info">Submitted</span>
                    </td>
                    <td>-</td>
                </tr>
                <tr>
                    <td>Genap 2024/2025</td>
                    <td>12 Jul 2025</td>
                    <td>
                        <span class="badge badge-success">Verified</span>
                    </td>
                    <td>OK</td>
                </tr>
            </tbody>
        </table>
    </div>

    </div>
    </div>
    </div>
@endsection