<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\IndustriesController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\LicenseController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SkillController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WorkerController;

Route::get('/', function () {
    return view('umum/dashboard/index', [
        'backUrl' => 'Dashboard',
    ]);
});

// Route::get('/sign_in', [UmumController::class, 'login'])->name('login');
Route::prefix('sign_up')->middleware('guest')->group(function () {
    Route::get('/', [AuthController::class, 'sign_up'])->name('Regis');
    Route::post('/registration', [AuthController::class, 'registration'])->name('Regis.store');
});
Route::prefix('sign_in')->middleware('guest')->group(function () {
    Route::get('/', [AuthController::class, 'sign_in'])->name('Login');
    Route::post('/', [AuthController::class, 'authenticate'])->name('Login.authenticate');
});

Route::get('/invoice', function () {
    return view('umum.Invoice.index', [
        'backUrl' => 'Invoice',
    ]);
});
Route::get('/invoice/detail', function () {
    return view('umum.Invoice.detail', [
        'backUrl' => 'Invoice',
    ]);
});
Route::get('/email/invoice', function () {
    return view('umum.Email.invoice', [
        'backUrl' => 'Email Invoice',
    ]);
});
// master data
Route::prefix("md")->group(function () {

    Route::prefix("industries")->group(function () {
        Route::get('/', [IndustriesController::class, 'index'])->name("Industries");
        Route::get('/list', [IndustriesController::class, 'list'])->name("Industries.list");
        Route::post('/store', [IndustriesController::class, 'store'])->name('Industries.store');
        Route::get('/detail/{id}', [IndustriesController::class, 'detail'])->name("Industries.detail");
        Route::post('/update', [IndustriesController::class, 'update'])->name('Industries.update');
        Route::delete('/delete', [IndustriesController::class, 'destroy'])->name("Industries.delete");
    });

    Route::prefix("user")->group(function () {
        Route::get('/', [UserController::class, 'index'])->name("User");
        Route::get('/list', [UserController::class, 'list'])->name("User.list");
        Route::post('/store', [UserController::class, 'store'])->name('User.store');
        Route::get('/detail/{id}', [UserController::class, 'detail'])->name("User.detail");
        Route::post('/update', [UserController::class, 'update'])->name('User.update');
        Route::delete('/delete', [UserController::class, 'destroy'])->name("User.delete");
    });

    Route::prefix("post")->group(function () {
        Route::get('/', [PostController::class, 'index'])->name("Post");
        Route::get('/list', [PostController::class, 'list'])->name("Post.list");
        Route::post('/store', [PostController::class, 'store'])->name('Post.store');
        Route::get('/detail/{id}', [PostController::class, 'detail'])->name("Post.detail");
        Route::post('/update', [PostController::class, 'update'])->name('Post.update');
        Route::delete('/delete', [PostController::class, 'destroy'])->name("Post.delete");
    });
});

// user management
Route::prefix("um")->group(function () {

    Route::prefix("admin")->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name("Admin");
        Route::get('/list', [AdminController::class, 'list'])->name("Admin.list");
        Route::post('/store', [AdminController::class, 'store'])->name('Admin.store');
        Route::get('/detail/{id}', [AdminController::class, 'detail'])->name("Admin.detail");
        Route::post('/update', [AdminController::class, 'update'])->name('Admin.update');
        Route::delete('/delete', [AdminController::class, 'destroy'])->name("Admin.delete");
    });

    Route::prefix("company")->group(function () {
        Route::get('/', [CompanyController::class, 'index'])->name("Company");
        Route::get('/list', [CompanyController::class, 'list'])->name("Company.list");
        Route::post('/store', [CompanyController::class, 'store'])->name('Company.store');
        Route::get('/detail/{id}', [CompanyController::class, 'detail'])->name("Company.detail");
        Route::post('/update', [CompanyController::class, 'update'])->name('Company.update');
        Route::delete('/delete', [CompanyController::class, 'destroy'])->name("Company.delete");
    });

    Route::prefix("worker")->group(function () {
        Route::get('/', [WorkerController::class, 'index'])->name("Worker");
        Route::get('/list', [WorkerController::class, 'list'])->name("Worker.list");
        Route::post('/store', [WorkerController::class, 'store'])->name('Worker.store');
        Route::get('/detail/{id}', [WorkerController::class, 'detail'])->name("Worker.detail");
        Route::post('/update', [WorkerController::class, 'update'])->name('Worker.update');
        Route::delete('/delete', [WorkerController::class, 'destroy'])->name("Worker.delete");
    });

    Route::prefix("skill")->group(function () {
        Route::get('/list', [SkillController::class, 'list'])->name("Skill.list");
        Route::post('/store', [SkillController::class, 'store'])->name('Skill.store');
        Route::get('/detail/{id}', [SkillController::class, 'detail'])->name("Skill.detail");
        Route::post('/update', [SkillController::class, 'update'])->name('Skill.update');
        Route::delete('/delete', [SkillController::class, 'destroy'])->name("Skill.delete");
    });
});

Route::prefix("education")->group(function () {
    Route::get('/list', [EducationController::class, 'list'])->name("Education.list");
    Route::post('/store', [EducationController::class, 'store'])->name('Education.store');
    Route::get('/detail/{id}', [EducationController::class, 'detail'])->name("Education.detail");
    Route::post('/update', [EducationController::class, 'update'])->name('Education.update');
    Route::delete('/delete', [EducationController::class, 'destroy'])->name("Education.delete");
});

Route::prefix("experience")->group(function () {
    Route::get('/list', [ExperienceController::class, 'list'])->name("Experience.list");
    Route::post('/store', [ExperienceController::class, 'store'])->name('Experience.store');
    Route::get('/detail/{id}', [ExperienceController::class, 'detail'])->name("Experience.detail");
    Route::post('/update', [ExperienceController::class, 'update'])->name('Experience.update');
    Route::delete('/delete', [ExperienceController::class, 'destroy'])->name("Experience.delete");
});

Route::prefix("license")->group(function () {
    Route::get('/list', [LicenseController::class, 'list'])->name("License.list");
    Route::post('/store', [LicenseController::class, 'store'])->name('License.store');
    Route::get('/detail/{id}', [LicenseController::class, 'detail'])->name("License.detail");
    Route::post('/update', [LicenseController::class, 'update'])->name('License.update');
    Route::delete('/delete', [LicenseController::class, 'destroy'])->name("License.delete");
});
