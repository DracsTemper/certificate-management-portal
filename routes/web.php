<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\CertificateController;

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes([
    'register' => false,
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
    ->name('home');


Route::middleware(['auth'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        // Dashboard
        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');


        // Student Import
        Route::get('/students/import', [StudentController::class, 'import'])
            ->name('students.import');

        Route::post('/students/import', [StudentController::class, 'processImport'])
            ->name('students.import.process');


        // Student CRUD
        Route::resource('students', StudentController::class);


        // =========================================================
        // Certificate Routes
        // =========================================================
    
        // Generate Certificate
        Route::post('/students/{student}/certificate/generate', [CertificateController::class, 'generate'])
            ->name('students.certificate.generate');

        // View Certificate
        Route::get('/students/{student}/certificate', [CertificateController::class, 'preview'])
            ->name('students.certificate.preview');

        // Download Certificate PDF
        Route::get('/students/{student}/certificate/download', [CertificateController::class, 'download'])
            ->name('students.certificate.download');

        // Bulk Generate Certificates
        Route::post('/students/certificates/generate-bulk', [CertificateController::class, 'generateBulk'])
            ->name('students.certificates.generate.bulk');

    });