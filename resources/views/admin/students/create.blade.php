@extends('layouts.admin')

@section('title', 'Add Student')
@section('page-title', 'Add Student')

@section('content')

    {{-- =========================================
         Page Header
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
                Add Student
            </h2>

            <p class="text-muted mb-0">
                Create a new student record in the certificate portal.
            </p>

        </div>


        <a
            href="{{ route('admin.students.import') }}"
            class="btn btn-outline-primary"
        >

            <i class="bi bi-file-earmark-arrow-up-fill me-1"></i>

            Import Students

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
             Student Form
        ========================================== --}}

        <div class="col-lg-8">

            <div class="portal-card">

                <div class="portal-card-header">

                    <div class="d-flex align-items-center gap-2">

                        <i class="bi bi-person-plus text-primary"></i>

                        <span>
                            Student Information
                        </span>

                    </div>

                </div>


                <div class="portal-card-body">

                    <form
                        action="{{ route('admin.students.store') }}"
                        method="POST"
                    >

                        @csrf


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
                                    value="{{ old('student_id') }}"
                                    class="form-control @error('student_id') is-invalid @enderror"
                                    placeholder="e.g. STU-001"
                                    required
                                >


                                <div class="form-text">
                                    Use a unique ID for the student.
                                </div>


                                @error('student_id')

                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>

                                @enderror

                            </div>


                            {{-- Full Name --}}

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
                                    value="{{ old('name') }}"
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
                                    value="{{ old('email') }}"
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
                                    value="{{ old('course') }}"
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
                                    value="{{ old('batch') }}"
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
                                href="{{ route('admin.students.index') }}"
                                class="btn btn-light border"
                            >

                                <i class="bi bi-x-lg me-1"></i>

                                Cancel

                            </a>


                            <button
                                type="submit"
                                class="btn btn-primary px-4"
                            >

                                <i class="bi bi-person-plus-fill me-1"></i>

                                Create Student

                            </button>


                        </div>


                    </form>

                </div>

            </div>

        </div>


        {{-- =========================================
             Information Panel
        ========================================== --}}

        <div class="col-lg-4">

            <div class="portal-card">

                <div class="portal-card-header">

                    <div class="d-flex align-items-center gap-2">

                        <i class="bi bi-info-circle text-primary"></i>

                        <span>
                            Student Registration
                        </span>

                    </div>

                </div>


                <div class="portal-card-body">


                    <div class="d-flex gap-3 mb-4">

                        <div
                            class="rounded-circle d-flex align-items-center justify-content-center flex-shrink-0"
                            style="
                                width: 36px;
                                height: 36px;
                                background: #e8f0fe;
                                color: #2563eb;
                                font-weight: 700;
                            "
                        >
                            1
                        </div>


                        <div>

                            <div class="fw-semibold mb-1">
                                Enter student details
                            </div>

                            <div class="text-muted small">
                                Provide the student's ID, name, email,
                                course, and batch information.
                            </div>

                        </div>

                    </div>


                    <div class="d-flex gap-3 mb-4">

                        <div
                            class="rounded-circle d-flex align-items-center justify-content-center flex-shrink-0"
                            style="
                                width: 36px;
                                height: 36px;
                                background: #e8f0fe;
                                color: #2563eb;
                                font-weight: 700;
                            "
                        >
                            2
                        </div>


                        <div>

                            <div class="fw-semibold mb-1">
                                Save the student
                            </div>

                            <div class="text-muted small">
                                Click Create Student to add the record
                                to the student directory.
                            </div>

                        </div>

                    </div>


                    <div class="d-flex gap-3">

                        <div
                            class="rounded-circle d-flex align-items-center justify-content-center flex-shrink-0"
                            style="
                                width: 36px;
                                height: 36px;
                                background: #e8f0fe;
                                color: #2563eb;
                                font-weight: 700;
                            "
                        >
                            3
                        </div>


                        <div>

                            <div class="fw-semibold mb-1">
                                Generate certificate
                            </div>

                            <div class="text-muted small">
                                After creation, open the student's profile
                                to generate their certificate.
                            </div>

                        </div>

                    </div>


                    <hr class="my-4">


                    <div class="alert alert-light border mb-0 small">

                        <i class="bi bi-lightbulb me-1"></i>

                        Need to add many students?

                        Use the
                        <strong>Import Students</strong>
                        option to upload a CSV file instead.

                    </div>

                </div>

            </div>


            {{-- Certificate Workflow --}}

            <div class="portal-card mt-4">

                <div class="portal-card-body">

                    <div class="d-flex gap-3">

                        <div
                            class="rounded-3 d-flex align-items-center justify-content-center flex-shrink-0"
                            style="
                                width: 44px;
                                height: 44px;
                                background: #e8f7ee;
                                color: #198754;
                            "
                        >

                            <i class="bi bi-award fs-5"></i>

                        </div>


                        <div>

                            <div class="fw-semibold mb-1">
                                Certificate generation
                            </div>

                            <div class="text-muted small">

                                Certificates are generated separately
                                through the queue system after the
                                student record is created.

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection