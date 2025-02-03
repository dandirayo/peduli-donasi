<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApprovalController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\DiscussionController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\YayasanController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('welcome');
Route::get('/faq', [FaqController::class, 'index'])->name('faq');

Route::middleware('role:notAdmin')->group(function () {
    Route::prefix('forum')->group(function() {
        Route::get('/', [DiscussionController::class, 'index'])->name('forum');
        Route::middleware('auth')->post('/new', [DiscussionController::class, 'store'])->name('storeForum');
        Route::prefix('/detail')->group(function() {
            Route::get('/', [DiscussionController::class, 'show'])->name('forumDetail');
            Route::middleware('auth')->post('/new', [DiscussionController::class, 'storeDetail'])->name('storeForumDetail');
        });
    });

    Route::prefix('yayasan')->group(function() {
        Route::get('/', [YayasanController::class, 'index'])->name('yayasanList');
        Route::middleware(['auth', 'role:yayasan'])->prefix('/profile')->group(function() {
            Route::get('/', [YayasanController::class, 'showProfileYayasan'])->name('profileYayasan');
            Route::get('/donatur', [YayasanController::class, 'indexDonatur'])->name('indexDonatur');
            Route::prefix('/edit')->group(function() {
                Route::post('/info', [YayasanController::class, 'updateProfileYayasan'])->name('updateProfileYayasan');
                Route::post('/about', [YayasanController::class, 'updateProfileYayasanAbout'])->name('updateProfileYayasanAbout');
                Route::post('/contact', [YayasanController::class, 'updateProfileYayasanContact'])->name('updateProfileYayasanContact');
                Route::post('/program', [YayasanController::class, 'updateProgramYayasan'])->name('updateProgramYayasan');
                Route::post('/activity', [YayasanController::class, 'updateActivityYayasan'])->name('updateActivityYayasan');
            });
            Route::prefix('/add')->group(function() {
                Route::post('/program', [YayasanController::class, 'storeProgramYayasan'])->name('storeProgramYayasan');
                Route::post('/activity', [YayasanController::class, 'storeActivityYayasan'])->name('storeActivityYayasan');
            });
            Route::prefix('/remove')->group(function() {
                Route::post('/program', [YayasanController::class, 'deleteProgramYayasan'])->name('deleteProgramYayasan');
                Route::post('/activity', [YayasanController::class, 'deleteActivityYayasan'])->name('deleteActivityYayasan');
            });
        });
        Route::middleware(['auth', 'role:yayasan'])->prefix('/daftar')->group(function() {
            Route::get('/', [ApprovalController::class, 'daftarYayasan'])->name('daftarYayasan');
            Route::post('/', [ApprovalController::class, 'storeDaftarYayasan'])->name('storeDaftarYayasan');
        });

        Route::prefix('/detail')->group(function() {
            Route::get('/', [YayasanController::class, 'show'])->name('yayasanDetail');
            Route::middleware(['auth', 'role:donatur'])->post('/donate', [YayasanController::class, 'donateYayasan'])->name('donateYayasan');
        });
    });

    Route::prefix('artikel')->group(function() {
        Route::get('/', [ArticleController::class, 'index'])->name('artikelList');
        Route::prefix('/detail')->group(function() {
            Route::get('/', [ArticleController::class, 'show'])->name('artikelDetail');
        });
    });

    Route::middleware(['auth', 'role:donatur'])->prefix('profile')->group(function() {
        Route::get('/', [ProfileController::class, 'showProfileDonatur'])->name('profileDonatur');
        Route::post('/edit', [ProfileController::class, 'updateProfileDonatur'])->name('updateProfileDonatur');
        Route::post('/donasi/update/status', [YayasanController::class, 'donateYayasanUpdateStatus'])->name('donasiUpdateStatus');
    });
});

Route::middleware('role:admin')->prefix('admin')->group(function() {
    Route::get('/', [AdminController::class, 'adminHome'])->name('adminHome');

    Route::prefix('/ajax')->group(function() {
        Route::get('/yayasan/index', [AdminController::class, 'indexYayasan'])->name('listApprovalYayasan');
        Route::get('/article/index', [AdminController::class, 'indexArticle'])->name('listArticleAdmin');
    });

    Route::prefix('/yayasan')->group(function() {
        Route::get('/', [ApprovalController::class, 'showYayasan'])->name('adminViewYayasan');
        Route::post('/approve', [ApprovalController::class, 'approveYayasan'])->name('approveYayasan');
//        Route::post('/disapprove', [ApprovalController::class, 'disapproveCompany'])->name('disapproveCompany');
    });

    Route::prefix('/artikel')->group(function() {
        Route::get('/', [AdminController::class, 'adminArticleHome'])->name('adminArticleHome');
        Route::get('/new', [AdminController::class, 'adminArticleNew'])->name('adminArticleNew');
        Route::post('/new', [AdminController::class, 'storeArikel'])->name('adminStoreArikel');
        Route::prefix('/detail')->group(function() {
            Route::get('/', [AdminController::class, 'adminArticleDetail'])->name('adminArticleDetail');
        });
    });
});

Route::post('/changePassword', [ProfileController::class, 'changePassword'])->name('changePassword');

Auth::routes();
