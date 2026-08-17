<?php

namespace App\Imports;

use App\Models\Student;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;

class StudentsImport implements ToModel, WithHeadingRow, WithChunkReading, ShouldQueue, WithCustomCsvSettings
{
    public function getCsvSettings(): array
    {
        return [
            'delimiter' => ',',
            'enclosure' => '"',
            'input_encoding' => 'UTF-8',
        ];
    }

    public function model(array $row): ?Student
    {
        $student = new Student;
        $student->student_id = $row['student_id'];
        $student->name = $row['name'];
        $student->email = $row['email'] ?? null;
        $student->phone = $row['phone'] ?? null;
        $student->course = $row['course'];
        $student->batch = $row['batch'];
        return $student;
    }

    public function chunkSize(): int
    {
        return 500;
    }
}
