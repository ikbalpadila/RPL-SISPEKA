<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\{
    GuruController,
    SiswaController,
    KelasController,
    MapelController,
    TeachingAssignmentController,
    ReportController
};
use App\Http\Controllers\Guru\AttendanceController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Guru\GuruGradeController;
use App\Http\Controllers\Guru\BehaviorController;
use App\Http\Controllers\Wali\BehaviorController as WaliBehaviorController;
use App\Http\Controllers\Wali\NilaiController as WaliNilaiController;
use App\Http\Controllers\Wali\AbsensiController as WaliAbsensiController;
use App\Http\Controllers\Wali\WaliDashboardController;


/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/
Route::get('/', fn () => view('welcome'));

Route::get('/login', fn () => view('auth.login'))->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.process');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.process');

/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/
Route::middleware(['auth','role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');

        Route::resource('guru', GuruController::class);
        Route::resource('kelas', KelasController::class);
        Route::resource('mapel', MapelController::class);
        Route::resource('assignments', TeachingAssignmentController::class);

        // pilih kelas
        Route::get('/siswa', [SiswaController::class, 'kelasIndex'])
            ->name('siswa.kelas');

        // siswa per kelas
        Route::get('/siswa/kelas/{kelas}', [SiswaController::class, 'index'])
            ->name('siswa.index');

        Route::get('/siswa/create', [SiswaController::class, 'selectKelas'])
            ->name('siswa.create.select');
        // tambah siswa per kelas
        Route::get('/siswa/create/{kelas}', [SiswaController::class, 'create'])
            ->name('siswa.create');

        Route::post('/siswa', [SiswaController::class, 'store'])
            ->name('siswa.store');        

        Route::get('/siswa/{siswa}/edit', [SiswaController::class, 'edit'])
            ->name('siswa.edit');

        Route::put('/siswa/{siswa}', [SiswaController::class, 'update'])
            ->name('siswa.update');

        Route::delete('/siswa', [SiswaController::class, 'destroy'])
            ->name('siswa.destroy');
        // ======================
        // LAPORAN
         // ======================
            Route::get('/report', [ReportController::class, 'index'])
                    ->name('report.index');

                // daftar mapel siswa
            Route::get('/report/siswa/{siswa}', [ReportController::class, 'mapel'])
                    ->name('report.mapel');

                // detail laporan per mapel
            Route::get(
                    '/report/siswa/{siswa}/mapel/{mapel}',
                    [ReportController::class, 'detail']
                )->name('report.detail');
            });

            Route::get(
                '/admin/report/siswa/{siswa}/mapel/{mapel}/export',
                [ReportController::class, 'exportExcel']
            )->name('admin.report.export');
            
            Route::resource(
                'teaching_assignments',
                TeachingAssignmentController::class
            )->names('admin.teaching_assignments');
    

/*
|--------------------------------------------------------------------------
| GLOBAL RESOURCE (AGAR VIEW LAMA AMAN)
|--------------------------------------------------------------------------
*/
// Route::resource('guru', \App\Http\Controllers\Admin\GuruController::class);
// Route::resource('siswa', \App\Http\Controllers\Admin\SiswaController::class);
// Route::resource('kelas', \App\Http\Controllers\Admin\KelasController::class);
// Route::resource('mapel', \App\Http\Controllers\Admin\MapelController::class);

/*
|--------------------------------------------------------------------------
| GURU
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:guru'])
    ->prefix('guru')
    ->name('guru.')
    ->group(function () {

        Route::get('/dashboard', fn () => view('guru.dashboard'))
            ->name('dashboard');

        Route::get('/attendance', [AttendanceController::class, 'index'])
            ->name('attendance.index');

        Route::get('/attendance/{assignment}', [AttendanceController::class, 'create'])
            ->name('attendance.create');

        Route::post('/attendance', [AttendanceController::class, 'store'])
            ->name('attendance.store');

        Route::get('attendance/{assignment}/history', [AttendanceController::class, 'history'])
            ->name('attendance.history'); 
            
        // EDIT attendance (form edit)
        Route::get('/guru/attendance/{id}/edit/{date}', [AttendanceController::class, 'edit'])
        ->name('attendance.edit');
    
        Route::put('/guru/attendance/update/{date}', [AttendanceController::class, 'update'])
        ->name('attendance.update');    
    
        // UPDATE attendance (submit edit)
        Route::put('/attendance/{id}', [AttendanceController::class, 'update'])->name('attendance.update');


        Route::get('/nilai', [\App\Http\Controllers\Guru\GradeController::class, 'index'])
            ->name('grade.index');
        
        Route::get('/nilai/{assignment}', [\App\Http\Controllers\Guru\GradeController::class, 'create'])
            ->name('grade.create');
        
        Route::post('/nilai/{assignment}', [\App\Http\Controllers\Guru\GradeController::class, 'store'])
            ->name('grade.store');

        Route::get('/nilai-matrix/{assignment}', 
            [GuruGradeController::class, 'matrix']
        )->name('grade.matrix');
        
        Route::post('/nilai-matrix/{assignment}', 
            [GuruGradeController::class, 'updateMatrix']
        )->name('grade.matrix.update');

        Route::get('/guru/grade/{id}/delete', [GuruGradeController::class, 'deleteMatrix'])
        ->name('grade.matrix.delete');
         

        Route::get('/behavior', fn () => 'Behavior')
            ->name('behavior.index');

        Route::get('/behavior', [BehaviorController::class, 'index'])
            ->name('behavior.index');
        
        Route::get('/behavior/create', [BehaviorController::class, 'create'])
            ->name('behavior.create');
        
        Route::post('/behavior', [BehaviorController::class, 'store'])
            ->name('behavior.store');        
        
        Route::delete('/behavior/{behavior}', [BehaviorController::class, 'destroy'])
            ->name('behavior.destroy');
        
});




/*
|--------------------------------------------------------------------------
| WALI
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:wali'])
    ->prefix('wali')
    ->name('wali.')
    ->group(function () {

        Route::get('/dashboard', [WaliDashboardController::class, 'index'])
            ->name('dashboard');

        // =====================
        // CATATAN PERILAKU
        // =====================
        Route::get('/behavior', [WaliBehaviorController::class, 'index'])
            ->name('behavior.index');

        // =====================
        // NILAI AKADEMIK
        // =====================
        Route::get('/nilai', [WaliNilaiController::class, 'index'])
            ->name('nilai.index');

        // =====================
        // ABSENSI
        // =====================
        Route::get('/absensi', [WaliAbsensiController::class, 'index'])
            ->name('absensi.index');
});

