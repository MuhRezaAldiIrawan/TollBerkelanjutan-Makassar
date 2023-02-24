<?php

use App\Imports\TundaBayarImport;
use Illuminate\Support\Facades\Route;
// use Tymon\JWTAuth\Contracts\Providers\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\User\KartuController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Frontend\About\InfoTrafficController;
use App\Http\Controllers\Auth\ForgotPasswordController;

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

/*Start*/

/*Menu Home(login)*/
//Home
// Route::get('/', [LoginController::class, 'showLoginForm'])->name('homes');
// Route::get('/', [LoginController::class, 'showLoginForm'])->name('login-form');
// Route::post('/', [LoginController::class, 'login'])->name('login');

// Info Traffic
// Route::get('/mmn', [InfoTrafficController::class, 'mmn'])->name('mmn')->middleware('auth')->middleware('role:aktif');
// Route::get('/jtse', [InfoTrafficController::class, 'jtse'])->name('jtse')->middleware('auth')->middleware('role:aktif');

Route::get('/mmn-harian', [InfoTrafficController::class, 'mmnHarian'])->name('mmn-harian')->middleware('auth')->middleware('role:aktif');
Route::get('/mmn-harian/{bulan}', [InfoTrafficController::class, 'mmnHarianBulan'])->name('mmn-harian-bulan')->middleware('auth')->middleware('role:aktif');

Route::get('/mmn-gerbang-harian', [InfoTrafficController::class, 'mmnGerbang'])->name('mmn-gerbang-harian')->middleware('auth')->middleware('role:aktif');
Route::get('/mmn-gerbang-harian/{gate}', [InfoTrafficController::class, 'mmnGerbangDetail'])->name('mmn-gerbang-harian-detail')->middleware('auth')->middleware('role:aktif');

Route::get('/mmn-bulanan', [InfoTrafficController::class, 'mmnBulanan'])->name('mmn-bulanan')->middleware('auth')->middleware('role:aktif');
Route::get('/mmn-komposisi', [InfoTrafficController::class, 'mmnKomposisi'])->name('mmn-komposisi')->middleware('auth')->middleware('role:aktif');
Route::get('/mmn-traffic-history', [InfoTrafficController::class, 'mmnTrafficHistory'])->name('mmn-traffic-history')->middleware('auth')->middleware('role:aktif');

Route::get('/jtse-harian', [InfoTrafficController::class, 'jtseHarian'])->name('jtse-harian')->middleware('auth')->middleware('role:aktif');
Route::get('/jtse-harian/{bulan}', [InfoTrafficController::class, 'jtseHarianBulan'])->name('jtse-harian-bulan')->middleware('auth')->middleware('role:aktif');

Route::get('/jtse-bulanan', [InfoTrafficController::class, 'jtseBulanan'])->name('jtse-bulanan')->middleware('auth')->middleware('role:aktif');

Route::get('/jtse-gerbang-harian', [InfoTrafficController::class, 'jtseGerbang'])->name('jtse-gerbang-harian')->middleware('auth')->middleware('role:aktif');
Route::get('/jtse-gerbang-harian/{gate}', [InfoTrafficController::class, 'jtseGerbangDetail'])->name('jtse-gerbang-harian-detail')->middleware('auth')->middleware('role:aktif');

Route::get('/jtse-komposisi', [InfoTrafficController::class, 'jtseKomposisi'])->name('jtse-komposisi')->middleware('auth')->middleware('role:aktif')->middleware('auth')->middleware('role:aktif');
Route::get('/jtse-traffic-history', [InfoTrafficController::class, 'jtseTrafficHistory'])->name('jtse-traffic-history')->middleware('auth')->middleware('role:aktif')->middleware('auth')->middleware('role:aktif');

Route::get('/map', [InfoTrafficController::class, 'map'])->name('map')->middleware('auth')->middleware('role:aktif');
Route::get('/cctv', [InfoTrafficController::class, 'cctv'])->name('cctv')->middleware('auth')->middleware('role:aktif');

// testing 
Route::get('/test', [InfoTrafficController::class, 'test']);






Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->middleware('guest');
Route::post('/logout', [LoginController::class, 'logout']);

