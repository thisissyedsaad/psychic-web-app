<?php

use App\Http\Controllers\Backend\Admin\DashboardController;
use App\Http\Controllers\Backend\Admin\PsychicServiceController;
use App\Http\Controllers\Backend\Admin\AppLinkController;
use App\Http\Controllers\Backend\Admin\PaymentLinkController;
use App\Http\Controllers\Backend\Admin\SeoSettingController;
use App\Http\Controllers\Backend\Admin\SocialMediaLinkController;
use App\Http\Controllers\Backend\Admin\PageController;
use App\Http\Controllers\Backend\Admin\PsychicController;
use App\Http\Controllers\Backend\Admin\SiteController;
use App\Http\Controllers\Backend\Admin\SiteMapController;
use App\Http\Controllers\Backend\Admin\DatabaseBackupController;
use App\Http\Controllers\Frontend\AuthController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\UserRegisterController;
use App\Http\Controllers\Frontend\UserLoginController;
use App\Http\Controllers\Frontend\ArticleController;
use App\Http\Controllers\Frontend\PsychicController as FrontendPsychicController;
use App\Http\Controllers\Frontend\PsychicServiceController as FrontendPsychicServiceController;
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
require __DIR__ . '/auth.php';

// Public Frontend Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about-us', [HomeController::class, 'aboutUs'])->name('about-us');
Route::get('/terms-and-conditions', [HomeController::class, 'termsAndConditions'])->name('terms-and-conditions');
Route::get('/privacy-policy', [HomeController::class, 'privacyPolicy'])->name('privacy-policy');
Route::get('/contact-us', [HomeController::class, 'contact'])->name('contact-us');
Route::get('/how-it-works', [HomeController::class, 'howItWorks'])->name('how-it-works');
Route::get('/pricing', [HomeController::class, 'pricing'])->name('pricing');
Route::get('/testimonials', [HomeController::class, 'testimonial'])->name('testimonial');
Route::get('/join-us', [AuthController::class, 'joinUs'])->name('join-us');
Route::get('/articles', [ArticleController::class, 'articles'])->name('articles');
Route::get('/articles/1', [ArticleController::class, 'articleDetail'])->name('article.show');
Route::get('/psychics', [FrontendPsychicController::class, 'psychics'])->name('psychics');
Route::get('/psychics/{slug}', [FrontendPsychicController::class, 'psychicDetail'])->name('psychic.show');
Route::get('/psychic-services', [FrontendPsychicServiceController::class, 'psychicServices'])->name('psychic-services');
Route::get('/psychic-services/{slug}', [FrontendPsychicServiceController::class, 'psychicServiceDetail'])->name('psychic-service.show');

// User Authentication Routes
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');

// Route::get('/user/logout', [UserLoginController::class, 'logout'])->name('user.logout');
Route::get('/user/login', [UserLoginController::class, 'showLoginForm'])->name('user.login');
Route::post('/user/login', [UserLoginController::class, 'submitLoginForm'])->name('user.login.submit');
Route::prefix('user/register')->name('user.register.')->group(function () {
    Route::get('/', [UserRegisterController::class, 'showEmailForm'])->name('email');
    Route::post('/send', [UserRegisterController::class, 'sendVerification'])->name('send');
    Route::get('/verify', [UserRegisterController::class, 'showVerify'])->name('verify');
    Route::post('/resend', [UserRegisterController::class, 'resendVerification'])->name('resend');
    Route::post('/firebase-verified', [UserRegisterController::class, 'handleFirebaseVerified'])->name('firebase.verified');
    Route::get('/verified', [UserRegisterController::class, 'showVerified'])->name('verified');
    Route::get('/complete', [UserRegisterController::class, 'showCompleteForm'])->name('complete');
    Route::post('/complete', [UserRegisterController::class, 'completeRegistration'])->name('complete.submit');
});
require __DIR__ . '/auth.php';

// Admin Routes
Route::group([
    'prefix' => 'admin',
    'middleware' => ['auth']
], function () {
    Route::resource('users', 'UserController')->except(['show', 'create']);
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('psychic-services', PsychicServiceController::class);
    Route::resource('app-links', AppLinkController::class);
    Route::resource('payment-links', PaymentLinkController::class);
    Route::resource('social-media-links', SocialMediaLinkController::class);
    Route::resource('pages', PageController::class);
    Route::resource('psychics', PsychicController::class);
    Route::get('site-setting', [SiteController::class, 'settings'])->name('site.setting');
    Route::post('site-setting', [SiteController::class, 'update'])->name('site.update');
    Route::get('sitemap', [SiteMapController::class, 'settings'])->name('sitemap.setting');
    Route::post('sitemap', [SiteMapController::class, 'update'])->name('sitemap.update');
    Route::post('sitemap/generate', [SiteMapController::class, 'generate'])->name('sitemap.generate');
    Route::get('database/backup', [DatabaseBackupController::class, 'backup'])->name('database.backup');
    Route::get('seo', [SeoSettingController::class, 'settings'])->name('seo.settings');
    Route::post('seo', [SeoSettingController::class, 'store'])->name('seo.settings.store');
});




