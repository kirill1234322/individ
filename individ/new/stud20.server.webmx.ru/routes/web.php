<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// сработает на http://muzei-mira/
Route::get ('/', [MainController::class, "acMain"]);


Route::get ('/blog', [MainController::class, "acblog"]);

// сработает на http://muzei-mira/novosti
Route::get ('/novosti', [MainController::class, "acNovosti"]);

// сработает на http://muzei-mira/zhivopis
Route::get ('/history', [MainController::class, "acHistory"]);


// сработает на 
// http://muzei-mira/zhivopis/russkaya-zhivopis
// http://muzei-mira/zhivopis/ispanskaya-zhivopis и др.
Route::get ('/history/{subzhivopis}', [MainController::class, "acSubhistory"]);

// сработает на http://muzei-mira/opportunities
Route::get ('/opportunities', [MainController::class, "acOpportunities"]);

// сработает на http://muzei-mira/browser
Route::get ('/browser', [MainController::class, "acBrowser"]);

// сработает на 
// http://muzei-mira/goroda/moskva
// http://muzei-mira/goroda/barselona и др.
Route::get ('/goroda/{subgorod}', [MainController::class, "acSubGoroda"]);

// сработает на http://muzei-mira/css
Route::get ('/neobychnye-muzei-mira', [MainController::class, "acNeobychnyemuzei"]);

// сработает на http://muzei-mira/console
Route::get ('/console', [AdminController::class, "acConsole"]);

Route::post ('/form',  [AdminController::class, "acAddConsole"]);

Route::post ('/admin/add2',  [AdminController::class, "acAdminConsole"]);
 
Route::get ('/{pages}',  [MainController::class, "acNewFile"]);

// сработает на http://muzei-mira/console/update/{параметр}
// запрос на вывод страницы обновления записи
Route::get ('/console/update/{id}', [AdminController::class, "acConsoleFormUpdate"]);

Route::get ('/console/go/{id}', [AdminController::class, "acConsoleFormGO"]);


// сработает на http://muzei-mira/console/add
// запрос на вывод страницы добавления записи
// обратите внимание - исползуется POST-запрос
Route::post ('/console/add', [AdminController::class, "acConsoleFormAdd"]);

// сработает на http://muzei-mira/admin/modification
// обратите внимание - исползуется POST-запрос
// передаем данные формы на обновление / добавление данных
Route::post ('/admin/modification',  [AdminController::class, "acDataModification"]);

// сработает на http://muzei-mira/admin/delete/{параметр}
// выполняем запрос на удаление данных
Route::get ('/admin/delete/{id}',  [AdminController::class, "acDataDelete"]);
