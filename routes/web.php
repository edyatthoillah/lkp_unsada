<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LandingpageController;
use App\Http\Controllers\SuperAdmin\SuperAdminController;
use App\Http\Controllers\User\UserController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TwoFactorController;
use App\Http\Controllers\TestimonialController;

Route::get('/', [LandingpageController::class, 'index'])->name('dashboard');

Route::get('/dashboard', function () {

    if(auth()->user()->hasRole('admin')){
        return redirect()->route('admin.dashboard');
    }

    if(auth()->user()->hasRole('user')){
        return redirect()->route('user.dashboard');
    }

    if(auth()->user()->hasRole('superadmin')){
        return redirect()->route('superadmin.dashboard');
    }

})->middleware('auth')->name('dashboard');


Route::middleware(['auth', 'role:user', 'verified', 'twofactor'])
    ->prefix('user')
    ->name('user.')
    ->controller(UserController::class)
    ->group(function () {
        Route::get('/dashboard', 'dashboard')->name('dashboard');
    });

Route::middleware(['auth', 'role:admin', 'verified', 'twofactor'])
    ->prefix('admin')
    ->name('admin.')
    ->controller(AdminController::class)
    ->group(function () {
        Route::get('/dashboard', 'dashboard')->name('dashboard');
        Route::resource('news', NewsController::class);
        Route::resource('testimonial', TestimonialController::class);
    });

Route::middleware(['auth', 'role:superadmin', 'verified', 'twofactor'])
    ->prefix('superadmin')
    ->name('superadmin.')
    ->controller(SuperAdminController::class)
    ->group(function () {
        Route::get('/dashboard', 'dashboard')->name('dashboard');
    });

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    if (auth()->user()->hasRole('admin')) {
        return redirect()->route('admin.dashboard');
    }

    return redirect()->route('dashboard');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::middleware('auth')->group(function () {
    Route::get('/email/verify', function () {
        return view('auth.verify-email');
    })->name('verification.notice');
    Route::get('/two-factor', [TwoFactorController::class, 'index'])->name('two-factor.index');
    Route::post('/two-factor', [TwoFactorController::class, 'verify'])->name('two-factor.verify');
});

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/news/{slug}', [NewsController::class, 'show'])
    ->name('news.show');

Route::get('/news', [NewsController::class, 'landingnews'])->name('blogs');

Route::get('/fasilitas', function () {
    return view('facilities');
})->name('facilities');

Route::get('/program', function () {
    return view('program');
})->name('programs');

Route::get('/pengajar', function () {
    return view('tutor');
})->name('tutors');

require __DIR__.'/auth.php';
