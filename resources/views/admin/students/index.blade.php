@extends('layouts.admin')

@section('title', 'Students')
@section('page-title', 'Students')

@section('content')

    {{-- =========================================
         Page Header
    ========================================== --}}

    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">

        <div>

            <h2 class="fw-bold mb-1">
                Students
            </h2>

            <p class="text-muted mb-0">
                Manage students and their certificates.
            </p>

        </div>


        <div class="d-flex gap-2">

            <a
                href="{{ route('admin.students.import') }}"
                class="btn btn-outline-primary"
            >
                <i class="bi bi-file-earmark-arrow-up-fill me-1"></i>
                Import Students
            </a>


            <a
                href="{{ route('admin.students.create') }}"
                class="btn btn-primary"
            >
                <i class="bi bi-person-plus-fill me-1"></i>
                Add Student
            </a>

        </div>

    </div>


    {{-- =========================================
         Students Card
    ========================================== --}}

    <div class="portal-card">


        {{-- Card Header --}}

        <div class="portal-card-header">

            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">

                <div>

                    <h5 class="fw-bold mb-1">
                        Student Directory
                    </h5>

                    <small class="text-muted">
                        Select students to generate certificates in bulk.
                    </small>

                </div>


                {{-- Search --}}

                <form
                    method="GET"
                    action="{{ route('admin.students.index') }}"
                    class="d-flex"
                >

                    <div class="input-group">

                        <span class="input-group-text bg-white">

                            <i class="bi bi-search text-muted"></i>

                        </span>

                        <input
                            type="text"
                            name="search"
                            value="{{ request('search') }}"
                            class="form-control"
                            placeholder="Search students..."
                            style="min-width: 240px;"
                        >

                        <button
                            type="submit"
                            class="btn btn-primary"
                        >
                            Search
                        </button>

                    </div>

                </form>

            </div>

        </div>


        {{-- =========================================
             Bulk Action Bar
        ========================================== --}}

        <div
            id="bulkActionBar"
            class="px-4 py-3 border-bottom"
            style="display: none; background: #f8fafc;"
        >

            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">

                <div class="d-flex align-items-center gap-2">

                    <span
                        class="badge bg-primary"
                        id="selectedCount"
                    >
                        0
                    </span>

                    <span class="text-muted small">
                        student(s) selected
                    </span>

                </div>


                <button
                    type="submit"
                    form="bulkCertificateForm"
                    class="btn btn-primary btn-sm"
                    onclick="return confirm('Generate certificates for the selected students?')"
                >

                    <i class="bi bi-award-fill me-1"></i>

                    Generate Certificates

                </button>

            </div>

        </div>


        {{-- =========================================
             Table
        ========================================== --}}

        <div class="table-responsive">

            <form
                id="bulkCertificateForm"
                method="POST"
                action="{{ route('admin.students.certificates.generate.bulk') }}"
            >

                @csrf


                <table class="table table-hover align-middle mb-0">

                    <thead class="table-light">

                        <tr>

                            <th
                                style="width: 45px;"
                                class="ps-4"
                            >

                                <div class="form-check">

                                    <input
                                        type="checkbox"
                                        class="form-check-input"
                                        id="selectAll"
                                    >

                                </div>

                            </th>


                            <th>
                                Student
                            </th>


                            <th>
                                Email
                            </th>


                            <th>
                                Course
                            </th>


                            <th>
                                Batch
                            </th>


                            <th>
                                Certificate
                            </th>


                            <th class="text-end pe-4">
                                Actions
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        @forelse($students as $student)

                            <tr>

                                {{-- Checkbox --}}

                                <td class="ps-4">

                                    <div class="form-check">

                                        <input
                                            type="checkbox"
                                            class="form-check-input student-checkbox"
                                            name="student_ids[]"
                                            value="{{ $student->id }}"
                                        >

                                    </div>

                                </td>


                                {{-- Student --}}

                                <td>

                                    <div class="d-flex align-items-center gap-2">

                                        <div
                                            class="rounded-circle d-flex align-items-center justify-content-center flex-shrink-0"
                                            style="
                                                width: 38px;
                                                height: 38px;
                                                background: #e8f0fe;
                                                color: #2563eb;
                                                font-size: 13px;
                                                font-weight: 700;
                                            "
                                        >

                                            {{ strtoupper(substr($student->name, 0, 1)) }}

                                        </div>


                                        <div>

                                            <div class="fw-semibold">

                                                {{ $student->name }}

                                            </div>


                                            <div
                                                class="text-muted"
                                                style="font-size: 11px;"
                                            >

                                                {{ $student->student_id }}

                                            </div>

                                        </div>

                                    </div>

                                </td>


                                {{-- Email --}}

                                <td>

                                    <span class="text-muted small">

                                        {{ $student->email }}

                                    </span>

                                </td>


                                {{-- Course --}}

                                <td>

                                    <span class="small">

                                        {{ $student->course }}

                                    </span>

                                </td>


                                {{-- Batch --}}

                                <td>

                                    <span class="badge text-bg-light border">

                                        {{ $student->batch }}

                                    </span>

                                </td>


                                {{-- Certificate Status --}}

                                <td>

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

                                            <i class="bi bi-dash-circle me-1"></i>

                                            Not Generated

                                        </span>

                                    @endif

                                </td>


                                {{-- Actions --}}

                                <td class="text-end pe-4">

                                    <div class="d-flex justify-content-end gap-1">


                                        {{-- View --}}

                                        <a
                                            href="{{ route('admin.students.show', $student) }}"
                                            class="btn btn-sm btn-light border"
                                            title="View Student"
                                        >

                                            <i class="bi bi-eye"></i>

                                        </a>


                                        {{-- Edit --}}

                                        <a
                                            href="{{ route('admin.students.edit', $student) }}"
                                            class="btn btn-sm btn-light border"
                                            title="Edit Student"
                                        >

                                            <i class="bi bi-pencil"></i>

                                        </a>


                                        {{-- Delete --}}

                                        <form
                                            action="{{ route('admin.students.destroy', $student) }}"
                                            method="POST"
                                            class="d-inline"
                                            onsubmit="return confirm('Are you sure you want to delete this student?')"
                                        >

                                            @csrf

                                            @method('DELETE')


                                            <button
                                                type="submit"
                                                class="btn btn-sm btn-light border text-danger"
                                                title="Delete Student"
                                            >

                                                <i class="bi bi-trash"></i>

                                            </button>

                                        </form>


                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td
                                    colspan="7"
                                    class="text-center py-5"
                                >

                                    <div class="text-muted">

                                        <i
                                            class="bi bi-people fs-1 d-block mb-3"
                                        ></i>


                                        @if(request('search'))

                                            <h6 class="fw-semibold">
                                                No students found
                                            </h6>

                                            <p class="small mb-3">
                                                No students matched "{{ request('search') }}".
                                            </p>


                                            <a
                                                href="{{ route('admin.students.index') }}"
                                                class="btn btn-sm btn-outline-primary"
                                            >
                                                Clear Search
                                            </a>

                                        @else

                                            <h6 class="fw-semibold">
                                                No students yet
                                            </h6>

                                            <p class="small mb-3">
                                                Start by adding your first student.
                                            </p>


                                            <a
                                                href="{{ route('admin.students.create') }}"
                                                class="btn btn-sm btn-primary"
                                            >
                                                <i class="bi bi-person-plus me-1"></i>
                                                Add Student
                                            </a>

                                        @endif

                                    </div>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </form>

        </div>


        {{-- =========================================
             Footer / Pagination
        ========================================== --}}

        @if($students->count())

            <div class="px-4 py-3 border-top">

                <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">

                    <div class="text-muted small">

                        Showing
                        <strong>{{ $students->firstItem() }}</strong>
                        to
                        <strong>{{ $students->lastItem() }}</strong>
                        of
                        <strong>{{ $students->total() }}</strong>
                        students

                    </div>


                    <div>

                        {{ $students->withQueryString()->onEachSide(1)->links() }}

                    </div>

                </div>

            </div>

        @endif

    </div>


@endsection


@push('scripts')

<script>

    document.addEventListener('DOMContentLoaded', function () {

        const selectAll = document.getElementById('selectAll');

        const checkboxes = document.querySelectorAll('.student-checkbox');

        const bulkActionBar = document.getElementById('bulkActionBar');

        const selectedCount = document.getElementById('selectedCount');


        function updateBulkActionBar()
        {
            const checked = document.querySelectorAll(
                '.student-checkbox:checked'
            );


            const count = checked.length;


            selectedCount.textContent = count;


            if (count > 0) {

                bulkActionBar.style.display = 'block';

            } else {

                bulkActionBar.style.display = 'none';

            }


            if (selectAll) {

                selectAll.checked =
                    count === checkboxes.length &&
                    checkboxes.length > 0;

            }

        }


        if (selectAll) {

            selectAll.addEventListener('change', function () {

                checkboxes.forEach(function (checkbox) {

                    checkbox.checked = selectAll.checked;

                });


                updateBulkActionBar();

            });

        }


        checkboxes.forEach(function (checkbox) {

            checkbox.addEventListener('change', function () {

                updateBulkActionBar();

            });

        });


        updateBulkActionBar();

    });

</script>

@endpush