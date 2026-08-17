<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $totalStudents = \App\Models\Student::count();

        $totalCertificates = \App\Models\Certificate::where(
            'status',
            'generated'
        )->count();

        $processingCertificates = \App\Models\Certificate::where(
            'status',
            'processing'
        )->count();

        $failedCertificates = \App\Models\Certificate::where(
            'status',
            'failed'
        )->count();

        $recentStudents = \App\Models\Student::latest()
            ->take(5)
            ->get();

        $recentCertificates = \App\Models\Certificate::with('student')
            ->latest()
            ->take(5)
            ->get();


        return view('admin.dashboard', compact(
            'totalStudents',
            'totalCertificates',
            'processingCertificates',
            'failedCertificates',
            'recentStudents',
            'recentCertificates'
        ));
    }
}