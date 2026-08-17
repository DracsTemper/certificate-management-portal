@extends('layouts.admin')

@section('title', 'Import Students')
@section('page-title', 'Import Students')

@section('content')

    <div class="container-fluid px-0">

        {{-- Page Header --}}
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
                    Import Students
                </h2>

                <p class="text-muted mb-0">
                    Add multiple students to the portal using a CSV file.
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


        {{-- Flash Messages --}}

        @if(session('success'))

            <div class="alert alert-success d-flex align-items-center mb-4">

                <i class="bi bi-check-circle-fill me-2"></i>

                <div>
                    {{ session('success') }}
                </div>

            </div>

        @endif


        @if(session('error'))

            <div class="alert alert-danger d-flex align-items-center mb-4">

                <i class="bi bi-exclamation-triangle-fill me-2"></i>

                <div>
                    {{ session('error') }}
                </div>

            </div>

        @endif


        @if($errors->any())

            <div class="alert alert-danger mb-4">

                <div class="fw-semibold mb-2">

                    <i class="bi bi-exclamation-circle me-1"></i>

                    Please fix the following errors:

                </div>

                <ul class="mb-0 ps-3">

                    @foreach($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif


        <div class="row g-4">


            {{-- =========================================
                 Upload Section
            ========================================== --}}

            <div class="col-lg-8">

                <div class="portal-card">

                    <div class="portal-card-header">

                        <div class="d-flex align-items-center gap-2">

                            <i class="bi bi-cloud-arrow-up text-primary"></i>

                            <span>
                                Upload Student Data
                            </span>

                        </div>

                    </div>


                    <div class="portal-card-body">


                        <form
                            action="{{ route('admin.students.import.process') }}"
                            method="POST"
                            enctype="multipart/form-data"
                        >

                            @csrf


                            {{-- Upload Area --}}

                            <div
                                class="border border-2 rounded-4 p-5 text-center mb-4"
                                style="
                                    border-style: dashed !important;
                                    background: #f8fafc;
                                "
                            >

                                <div
                                    class="mx-auto mb-3 rounded-circle d-flex align-items-center justify-content-center"
                                    style="
                                        width: 72px;
                                        height: 72px;
                                        background: #e8f0fe;
                                        color: #2563eb;
                                    "
                                >

                                    <i class="bi bi-file-earmark-spreadsheet fs-2"></i>

                                </div>


                                <h5 class="fw-bold mb-2">
                                    Upload your CSV file
                                </h5>


                                <p class="text-muted mb-4">

                                    Select a CSV file containing your student information.

                                </p>


                                <input
                                    type="file"
                                    name="file"
                                    id="studentFile"
                                    class="form-control"
                                    accept=".csv,text/csv"
                                    required
                                >


                                <div class="text-muted small mt-2">

                                    <i class="bi bi-info-circle me-1"></i>

                                    Supported format: CSV

                                </div>

                            </div>


                            {{-- Selected File --}}

                            <div
                                id="selectedFile"
                                class="alert alert-primary d-none align-items-center justify-content-between"
                            >

                                <div>

                                    <i class="bi bi-file-earmark-text me-2"></i>

                                    <strong id="fileName"></strong>

                                </div>

                                <span
                                    id="fileSize"
                                    class="small"
                                ></span>

                            </div>


                            {{-- Submit --}}

                            <div class="d-flex justify-content-end gap-2">

                                <a
                                    href="{{ route('admin.students.index') }}"
                                    class="btn btn-light border"
                                >
                                    Cancel
                                </a>


                                <button
                                    type="submit"
                                    class="btn btn-primary px-4"
                                >

                                    <i class="bi bi-upload me-1"></i>

                                    Import Students

                                </button>

                            </div>


                        </form>

                    </div>

                </div>


                {{-- CSV Format --}}

                <div class="portal-card mt-4">

                    <div class="portal-card-header">

                        <div class="d-flex align-items-center gap-2">

                            <i class="bi bi-table text-primary"></i>

                            <span>
                                CSV Format
                            </span>

                        </div>

                    </div>


                    <div class="portal-card-body">


                        <p class="text-muted small mb-3">

                            Your CSV file should contain the following columns
                            in the first row:

                        </p>


                        <div class="table-responsive">

                            <table class="table table-bordered align-middle mb-0">

                                <thead class="table-light">

                                    <tr>

                                        <th>
                                            student_id
                                        </th>

                                        <th>
                                            name
                                        </th>

                                        <th>
                                            email
                                        </th>

                                        <th>
                                            course
                                        </th>

                                        <th>
                                            batch
                                        </th>

                                    </tr>

                                </thead>


                                <tbody>

                                    <tr>

                                        <td>
                                            STU-201
                                        </td>

                                        <td>
                                            Imran Kabir
                                        </td>

                                        <td>
                                            imran.kabir@example.com
                                        </td>

                                        <td>
                                            Laravel Development
                                        </td>

                                        <td>
                                            07
                                        </td>

                                    </tr>

                                    <tr>

                                        <td>
                                            STU-202
                                        </td>

                                        <td>
                                            Maliha Noor
                                        </td>

                                        <td>
                                            maliha.noor@example.com
                                        </td>

                                        <td>
                                            Web Development
                                        </td>

                                        <td>
                                            07
                                        </td>

                                    </tr>

                                </tbody>

                            </table>

                        </div>


                        <div class="alert alert-light border mt-3 mb-0 small">

                            <i class="bi bi-lightbulb me-1"></i>

                            Make sure the column names match the expected format
                            and each student has a unique student ID and email.

                        </div>

                    </div>

                </div>

            </div>


            {{-- =========================================
                 Instructions
            ========================================== --}}

            <div class="col-lg-4">

                <div class="portal-card">

                    <div class="portal-card-header">

                        <div class="d-flex align-items-center gap-2">

                            <i class="bi bi-info-circle text-primary"></i>

                            <span>
                                Import Instructions
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
                                "
                            >
                                1
                            </div>

                            <div>

                                <div class="fw-semibold mb-1">
                                    Prepare your CSV
                                </div>

                                <div class="text-muted small">
                                    Create a CSV containing the required student
                                    information.
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
                                "
                            >
                                2
                            </div>

                            <div>

                                <div class="fw-semibold mb-1">
                                    Upload the file
                                </div>

                                <div class="text-muted small">
                                    Select your CSV file using the upload field.
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
                                "
                            >
                                3
                            </div>

                            <div>

                                <div class="fw-semibold mb-1">
                                    Import students
                                </div>

                                <div class="text-muted small">
                                    Click Import Students to add the records
                                    to the system.
                                </div>

                            </div>

                        </div>


                        <hr>


                        <div class="small">

                            <div class="fw-semibold mb-2">
                                Required columns
                            </div>

                            <div class="d-flex flex-wrap gap-2">

                                <span class="badge bg-light text-dark border">
                                    student_id
                                </span>

                                <span class="badge bg-light text-dark border">
                                    name
                                </span>

                                <span class="badge bg-light text-dark border">
                                    email
                                </span>

                                <span class="badge bg-light text-dark border">
                                    course
                                </span>

                                <span class="badge bg-light text-dark border">
                                    batch
                                </span>

                            </div>

                        </div>


                        <div class="alert alert-warning mt-4 mb-0 small">

                            <i class="bi bi-exclamation-triangle me-1"></i>

                            Do not remove the header row from your CSV file.

                        </div>

                    </div>

                </div>


                {{-- Bulk Certificate Info --}}

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
                                    Generate certificates in bulk
                                </div>

                                <div class="text-muted small">
                                    After importing students, you can select
                                    multiple students from the Student Directory
                                    and generate their certificates using the
                                    queue system.
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- File Preview Script --}}

    <script>

        document.addEventListener('DOMContentLoaded', function () {

            const fileInput = document.getElementById('studentFile');

            const selectedFile = document.getElementById('selectedFile');

            const fileName = document.getElementById('fileName');

            const fileSize = document.getElementById('fileSize');


            fileInput.addEventListener('change', function () {

                if (!this.files.length) {

                    selectedFile.classList.add('d-none');

                    selectedFile.classList.remove('d-flex');

                    return;

                }


                const file = this.files[0];


                fileName.textContent = file.name;


                const size = file.size / 1024;

                fileSize.textContent =
                    size < 1024
                        ? size.toFixed(1) + ' KB'
                        : (size / 1024).toFixed(2) + ' MB';


                selectedFile.classList.remove('d-none');

                selectedFile.classList.add('d-flex');

            });

        });

    </script>

@endsection