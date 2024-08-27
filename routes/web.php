<?php


use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContohController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PaginationController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\EmailController;


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

Route::get('/', function () {
    return view('auth.login');
});

// Route::get('/', 'App\Http\Controllers\PegawaiController@index')->name('pegawai.index');
Route::get('/halo', function() {
    return "Halo semuanya";
});

Route::get('/logout',  'App\Http\Controllers\LoginController@logout');

Route::get('home', [HomeController::class,'index']);
Route::get('home/show_html',[HomeController::class,'show_html']);
Route::get('home/belajar_blade',[HomeController::class,'belajar_blade']);
Route::get('home/penggunaan_layout',[HomeController::class,'penggunaan_layout']);

Route::get('home/contoh',[HomeController::class,'contoh']);
Route::post('home/contoh',[HomeController::class,'contoh_post']);


// Route::get('/contoh',[ContohController::class,'index']);
// Route::get('/contoh/create',[ContohController::class,'create']);
// Route::get('/contoh/create',[ContohController::class,'store']);
// Route::resource('contoh',ContohController::class);
// Route::resource('Pegawai',PegawaiController::class);

    Route::get('pegawai', 'App\Http\Controllers\PegawaiController@index')->name('pegawai.index');
	Route::post('/pegawai/getdata', 'App\Http\Controllers\PegawaiController@getData')->name('get.data');

    Route::get('pegawai/create', 'App\Http\Controllers\PegawaiController@create')->name('pegawai.create');
    Route::post('pegawai/store', 'App\Http\Controllers\PegawaiController@store')->name('pegawai.store');
	Route::get('/asset/show/{id}', 'App\Http\Controllers\PegawaiController@show')->name('pegawai.show');
    Route::get('pegawai/{id}/edit', 'App\Http\Controllers\PegawaiController@edit')->name('pegawai.edit');
    Route::post('pegawai/update/{id}', 'App\Http\Controllers\PegawaiController@update')->name('pegawai.update');
    Route::delete('pegawai/delete/{id}', 'App\Http\Controllers\PegawaiController@destroy')->name('pegawai.delete');

    //Routing Asset
		// Route::get('/asset', 'AssetController@index')->name('asset');
		// Route::post('/asset/getdata', 'AssetController@getData')->name('asset.data');

		// Route::get('/asset/show/{id}', 'AssetController@show')->name('asset.show');

		// Route::get('/asset/edit/{id}', 'AssetController@edit')->name('asset.edit');
		// Route::post('/asset/saveedit/{id}', 'AssetController@saveEdit')->name('asset.saveedit');

		// Route::get('/asset/create', 'AssetController@create')->name('asset.create');
		// Route::post('/asset/savecreate', 'AssetController@saveCreate')->name('asset.savecreate');

		// Route::delete('/asset/delete/{id?}', 'AssetController@delete')->name('asset.delete');

		// Route::post('/asset/rekap/{id}', 'AssetController@rekap')->name('asset.rekap');
		// Route::post('/asset/rekapdp/{id}', 'AssetController@rekapdp')->name('asset.rekapdp');

//Route get => pegawai => index
//Route get => pegawai/create => create
//Route get => pegawai => store
//Route get => pegawai/{id} => show
//Route post => pegawai/{id} => update
//Route delete => pegawai/{id} => delete
//Route get => pegawai/{id}/edit => edit

// Route::get('/pagination',[PaginationController::class,'index']);
// Route::get('/pagination/show_api',[PaginationController::class,'show_api']);


Route::post('/importpegawai','App\Http\Controllers\PegawaiController@pegawaiimportexcel')->name('importpegawai');
Route::get('/exportpegawai','App\Http\Controllers\PegawaiController@pegawaiexport')->name('exportpegawai');
Route::get('cetak-pegawai', 'App\Http\Controllers\PegawaiController@cetakPegawai')->name('cetak-pegawai');

// Route::get('/login', 'App\Http\Controllers\Auth\LoginController@logout')->name('/login');
// Route::get('send-mail', function () {

//     $details = [
//         'title' => 'Mail from Medikre.com',
//         'body' => 'This is for testing email using smtp'
//     ];

   
//     \Mail::to('faathirizak00@gmail.com')->send(new \App\Mail\MyTestMail($details));

//     dd("Email is Sent.");
// });

route::get('email',[EmailController::class,'index']);


// Auth::routes(['verify=>true']);

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });









// Route::get('/dashboard', function () {
//     return view('index');
// });


// Route::get('/login', 'LoginController@index')->name('login')->middleware('login');
// Route::post('/login', 'App\Http\Controllers\LoginController@authenticate');
// Route::post('/logout', 'App\Http\Controllers\LoginController@logout');






