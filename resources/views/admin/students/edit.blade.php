@extends('layouts.admin')

@section('title', 'Edit Student')
@section('page-title', 'Edit Student')

@section('content')

    {{-- =========================================
         Page Header
    ========================================== --}}

    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">

        <div>

            <a
                href="{{ route('admin.students.show', $student) }}"
                class="text-decoration-none text-muted small"
            >
                <i class="bi bi-arrow-left me-1"></i>
                Back to Student
            </a>

            <h2 class="fw-bold mb-1 mt-2">
                Edit Student
            </h2>

            <p class="text-muted mb-0">
                Update the student's information below.
            </p>

        </div>


        <a
            href="{{ route('admin.students.index') }}"
            class="btn btn-light border"
        >

            <i class="bi bi-people me-1"></i>

            Student Directory

        </a>

    </div>


    {{-- =========================================
         Validation Errors
    ========================================== --}}

    @if($errors->any())

        <div class="alert alert-danger mb-4">

            <div class="fw-semibold mb-2">

                <i class="bi bi-exclamation-circle me-1"></i>

                Please fix the following errors:

            </div>


            <ul class="mb-0 ps-3">

                @foreach($errors->all() as $error)

                    <li>
                        {{ $error }}
                    </li>

                @endforeach

            </ul>

        </div>

    @endif


    <div class="row g-4">


        {{-- =========================================
             Edit Form
        ========================================== --}}

        <div class="col-lg-8">

            <div class="portal-card">

                <div class="portal-card-header">

                    <div class="d-flex align-items-center gap-2">

                        <i class="bi bi-pencil-square text-primary"></i>

                        <span>
                            Student Information
                        </span>

                    </div>

                </div>


                <div class="portal-card-body">


                    <form
                        action="{{ route('admin.students.update', $student) }}"
                        method="POST"
                    >

                        @csrf

                        @method('PUT')


                        <div class="row g-4">


                            {{-- Student ID --}}

                            <div class="col-md-6">

                                <label
                                    for="student_id"
                                    class="form-label fw-semibold"
                                >
                                    Student ID
                                </label>


                                <input
                                    type="text"
                                    id="student_id"
                                    name="student_id"
                                    value="{{ old('student_id', $student->student_id) }}"
                                    class="form-control @error('student_id') is-invalid @enderror"
                                    placeholder="e.g. STU-001"
                                    required
                                >


                                @error('student_id')

                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>

                                @enderror

                            </div>


                            {{-- Name --}}

                            <div class="col-md-6">

                                <label
                                    for="name"
                                    class="form-label fw-semibold"
                                >
                                    Full Name
                                </label>


                                <input
                                    type="text"
                                    id="name"
                                    name="name"
                                    value="{{ old('name', $student->name) }}"
                                    class="form-control @error('name') is-invalid @enderror"
                                    placeholder="Student full name"
                                    required
                                >


                                @error('name')

                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>

                                @enderror

                            </div>


                            {{-- Email --}}

                            <div class="col-md-6">

                                <label
                                    for="email"
                                    class="form-label fw-semibold"
                                >
                                    Email Address
                                </label>


                                <input
                                    type="email"
                                    id="email"
                                    name="email"
                                    value="{{ old('email', $student->email) }}"
                                    class="form-control @error('email') is-invalid @enderror"
                                    placeholder="student@example.com"
                                    required
                                >


                                @error('email')

                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>

                                @enderror

                            </div>


                            {{-- Course --}}

                            <div class="col-md-6">

                                <label
                                    for="course"
                                    class="form-label fw-semibold"
                                >
                                    Course
                                </label>


                                <input
                                    type="text"
                                    id="course"
                                    name="course"
                                    value="{{ old('course', $student->course) }}"
                                    class="form-control @error('course') is-invalid @enderror"
                                    placeholder="e.g. Laravel Development"
                                    required
                                >


                                @error('course')

                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>

                                @enderror

                            </div>


                            {{-- Batch --}}

                            <div class="col-md-6">

                                <label
                                    for="batch"
                                    class="form-label fw-semibold"
                                >
                                    Batch
                                </label>


                                <input
                                    type="text"
                                    id="batch"
                                    name="batch"
                                    value="{{ old('batch', $student->batch) }}"
                                    class="form-control @error('batch') is-invalid @enderror"
                                    placeholder="e.g. 10"
                                    required
                                >


                                @error('batch')

                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>

                                @enderror

                            </div>


                        </div>


                        {{-- =====================================
                             Form Actions
                        ====================================== --}}

                        <div class="d-flex justify-content-between align-items-center mt-4 pt-4 border-top flex-wrap gap-2">


                            <a
                                href="{{ route('admin.students.show', $student) }}"
                                class="btn btn-light border"
                            >

                                <i class="bi bi-x-lg me-1"></i>

                                Cancel

                            </a>


                            <button
                                type="submit"
                                class="btn btn-primary px-4"
                            >

                                <i class="bi bi-check-lg me-1"></i>

                                Save Changes

                            </button>


                        </div>


                    </form>

                </div>

            </div>

        </div>


        {{-- =========================================
             Student Summary
        ========================================== --}}

        <div class="col-lg-4">

            <div class="portal-card">

                <div class="portal-card-header">

                    <div class="d-flex align-items-center gap-2">

                        <i class="bi bi-person-vcard text-primary"></i>

                        <span>
                            Current Student
                        </span>

                    </div>

                </div>


                <div class="portal-card-body">


                    <div class="text-center mb-4">


                        <div
                            class="rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3"
                            style="
                                width: 70px;
                                height: 70px;
                                background: #e8f0fe;
                                color: #2563eb;
                                font-size: 24px;
                                font-weight: 700;
                            "
                        >

                            {{ strtoupper(substr($student->name, 0, 1)) }}

                        </div>


                        <h5 class="fw-bold mb-1">
                            {{ $student->name }}
                        </h5>


                        <div class="text-muted small">
                            {{ $student->student_id }}
                        </div>

                    </div>


                    <div class="border rounded-3 p-3 mb-3">

                        <div class="text-muted small mb-1">
                            Current Course
                        </div>

                        <div class="fw-semibold">
                            {{ $student->course }}
                        </div>

                    </div>


                    <div class="border rounded-3 p-3 mb-3">

                        <div class="text-muted small mb-1">
                            Current Batch
                        </div>

                        <div class="fw-semibold">
                            {{ $student->batch }}
                        </div>

                    </div>


                    <div class="border rounded-3 p-3">

                        <div class="text-muted small mb-1">
                            Certificate
                        </div>


                        @if($student->certificate)

                            @if($student->certificate->status === 'generated')

                                <span class="badge bg-success-subtle text-success">

                                    <i class="bi bi-check-circle-fill me-1"></i>

                                    Generated

                                </span>

                            @elseif($student->certificate->status === 'processing')

                                <span class="badge bg-warning-subtle text-warning-emphasis">

                                    <i class="bi bi-hourglass-split me-1"></i>

                                    Processing

                                </span>

                            @elseif($student->certificate->status === 'failed')

                                <span class="badge bg-danger-subtle text-danger">

                                    <i class="bi bi-x-circle-fill me-1"></i>

                                    Failed

                                </span>

                            @else

                                <span class="badge bg-secondary-subtle text-secondary">

                                    {{ ucfirst($student->certificate->status) }}

                                </span>

                            @endif

                        @else

                            <span class="badge bg-light text-muted border">

                                Not Generated

                            </span>

                        @endif

                    </div>

                </div>

            </div>


            {{-- Record Info --}}

            <div class="portal-card mt-4">

                <div class="portal-card-body">

                    <div class="d-flex gap-3">

                        <div
                            class="rounded-3 d-flex align-items-center justify-content-center flex-shrink-0"
                            style="
                                width: 42px;
                                height: 42px;
                                background: #f1f5f9;
                                color: #64748b;
                            "
                        >

                            <i class="bi bi-info-circle"></i>

                        </div>


                        <div>

                            <div class="fw-semibold mb-1">
                                Editing student information
                            </div>

                            <div class="text-muted small">

                                Changes will be saved immediately after
                                clicking <strong>Save Changes</strong>.

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection