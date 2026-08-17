@extends('layouts.admin')

@section('title', 'Student Details')
@section('page-title', 'Student Details')

@section('content')

    {{-- =========================================
         Back + Header
    ========================================== --}}

    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">

        <div>

            <a
                href="{{ route('admin.students.index') }}"
                class="text-decoration-none text-muted small"
            >
                <i class="bi bi-arrow-left me-1"></i>
                Back to Students
            </a>

            <h2 class="fw-bold mb-1 mt-2">
                Student Details
            </h2>

            <p class="text-muted mb-0">
                View student information and manage their certificate.
            </p>

        </div>


        <div class="d-flex gap-2">

            <a
                href="{{ route('admin.students.edit', $student) }}"
                class="btn btn-outline-primary"
            >

                <i class="bi bi-pencil me-1"></i>

                Edit Student

            </a>


            <a
                href="{{ route('admin.students.index') }}"
                class="btn btn-light border"
            >

                <i class="bi bi-people me-1"></i>

                All Students

            </a>

        </div>

    </div>


    {{-- =========================================
         Student Profile
    ========================================== --}}

    <div class="row g-4">


        {{-- Student Information --}}

        <div class="col-lg-7">

            <div class="portal-card h-100">

                <div class="portal-card-header">

                    <div class="d-flex align-items-center gap-2">

                        <i class="bi bi-person-vcard text-primary"></i>

                        <span>
                            Student Information
                        </span>

                    </div>

                </div>


                <div class="portal-card-body">


                    {{-- Student Header --}}

                    <div class="d-flex align-items-center gap-3 mb-4">

                        <div
                            class="rounded-circle d-flex align-items-center justify-content-center flex-shrink-0"
                            style="
                                width: 64px;
                                height: 64px;
                                background: #e8f0fe;
                                color: #2563eb;
                                font-size: 22px;
                                font-weight: 700;
                            "
                        >

                            {{ strtoupper(substr($student->name, 0, 1)) }}

                        </div>


                        <div>

                            <h4 class="fw-bold mb-1">
                                {{ $student->name }}
                            </h4>

                            <span class="text-muted">
                                {{ $student->student_id }}
                            </span>

                        </div>

                    </div>


                    {{-- Information Grid --}}

                    <div class="row g-3">


                        <div class="col-md-6">

                            <div class="border rounded-3 p-3 h-100">

                                <div class="text-muted small mb-1">
                                    Student ID
                                </div>

                                <div class="fw-semibold">
                                    {{ $student->student_id }}
                                </div>

                            </div>

                        </div>


                        <div class="col-md-6">

                            <div class="border rounded-3 p-3 h-100">

                                <div class="text-muted small mb-1">
                                    Email Address
                                </div>

                                <div class="fw-semibold text-break">
                                    {{ $student->email }}
                                </div>

                            </div>

                        </div>


                        <div class="col-md-6">

                            <div class="border rounded-3 p-3 h-100">

                                <div class="text-muted small mb-1">
                                    Course
                                </div>

                                <div class="fw-semibold">
                                    {{ $student->course }}
                                </div>

                            </div>

                        </div>


                        <div class="col-md-6">

                            <div class="border rounded-3 p-3 h-100">

                                <div class="text-muted small mb-1">
                                    Batch
                                </div>

                                <div class="fw-semibold">
                                    {{ $student->batch }}
                                </div>

                            </div>

                        </div>


                    </div>

                </div>

            </div>

        </div>


        {{-- =========================================
             Certificate
        ========================================== --}}

        <div class="col-lg-5">

            <div class="portal-card h-100">


                <div class="portal-card-header">

                    <div class="d-flex align-items-center gap-2">

                        <i class="bi bi-award text-primary"></i>

                        <span>
                            Certificate
                        </span>

                    </div>

                </div>


                <div class="portal-card-body">


                    @if($student->certificate)


                        {{-- =====================================
                             Certificate Exists
                        ====================================== --}}

                        <div class="text-center py-2">


                            {{-- Status Icon --}}

                            @if($student->certificate->status === 'generated')

                                <div
                                    class="mx-auto mb-3 rounded-circle d-flex align-items-center justify-content-center"
                                    style="
                                        width: 70px;
                                        height: 70px;
                                        background: #e8f7ee;
                                        color: #198754;
                                    "
                                >

                                    <i class="bi bi-check-lg fs-2"></i>

                                </div>


                                <h5 class="fw-bold mb-1">
                                    Certificate Generated
                                </h5>

                                <p class="text-muted small mb-4">
                                    This student already has a generated certificate.
                                </p>


                                {{-- Certificate Number --}}

                                <div
                                    class="border rounded-3 p-3 mb-4 text-start"
                                    style="background: #f8fafc;"
                                >

                                    <div class="text-muted small mb-1">
                                        Certificate Number
                                    </div>

                                    <div class="fw-bold">
                                        {{ $student->certificate->certificate_number }}
                                    </div>

                                </div>


                                {{-- Actions --}}

                                <div class="d-grid gap-2">


                                    <a
                                        href="{{ route('admin.students.certificate.preview', $student) }}"
                                        class="btn btn-primary"
                                    >

                                        <i class="bi bi-eye me-1"></i>

                                        View Certificate

                                    </a>


                                    @if($student->certificate->pdf_path)

                                        <a
                                            href="{{ route('admin.students.certificate.download', $student) }}"
                                            class="btn btn-outline-primary"
                                        >

                                            <i class="bi bi-file-earmark-pdf me-1"></i>

                                            Download PDF

                                        </a>

                                    @endif

                                </div>


                                <div class="mt-4 text-muted small">

                                    <i class="bi bi-calendar3 me-1"></i>

                                    Issued
                                    {{ optional($student->certificate->issued_at)->format('F d, Y') }}

                                </div>


                            @elseif($student->certificate->status === 'processing')


                                {{-- Processing --}}

                                <div
                                    class="mx-auto mb-3 rounded-circle d-flex align-items-center justify-content-center"
                                    style="
                                        width: 70px;
                                        height: 70px;
                                        background: #fff5df;
                                        color: #f59e0b;
                                    "
                                >

                                    <i class="bi bi-hourglass-split fs-2"></i>

                                </div>


                                <h5 class="fw-bold mb-1">
                                    Certificate Processing
                                </h5>

                                <p class="text-muted small mb-0">
                                    The certificate is currently being generated.
                                </p>


                                <div class="alert alert-warning mt-4 mb-0 text-start small">

                                    <i class="bi bi-info-circle me-1"></i>

                                    Please refresh this page after the queue worker
                                    finishes processing the certificate.

                                </div>


                            @elseif($student->certificate->status === 'failed')


                                {{-- Failed --}}

                                <div
                                    class="mx-auto mb-3 rounded-circle d-flex align-items-center justify-content-center"
                                    style="
                                        width: 70px;
                                        height: 70px;
                                        background: #fdecec;
                                        color: #dc3545;
                                    "
                                >

                                    <i class="bi bi-exclamation-triangle fs-2"></i>

                                </div>


                                <h5 class="fw-bold mb-1">
                                    Certificate Generation Failed
                                </h5>

                                <p class="text-muted small">
                                    The certificate could not be generated.
                                </p>


                                <div class="alert alert-danger mt-3 mb-0 text-start small">

                                    <i class="bi bi-exclamation-circle me-1"></i>

                                    You can retry certificate generation.

                                </div>


                                <form
                                    action="{{ route('admin.students.certificate.generate', $student) }}"
                                    method="POST"
                                    class="mt-3"
                                >

                                    @csrf

                                    <button
                                        type="submit"
                                        class="btn btn-primary w-100"
                                    >

                                        <i class="bi bi-arrow-clockwise me-1"></i>

                                        Retry Generation

                                    </button>

                                </form>


                            @else


                                {{-- Other Status --}}

                                <div class="py-3">

                                    <span class="badge bg-secondary mb-3">
                                        {{ ucfirst($student->certificate->status) }}
                                    </span>

                                    <p class="text-muted small mb-0">
                                        Certificate status is currently
                                        {{ $student->certificate->status }}.
                                    </p>

                                </div>


                            @endif


                        </div>


                    @else


                        {{-- =====================================
                             No Certificate
                        ====================================== --}}

                        <div class="text-center py-3">


                            <div
                                class="mx-auto mb-3 rounded-circle d-flex align-items-center justify-content-center"
                                style="
                                    width: 70px;
                                    height: 70px;
                                    background: #f1f3f5;
                                    color: #6c757d;
                                "
                            >

                                <i class="bi bi-award fs-2"></i>

                            </div>


                            <h5 class="fw-bold mb-1">
                                No Certificate Yet
                            </h5>


                            <p class="text-muted small mb-4">

                                This student does not have a certificate.
                                Generate one when they complete their course.

                            </p>


                            <form
                                action="{{ route('admin.students.certificate.generate', $student) }}"
                                method="POST"
                            >

                                @csrf

                                <button
                                    type="submit"
                                    class="btn btn-primary w-100"
                                    onclick="return confirm('Generate a certificate for {{ $student->name }}?')"
                                >

                                    <i class="bi bi-award-fill me-1"></i>

                                    Generate Certificate

                                </button>

                            </form>


                        </div>


                    @endif

                </div>

            </div>

        </div>

    </div>


    {{-- =========================================
         Additional Details
    ========================================== --}}

    <div class="portal-card mt-4">

        <div class="portal-card-header">

            <div class="d-flex align-items-center gap-2">

                <i class="bi bi-info-circle text-primary"></i>

                <span>
                    Record Information
                </span>

            </div>

        </div>


        <div class="portal-card-body">

            <div class="row g-4">


                <div class="col-md-4">

                    <div class="text-muted small mb-1">
                        Student Record ID
                    </div>

                    <div class="fw-semibold">
                        #{{ $student->id }}
                    </div>

                </div>


                <div class="col-md-4">

                    <div class="text-muted small mb-1">
                        Created
                    </div>

                    <div class="fw-semibold">

                        {{ optional($student->created_at)->format('F d, Y h:i A') }}

                    </div>

                </div>


                <div class="col-md-4">

                    <div class="text-muted small mb-1">
                        Last Updated
                    </div>

                    <div class="fw-semibold">

                        {{ optional($student->updated_at)->format('F d, Y h:i A') }}

                    </div>

                </div>


            </div>

        </div>

    </div>


@endsection