<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\CertificateController;
use App\Http\Controllers\Admin\CertificateTypeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\ACLController;
use App\Http\Controllers\Admin\DiagnosesController;
use App\Http\Controllers\Admin\PatientController;
use App\Http\Controllers\Admin\HospitalController;
use App\Http\Controllers\Admin\ProvinceController;
use App\Http\Controllers\Admin\StaffController;
// use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\HomeController;
use App\Models\Role;
use App\Models\Permission;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Route::get('test123', function () {
//    $role =  Role::find(1);
//    $permissions =  Permission::where('role_id', 1);
//    dd($role->permissions,$permissions);
// });
Route::get('/', [HomeController::class, 'index'])->name('home');

use Stichoza\GoogleTranslate\GoogleTranslate;
Route::get('/test', function () {

$tr = new GoogleTranslate('en'); // Translates into English
echo $tr->setSource('en')->setTarget('es')->translate('Goodbye');
dd($tr);
    return view('mails.certificate-created');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->group(function () {


    Route::prefix('dashboard')->controller(DashboardController::class)->group(function () {
        Route::get('/', 'index')->name('dashboard')->middleware('can:Dashboard-read');
    });

        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        Route::prefix('admin')->as('admin.')->group(function () {
        Route::prefix('menu')->as('menu.')->controller(MenuController::class)->group(function () {
        Route::get('/', 'index')->name('index')->middleware('can:Menu-read');
        Route::post('/store', 'store')->name('store')->middleware('can:Menu-create');
        Route::post('/update', 'update')->name('update')->middleware('can:Menu-update');
        });

        Route::prefix('permission')->as('permission.')->controller(PermissionController::class)->group(function () {
        Route::get('/', 'index')->name('index')->middleware('can:Permission-read');
        Route::get('/view/{role}', 'view')->name('view')->middleware('can:Permission-read');
        Route::get('/create', 'create')->name('create')->middleware('can:Permission-create');
        Route::post('/store', 'store')->name('store')->middleware('can:Permission-create');
        Route::get('/edit/{role}', 'edit')->name('edit')->middleware('can:Permission-update');
        Route::post('/update', 'update')->name('update')->middleware('can:Permission-update');
        Route::post('/destroy', 'destroy')->name('destroy')->middleware('can:Permission-delete');
        });

       //Province
        Route::prefix('provinces')->as('provinces.')->controller(ProvinceController::class)->group(function () {
        Route::get('/', 'index')->name('index')->middleware('can:Province-read');
        Route::post('/', 'list')->name('list')->middleware('can:Province-read');
        Route::get('/create', 'create')->name('create')->middleware('can:Province-create');
        Route::post('/store', 'store')->name('store')->middleware('can:Province-create');
        Route::get('/search', 'searchProvinces')->name('search');
        Route::get('/edit/{id}', 'edit')->name('edit')->middleware('can:Province-update');
        Route::post('/update/{id}', 'update')->name('update')->middleware('can:Province-update');
        Route::get('/destroy/{id}', 'destroy')->name('destroy')->middleware('can:Province-delete');
        Route::get('/states', 'fetchStatesByCountry')->name('fetchState');
        Route::get('/cities', 'fetchCitiesByState')->name('fetchCities');
        });

        //Hospital
        Route::prefix('hospitals')->as('hospitals.')->controller(HospitalController::class)->group(function () {
        Route::get('/', 'index')->name('index')->middleware('can:Hospital-read');
        Route::post('/', 'list')->name('list')->middleware('can:Hospital-read');
        Route::get('/create', 'create')->name('create')->middleware('can:Hospital-create');
        Route::post('/store', 'store')->name('store')->middleware('can:Hospital-create');
        Route::get('/edit/{id}', 'edit')->name('edit')->middleware('can:Hospital-update');
        Route::post('/update/{id}', 'update')->name('update')->middleware('can:Hospital-update');
        Route::get('/destroy/{id}', 'destroy')->name('destroy')->middleware('can:Hospital-delete');
        Route::get('/states', 'fetchStatesByCountry')->name('fetchState');
        Route::get('/cities', 'fetchCitiesByState')->name('fetchCities');

        });

        //Staff
        Route::prefix('staff')->as('staff.')->controller(StaffController::class)->group(function () {
        Route::get('/', 'index')->name('index')->middleware('can:Staff-read');
        Route::post('/', 'list')->name('list')->middleware('can:Staff-read');
        Route::get('/create', 'create')->name('create')->middleware('can:Staff-create');
        Route::post('/store', 'store')->name('store')->middleware('can:Staff-create');
        Route::get('/edit/{id}', 'edit')->name('edit')->middleware('can:Staff-update');
        Route::post('/update/{id}', 'update')->name('update')->middleware('can:Staff-update');
        Route::get('/destroy/{id}', 'destroy')->name('destroy')->middleware('can:Staff-delete');
        });

        //Diagnoses
        Route::prefix('diagnoses')->as('diagnoses.')->controller(DiagnosesController::class)->group(function () {
        Route::get('/', 'index')->name('index')->middleware('can:Diagnoses-read');
        Route::post('/', 'list')->name('list')->middleware('can:Diagnoses-read');
        Route::get('/diagnoses/modal/{id}', 'modal')->name('modal');
        Route::get('/create', 'create')->name('create')->middleware('can:Diagnoses-create');
        Route::post('/store', 'store')->name('store')->middleware('can:Diagnoses-create');
        Route::get('/edit/{role}', 'edit')->name('edit')->middleware('can:Diagnoses-update');
        Route::post('/update/{id}', 'update')->name('update')->middleware('can:Diagnoses-update');
        Route::get('/destroy/{id}', 'destroy')->name('destroy')->middleware('can:Diagnoses-delete');
        });

        //Patient
        Route::prefix('patients')->as('patients.')->controller(PatientController::class)->group(function () {
        Route::get('/', 'index')->name('index')->middleware('can:Patient-read');
        Route::post('/', 'list')->name('list')->middleware('can:Patient-read');
        Route::get('/create', 'create')->name('create')->middleware('can:Patient-create');
        Route::post('/store', 'store')->name('store')->middleware('can:Patient-create');
        Route::get('/edit/{role}', 'edit')->name('edit')->middleware('can:Patient-update');
        Route::post('/update/{id}', 'update')->name('update')->middleware('can:Patient-update');
        Route::get('/destroy/{id}', 'destroy')->name('destroy')->middleware('can:Patient-delete');
        });

        // Settings
        Route::prefix('setting')->as('setting.')->controller(SettingController::class)->group(function () {
        Route::get('/', 'index')->name('index')->middleware('can:Setting-read');
        Route::post('/', 'update')->name('update')->middleware('can:Setting-update');
        });

    });
});

require __DIR__.'/auth.php';
