@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')

    {{-- =========================================
         Welcome Header
    ========================================== --}}

    <div class="mb-4">

        <h2 class="fw-bold mb-1">
            Welcome back, Admin 👋
        </h2>

        <p class="text-muted mb-0">
            Here's an overview of your certificate management system.
        </p>

    </div>


    {{-- =========================================
         Statistics
    ========================================== --}}

    <div class="row g-4 mb-4">


        {{-- Total Students --}}
        <div class="col-xl-3 col-md-6">

            <div class="portal-card h-100">

                <div class="portal-card-body">

                    <div class="d-flex justify-content-between align-items-start">

                        <div>

                            <p class="text-muted small mb-2">
                                Total Students
                            </p>

                            <h2 class="fw-bold mb-0">
                                {{ number_format($totalStudents) }}
                            </h2>

                        </div>


                        <div
                            class="d-flex align-items-center justify-content-center rounded-3"
                            style="
                                width: 48px;
                                height: 48px;
                                background: #e8f0fe;
                                color: #2563eb;
                            "
                        >

                            <i class="bi bi-people-fill fs-5"></i>

                        </div>

                    </div>


                    <div class="mt-3">

                        <a
                            href="{{ route('admin.students.index') }}"
                            class="text-decoration-none small fw-semibold"
                        >
                            View students
                            <i class="bi bi-arrow-right ms-1"></i>
                        </a>

                    </div>

                </div>

            </div>

        </div>


        {{-- Generated Certificates --}}
        <div class="col-xl-3 col-md-6">

            <div class="portal-card h-100">

                <div class="portal-card-body">

                    <div class="d-flex justify-content-between align-items-start">

                        <div>

                            <p class="text-muted small mb-2">
                                Generated Certificates
                            </p>

                            <h2 class="fw-bold mb-0">
                                {{ number_format($totalCertificates) }}
                            </h2>

                        </div>


                        <div
                            class="d-flex align-items-center justify-content-center rounded-3"
                            style="
                                width: 48px;
                                height: 48px;
                                background: #e8f7ee;
                                color: #198754;
                            "
                        >

                            <i class="bi bi-award-fill fs-5"></i>

                        </div>

                    </div>


                    <div class="mt-3">

                        <span class="text-success small fw-semibold">

                            <i class="bi bi-check-circle-fill me-1"></i>

                            Successfully generated

                        </span>

                    </div>

                </div>

            </div>

        </div>


        {{-- Processing --}}
        <div class="col-xl-3 col-md-6">

            <div class="portal-card h-100">

                <div class="portal-card-body">

                    <div class="d-flex justify-content-between align-items-start">

                        <div>

                            <p class="text-muted small mb-2">
                                Processing
                            </p>

                            <h2 class="fw-bold mb-0">
                                {{ number_format($processingCertificates) }}
                            </h2>

                        </div>


                        <div
                            class="d-flex align-items-center justify-content-center rounded-3"
                            style="
                                width: 48px;
                                height: 48px;
                                background: #fff5df;
                                color: #f59e0b;
                            "
                        >

                            <i class="bi bi-hourglass-split fs-5"></i>

                        </div>

                    </div>


                    <div class="mt-3">

                        @if($processingCertificates > 0)

                            <span class="text-warning small fw-semibold">

                                <i class="bi bi-clock-fill me-1"></i>

                                Certificates being processed

                            </span>

                        @else

                            <span class="text-muted small">

                                No certificates processing

                            </span>

                        @endif

                    </div>

                </div>

            </div>

        </div>


        {{-- Failed --}}
        <div class="col-xl-3 col-md-6">

            <div class="portal-card h-100">

                <div class="portal-card-body">

                    <div class="d-flex justify-content-between align-items-start">

                        <div>

                            <p class="text-muted small mb-2">
                                Failed Certificates
                            </p>

                            <h2 class="fw-bold mb-0">
                                {{ number_format($failedCertificates) }}
                            </h2>

                        </div>


                        <div
                            class="d-flex align-items-center justify-content-center rounded-3"
                            style="
                                width: 48px;
                                height: 48px;
                                background: #fdecec;
                                color: #dc3545;
                            "
                        >

                            <i class="bi bi-exclamation-triangle-fill fs-5"></i>

                        </div>

                    </div>


                    <div class="mt-3">

                        @if($failedCertificates > 0)

                            <span class="text-danger small fw-semibold">

                                <i class="bi bi-exclamation-circle-fill me-1"></i>

                                Requires attention

                            </span>

                        @else

                            <span class="text-success small fw-semibold">

                                <i class="bi bi-check-circle-fill me-1"></i>

                                Everything looks good

                            </span>

                        @endif

                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- =========================================
         Quick Actions
    ========================================== --}}

    <div class="portal-card mb-4">

        <div class="portal-card-body">

            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">

                <div>

                    <h5 class="fw-bold mb-1">
                        Quick Actions
                    </h5>

                    <p class="text-muted small mb-0">
                        Quickly manage students and certificates.
                    </p>

                </div>


                <div class="d-flex gap-2 flex-wrap">

                    <a
                        href="{{ route('admin.students.create') }}"
                        class="btn btn-primary"
                    >

                        <i class="bi bi-person-plus-fill me-1"></i>

                        Add Student

                    </a>


                    <a
                        href="{{ route('admin.students.import') }}"
                        class="btn btn-outline-primary"
                    >

                        <i class="bi bi-file-earmark-arrow-up-fill me-1"></i>

                        Import Students

                    </a>

                </div>

            </div>

        </div>

    </div>


    {{-- =========================================
         Recent Data
    ========================================== --}}

    <div class="row g-4">


        {{-- Recent Students --}}
        <div class="col-xl-6">

            <div class="portal-card h-100">

                <div class="portal-card-header">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <h5 class="mb-1 fw-bold">
                                Recent Students
                            </h5>

                            <small class="text-muted">
                                Recently added students
                            </small>

                        </div>


                        <a
                            href="{{ route('admin.students.index') }}"
                            class="btn btn-sm btn-light"
                        >
                            View All
                        </a>

                    </div>

                </div>


                <div class="table-responsive">

                    <table class="table table-hover align-middle mb-0">

                        <thead class="table-light">

                            <tr>

                                <th class="ps-3">
                                    Student
                                </th>

                                <th>
                                    Course
                                </th>

                                <th>
                                    Batch
                                </th>

                            </tr>

                        </thead>


                        <tbody>

                            @forelse($recentStudents as $student)

                                <tr>

                                    <td class="ps-3">

                                        <div class="d-flex align-items-center gap-2">

                                            <div
                                                class="rounded-circle d-flex align-items-center justify-content-center"
                                                style="
                                                    width: 34px;
                                                    height: 34px;
                                                    background: #e8f0fe;
                                                    color: #2563eb;
                                                    font-size: 12px;
                                                    font-weight: 700;
                                                "
                                            >

                                                {{ strtoupper(substr($student->name, 0, 1)) }}

                                            </div>


                                            <div>

                                                <div class="fw-semibold small">
                                                    {{ $student->name }}
                                                </div>

                                                <div class="text-muted" style="font-size: 11px;">
                                                    {{ $student->student_id }}
                                                </div>

                                            </div>

                                        </div>

                                    </td>


                                    <td>

                                        <span class="small">
                                            {{ $student->course }}
                                        </span>

                                    </td>


                                    <td>

                                        <span class="badge text-bg-light border">
                                            {{ $student->batch }}
                                        </span>

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td
                                        colspan="3"
                                        class="text-center text-muted py-4"
                                    >

                                        <i class="bi bi-people fs-3 d-block mb-2"></i>

                                        No students found.

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>


        {{-- Recent Certificates --}}
        <div class="col-xl-6">

            <div class="portal-card h-100">

                <div class="portal-card-header">

                    <div>

                        <h5 class="mb-1 fw-bold">
                            Recent Certificates
                        </h5>

                        <small class="text-muted">
                            Latest certificate activity
                        </small>

                    </div>

                </div>


                <div class="table-responsive">

                    <table class="table table-hover align-middle mb-0">

                        <thead class="table-light">

                            <tr>

                                <th class="ps-3">
                                    Certificate
                                </th>

                                <th>
                                    Student
                                </th>

                                <th>
                                    Status
                                </th>

                            </tr>

                        </thead>


                        <tbody>

                            @forelse($recentCertificates as $certificate)

                                <tr>

                                    <td class="ps-3">

                                        <div class="fw-semibold small">

                                            {{ $certificate->certificate_number }}

                                        </div>

                                        <div
                                            class="text-muted"
                                            style="font-size: 11px;"
                                        >

                                            {{ $certificate->course }}

                                        </div>

                                    </td>


                                    <td>

                                        <span class="small">

                                            {{ $certificate->student->name ?? 'Unknown' }}

                                        </span>

                                    </td>


                                    <td>

                                        @if($certificate->status === 'generated')

                                            <span class="badge bg-success-subtle text-success">

                                                <i class="bi bi-check-circle-fill me-1"></i>

                                                Generated

                                            </span>

                                        @elseif($certificate->status === 'processing')

                                            <span class="badge bg-warning-subtle text-warning-emphasis">

                                                <i class="bi bi-hourglass-split me-1"></i>

                                                Processing

                                            </span>

                                        @elseif($certificate->status === 'failed')

                                            <span class="badge bg-danger-subtle text-danger">

                                                <i class="bi bi-x-circle-fill me-1"></i>

                                                Failed

                                            </span>

                                        @else

                                            <span class="badge bg-secondary-subtle text-secondary">

                                                {{ ucfirst($certificate->status) }}

                                            </span>

                                        @endif

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td
                                        colspan="3"
                                        class="text-center text-muted py-4"
                                    >

                                        <i class="bi bi-award fs-3 d-block mb-2"></i>

                                        No certificates found.

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>


@endsection