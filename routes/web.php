<?php

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

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/welcome', function () {
    return view('/pages/home/welcome');
})->name('welcome');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/control', 'AsistenciaController@index')->name('control');
    Route::get('/asistencia/habilitar', 'AsistenciaController@habilitarAsistencia')->name('asistencia.habilitar');
    Route::get('/verificar/{codigo}', 'AsistenciaController@verificarAcceso')->name('verificar.acceso');
});
//USUARIO
Route::group(['middleware' => ['auth']], function () {
    Route::resource('usuario','UsuarioController');
});
//ROL
Route::group(['middleware' => ['auth']], function () {
    Route::get('rol/{rol}/permisos', 'RolController@editPermisos')->name('rol.permisos.edit');
});
Route::group(['middleware' => ['auth']], function () {
    Route::put('rol/{rol}/permisos', 'RolController@updatePermisos')->name('rol.permisos.update');
});
Route::group(['middleware' => ['auth']], function () {
    Route::resource('rol', 'RolController');
});
//ALUMNO
Route::group(['middleware' => ['auth']], function () {
    Route::resource('curso', 'CursoController');
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/alumno', 'AlumnoController@index')->name('alumno');
});
Route::group(['middleware' => ['auth']], function () {
    Route::get('/alumno/create', 'AlumnoController@create')->name('alumno/create');
});
Route::group(['middleware' => ['auth']], function () {
    Route::post('/alumno/create', 'AlumnoController@store')->name('alumno/store');
});
Route::group(['middleware' => ['auth']], function () {
    Route::get('/alumno/{id}/edit', 'AlumnoController@edit')->name('alumno/edit');
    Route::get('/alumno/{id}/reporte', 'AlumnoController@reporteAsistencias')->name('alumno.reporte');
});
Route::group(['middleware' => ['auth']], function () {
    Route::put('/alumno/{id}/edit', 'AlumnoController@update')->name('alumno/update');
});
Route::group(['middleware' => ['auth']], function () {
    Route::delete('/alumno/{id}', 'AlumnoController@destroy')->name('alumno/delete');
});
//GRUPO
Route::group(['middleware' => ['auth']], function () {
    Route::resource('grupo', 'GrupoController');
});

//PLAN
Route::group(['middleware' => ['auth']], function () {
    Route::resource('plan', 'PlanController');
});

//CONTRATO
Route::group(['middleware' => ['auth']], function () {
    Route::resource('contrato', 'ContratoController');
    Route::get('/buscarCodigo/{codigo}', 'ContratoController@buscarCodigoEstudiante');
});

//PAGO
Route::group(['middleware' => ['auth']], function () {
    Route::resource('pago', 'PagoController');
});

//COBRO
Route::group(['middleware' => ['auth']], function () {
    Route::resource('cobro', 'CobroController');
});

//ASISTENCIA


// Demo routes
Route::get('/datatables', 'PagesController@datatables');
Route::get('/ktdatatables', 'PagesController@ktDatatables');
Route::get('/select2', 'PagesController@select2');
Route::get('/jquerymask', 'PagesController@jQueryMask');
Route::get('/icons/custom-icons', 'PagesController@customIcons');
Route::get('/icons/flaticon', 'PagesController@flaticon');
Route::get('/icons/fontawesome', 'PagesController@fontawesome');
Route::get('/icons/lineawesome', 'PagesController@lineawesome');
Route::get('/icons/socicons', 'PagesController@socicons');
Route::get('/icons/svg', 'PagesController@svg');

// Quick search dummy route to display html elements in search dropdown (header search)
Route::get('/quick-search', 'PagesController@quickSearch')->name('quick-search');

require __DIR__.'/auth.php';
