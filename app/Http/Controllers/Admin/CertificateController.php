<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Certificate;
use App\Models\Student;
use App\Jobs\GenerateCertificateJob;

class CertificateController extends Controller
{
    public function generate(Student $student)
    {
        if ($student->certificate) {

            return redirect()
                ->route('admin.students.show', $student)
                ->with('error', 'This student already has a certificate.');

        }


        GenerateCertificateJob::dispatch($student->id);


        return redirect()
            ->route('admin.students.show', $student)
            ->with(
                'success',
                'Certificate generation has been queued successfully.'
            );
    }

    public function generateBulk(Request $request)
    {
        $request->validate([
            'student_ids' => ['required', 'array', 'min:1'],
            'student_ids.*' => ['integer', 'exists:students,id'],
        ]);

        foreach ($request->student_ids as $studentId) {

            GenerateCertificateJob::dispatch($studentId);

        }

        return redirect()
            ->route('admin.students.index')
            ->with('success', 'Certificate generation has been queued successfully.');
    }


    public function preview(Student $student)
    {
        $certificate = $student->certificate;

        abort_if(!$certificate, 404);

        return view('certificates.certificate', compact('certificate'));
    }


    public function download(Student $student)
    {
        $certificate = $student->certificate;

        abort_if(!$certificate, 404);

        if (!$certificate->pdf_path) {
            abort(404, 'Certificate PDF has not been generated yet.');
        }

        return response()->download(
            storage_path('app/public/' . $certificate->pdf_path),
            $certificate->certificate_number . '.pdf'
        );
    }
}