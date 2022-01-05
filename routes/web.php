<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\DarkModeController;
use App\Http\Controllers\{
    DashboardController,
    OrtuController,
    KeluargaController,
    PasanganController,
    PengantarNikahController,
    PermohonanNikahController,
    PersetujuanNikahController,
    IzinNikahController,
    KematianPasanganController,
    UserController,
    KelahiranController,
    KematianController,
    

};

// use App\Models\Pegawai;


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

Route::get('dark-mode-switcher', [DarkModeController::class, 'switch'])->name('dark-mode-switcher');

Route::middleware('loggedin')->group(function() {
    Route::get('login', [AuthController::class, 'loginView'])->name('login-view');
    Route::post('login', [AuthController::class, 'login'])->name('login');
    Route::get('register', [AuthController::class, 'registerView'])->name('register-view');
    Route::post('register', [AuthController::class, 'register'])->name('register');
    
});

Route::middleware('auth')->group(function() {
    
    Route::group(['middleware'=>['auth','role:user,su']],function(){
    
        Route::get('logout', [AuthController::class, 'logout'])->name('logout');
        //Data Keluarga Manage
        Route::get('keluarga', [KeluargaController::class, 'index'])->name('keluarga');
        Route::post('keluargaadd', [KeluargaController::class, 'keluargaadd'])->name('keluargaadd');
        Route::get('keluargaedit', [KeluargaController::class, 'keluargaedit'])->name('keluargaedit');
        Route::POST('keluargaupdate', [KeluargaController::class, 'keluargaupdate'])->name('keluargaupdate');
        Route::get('keluargadelete/{id}', [KeluargaController::class, 'destroy'])->name('keluargadelete');

        //Data Ortu Manage
        Route::get('ortu', [OrtuController::class, 'index'])->name('ortu');
        Route::post('ayahadd', [OrtuController::class, 'ayahadd'])->name('ayahadd');
        Route::get('ayahget', [OrtuController::class, 'ayahget'])->name('ayahget');
        Route::get('ibuget', [OrtuController::class, 'ibuget'])->name('ibuget');
        Route::post('ibuadd', [OrtuController::class, 'ibuadd'])->name('ibuadd');
        Route::get('ayahedit', [OrtuController::class, 'ayahedit'])->name('ayahedit');
        Route::get('ibuedit', [OrtuController::class, 'ibuedit'])->name('ibuedit');
        Route::POST('ayahupdate', [OrtuController::class, 'ayahupdate'])->name('ayahupdate');
        Route::POST('ibuupdate', [OrtuController::class, 'ibuupdate'])->name('ibuupdate');
        Route::get('ayahdelete/{id}', [OrtuController::class, 'ayahdelete'])->name('ayahdelete');
        Route::get('ibudelete/{id}', [OrtuController::class, 'ibudelete'])->name('ibudelete');

        //Data Pasangan Manage
        Route::get('pasangan', [PasanganController::class, 'index'])->name('pasangan');
        Route::post('pasanganadd', [PasanganController::class, 'pasanganadd'])->name('pasanganadd');
        Route::get('pasanganedit', [PasanganController::class, 'pasanganedit'])->name('pasanganedit');
        Route::POST('pasanganupdate', [PasanganController::class, 'pasanganupdate'])->name('pasanganupdate');
        Route::get('pasangandelete/{id}', [PasanganController::class, 'destroy'])->name('pasangandelete');

        //Data Pengantar Nikah Manage
        Route::get('pengantar', [PengantarNikahController::class, 'index'])->name('pengantar');
        Route::POST('pengantaradd', [PengantarNikahController::class, 'pengantaradd'])->name('pengantaradd');
        Route::get('pengantaredit', [PengantarNikahController::class, 'pengantaredit'])->name('pengantaredit');
        Route::POST('pengantarupdate', [PengantarNikahController::class, 'pengantarupdate'])->name('pengantarupdate');
        Route::get('pengantardelete/{id}', [PengantarNikahController::class, 'destroy'])->name('pengantardelete');
        Route::get('pengantarcetak/{id}', [PengantarNikahController::class, 'pengantarcetak'])->name('pengantarcetak');

        //Data Permohonan Nikah Manage
        Route::get('permohonan', [PermohonanNikahController::class, 'index'])->name('permohonan');
        Route::POST('permohonanadd', [PermohonanNikahController::class, 'permohonanadd'])->name('permohonanadd');
        Route::get('permohonanedit', [PermohonanNikahController::class, 'permohonanedit'])->name('permohonanedit');
        Route::POST('permohonanupdate', [PermohonanNikahController::class, 'permohonanupdate'])->name('permohonanupdate');
        Route::get('permohonandelete/{id}', [PermohonanNikahController::class, 'destroy'])->name('permohonandelete');
        Route::get('permohonancetak/{id}', [PermohonanNikahController::class, 'permohonancetak'])->name('permohonancetak');

        //Data Persetujuan Nikah Manage
        Route::get('persetujuan', [PersetujuanNikahController::class, 'index'])->name('persetujuan');
        Route::POST('persetujuanadd', [PersetujuanNikahController::class, 'persetujuanadd'])->name('persetujuanadd');
        Route::get('persetujuanedit', [PersetujuanNikahController::class, 'persetujuanedit'])->name('persetujuanedit');
        Route::POST('persetujuanupdate', [PersetujuanNikahController::class, 'persetujuanupdate'])->name('persetujuanupdate');
        Route::get('persetujuandelete/{id}', [PersetujuanNikahController::class, 'destroy'])->name('persetujuandelete');
        Route::get('persetujuancetak/{id}', [PersetujuanNikahController::class, 'persetujuancetak'])->name('persetujuancetak');

        //Data Izin Nikah Manage
        Route::get('izin', [IzinNikahController::class, 'index'])->name('izin');
        Route::POST('izinadd', [IzinNikahController::class, 'izinadd'])->name('izinadd');
        Route::get('izinedit', [IzinNikahController::class, 'izinedit'])->name('izinedit');
        Route::POST('izinupdate', [IzinNikahController::class, 'izinupdate'])->name('izinupdate');
        Route::get('izindelete/{id}', [IzinNikahController::class, 'destroy'])->name('izindelete');
        Route::get('izincetak/{id}', [IzinNikahController::class, 'izincetak'])->name('izincetak');

        //Data Kematian Pasangan Nikah Manage
        Route::get('kematian_pasangan', [KematianPasanganController::class, 'index'])->name('kematian_pasangan');
        Route::get('kematian_pasangan_get_id', [KematianPasanganController::class, 'kematian_pasangan_get_id'])->name('kematian_pasangan_get_id');
        Route::POST('kematian_pasanganadd', [KematianPasanganController::class, 'kematian_pasanganadd'])->name('kematian_pasanganadd');
        Route::get('kematian_pasanganedit', [KematianPasanganController::class, 'kematian_pasanganedit'])->name('kematian_pasanganedit');
        Route::POST('kematian_pasanganupdate', [KematianPasanganController::class, 'kematian_pasanganupdate'])->name('kematian_pasanganupdate');
        Route::get('kematian_pasangandelete/{id}', [KematianPasanganController::class, 'destroy'])->name('kematian_pasangandelete');
        Route::get('kematian_pasangancetak/{id}', [KematianPasanganController::class, 'kematian_pasangancetak'])->name('kematian_pasangancetak');

        //Management Kelahiran 
        Route::get('kelahiran', [KelahiranController::class, 'index'])->name('kelahiran');
        Route::post('kelahiranadd', [KelahiranController::class, 'kelahiranadd'])->name('kelahiranadd');
        Route::get('kelahiranedit', [KelahiranController::class, 'kelahiranedit'])->name('kelahiranedit');
        Route::post('kelahiranupdate', [KelahiranController::class, 'kelahiranupdate'])->name('kelahiranupdate');
        Route::get('kelahirandelete/{id}', [KelahiranController::class, 'destroy'])->name('kelahirandelete');
        Route::get('kelahirancetak/{id}', [KelahiranController::class, 'kelahirancetak'])->name('kelahirancetak');


        //Management Kematian 
        Route::get('kematian', [KematianController::class, 'index'])->name('kematian');
        Route::post('kematianadd', [KematianController::class, 'kematianadd'])->name('kematianadd');
        Route::get('kematianedit', [KematianController::class, 'kematianedit'])->name('kematianedit');
        Route::post('kematianupdate', [KematianController::class, 'kematianupdate'])->name('kematianupdate');
        Route::get('kematiandelete/{id}', [KematianController::class, 'destroy'])->name('kematiandelete');
        Route::get('kematiancetak/{id}', [KematianController::class, 'kematiancetak'])->name('kematiancetak');


    });
    Route::group(['middleware'=>['auth','role:su']],function(){

        //Management User 
        Route::get('user', [UserController::class, 'index'])->name('user');
        Route::post('useradd', [UserController::class, 'store'])->name('useradd');
        Route::get('useredit', [UserController::class, 'edit'])->name('useredit');
        Route::post('userupdate', [UserController::class, 'update'])->name('userupdate');
        Route::get('userdelete/{id}', [UserController::class, 'destroy'])->name('userdelete');

    });

        // Gocay Routing
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    

});