// Route::get('/','FrontController@getIndex')->middleware('auth')->middleware('role:aktif');

Route::get('/', [InfoTrafficController::class, 'mmnHarian'])->name('mmn-harian')->middleware('auth')->middleware('role:aktif');


// Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register')->middleware('guest');
// Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('register')->middleware('guest');

Route::post('/admin/delayedpayments',[InfoTrafficController::class,'import'])->name('delayedPay.import');

Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

/*Menu About Us*/
//Sejarah
// Route::get('/sejarah', 'Frontend\About\Umum\SejarahController@index')->name('sejarah');

// //Profile
// Route::get('/profile', 'Frontend\About\Umum\ProfileController@index')->name('profile');

// //Visi Misi
// Route::get('/visi-misi', 'Frontend\About\Umum\VisiMisiController@index')->name('visi-misi');

// //Dewan
// Route::get('/dewan', 'Frontend\About\DewanController@index')->name('dewan');

// //Struktur
// Route::get('/struktur', 'Frontend\About\StrukturAchievementController@index')->name('struktur');

// //CSR
// Route::get('/csr', 'Frontend\About\CSRController@index')->name('csr');


// /*Menu Layanan Jalan Tol*/
// //Struk
// Route::get('/struk', 'StrukController@index')->name('struk');
// Route::get('/struk-export', 'StrukController@cetak_data_transaksi')->name('struk-export');
// Route::post('/struk-dd', 'StrukController@tes')->name('struk-export');
// // Route::get('/struk-cari', 'StrukController@cari')->name('cari');
// Route::get('/str', function(){
	
// 	return view('frontend/pages/data-transaksi');
// });

// //CCTV
// Route::get('/cctv1', 'Frontend\MaintenanceController@index');

// Route::get('/cctv', 'Frontend\MaintenanceController@index')->name('cctv');

// // Route::get('/cctv1', 'CctvController@indexx');

// // Route::get('/cctv', 'CctvController@index')->name('cctv');
// // Route::get('/cctv', function(){
// //     return view('errors/maintenance');
// // })->name('cctv');

// //Information Tarif
// Route::get('/tarif', 'TarifController@index')->name('tarif');

// //Rest Area
// Route::get('/rest-area', 'RestAreaController@index')->name('rest-area');

// //Call Center
// Route::get('/call-center', 'CallCenterController@index')->name('call-center');

// /*Menu Lokasi Terdekat*/
// //Nearby Location
// Route::get('/nearby', 'NearbyController@index')->name('nearby');
// Route::get('detail/{id}','NearbyController@getDetailNearby');

// /*Menu Media*/
// //Billboard
// Route::get('/billboard', 'BillboardController@index')->name('billboard');

// //Media
// Route::get('/media', 'MediaController@index')->name('media');
// Route::get('/media/{id}', 'MediaController@detail')->name('media-detail');

// /*Menu Hubungi Kami*/
// //Contact Us
// Route::get('/contact-us', 'ContactUsController@index')->name('contact-us');

// /*Menu Karir*/


// /*Unknown*/
// //About Us
// Route::get('/about-us', 'AboutController@index')->name('about-us');

// //Map
// Route::get('/map', 'MapController@index')->name('map');

/*End*/
Auth::routes();

// Route::get('/profil-user', 'HomeController@index')->name('home');

// /*tender*/
// Route::get('/tender', 'Frontend\TenderController@index')->name('tender');
// Route::get('/tender/{id}', 'Frontend\TenderController@detail')->name('tender-detail');

// // Route::get('/struk-print', 'StrukController@print')->name('print');
// Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login-form');
// Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
// Route::post('/kartu', [App\Http\Controllers\User\KartuController::class, 'store'])->name('kartu-store');
Route::get('refresh-csrf', function(){
    return csrf_token();
});
// Route::get('/kartu/{id}/edit',[App\Http\Controllers\User\KartuController::class, 'edit_profile']);
// Route::post('/profile/update',[App\Http\Controllers\HomeController::class, 'update'])->name('profile-update');

// //maintenance
// Route::get('/maintenance', 'Frontend\MaintenanceController@index')->name('maintenance');