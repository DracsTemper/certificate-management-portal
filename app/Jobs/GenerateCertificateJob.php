<?php

namespace App\Jobs;

use App\Models\Certificate;
use App\Models\Student;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Storage;

class GenerateCertificateJob implements ShouldQueue
{
    use Queueable;

    public int $studentId;

    public $tries = 3;

    public $backoff = 10;


    public function __construct(int $studentId)
    {
        $this->studentId = $studentId;
    }


    public function handle(): void
    {
        $student = Student::find($this->studentId);

        if (!$student) {
            return;
        }


        // Prevent duplicate certificates
        if ($student->certificate) {
            return;
        }


        // Create certificate
        $certificate = new Certificate;

        $certificate->student_id = $student->id;

        $certificate->certificate_number = 'CERT-' . date('Y') . '-' . str_pad(
            Certificate::count() + 1,
            5,
            '0',
            STR_PAD_LEFT
        );

        $certificate->course = $student->course;

        $certificate->issued_at = now();

        $certificate->status = 'processing';

        $certificate->save();


        // Generate PDF
        $pdf = Pdf::loadView(
            'certificates.certificate',
            compact('certificate')
        );

        $pdf->setPaper('a4', 'landscape');


        // PDF path
        $fileName = $certificate->certificate_number . '.pdf';

        $filePath = 'certificates/' . $fileName;


        // Store PDF
        Storage::disk('public')->put(
            $filePath,
            $pdf->output()
        );


        // Final update
        $certificate->pdf_path = $filePath;

        $certificate->status = 'generated';

        $certificate->save();
    }


    public function failed(\Throwable $exception): void
    {
        $student = Student::find($this->studentId);

        if (!$student) {
            return;
        }

        $certificate = $student->certificate;

        if ($certificate) {
            $certificate->status = 'failed';
            $certificate->save();
        }
    }
}