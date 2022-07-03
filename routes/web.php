<?php

use App\Http\Controllers\AStarController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FloydWarshallController;
use App\Http\Controllers\ImportKajianController;
use App\Http\Controllers\KajianIslamiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SaranController;
use App\Http\Controllers\TestingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

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
    return view('home.index');
});

Route::get('/about', function () {
    return view('home.about');
});

//Kontribusi
// Route::get('/kontribusi', [KontribusiController::class, 'index'])->name('kontribusi');
// Route::post('/kontribusi', [KontribusiController::class, 'post'])->name('kontribusi.post');

Route::get('/saran', [SaranController::class, 'index'])->name('saran');
Route::post('/saran-post', [SaranController::class, 'post'])->name('saran-post');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/post-login', [AuthController::class, 'postLogin'])->name('post-login');
Route::post('/post-register', [AuthController::class, 'post_register'])->name('post-register');
Route::get("/logout", [AuthController::class, 'logout'])->name("logout");


Route::get('/register', [AuthController::class, 'register'])->name('register');

Route::get('/forgot-password', [AuthController::class, 'forgotpassword'])->name('forgot-password');

Route::post('/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);

    $status = Password::sendResetLink(
        $request->only('email')
    );

    return $status === Password::RESET_LINK_SENT
                ? back()->with(['info' => __($status)])
                : back()->withErrors(['email' => __($status)]);
})->middleware('guest')->name('password.email');

Route::get('/reset-password/{token}', function ($token) {
    return view('auth.reset-password', ['token' => $token]);
})->middleware('guest')->name('password.reset');

Route::post('/reset-password', function (Request $request) {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8|confirmed',
    ]);

    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function ($user, $password) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->setRememberToken(Str::random(60));

            $user->save();

            event(new PasswordReset($user));
        }
    );

    return $status === Password::PASSWORD_RESET
                ? redirect()->route('login')->with('info', __($status))
                : back()->withErrors(['email' => [__($status)]]);
})->middleware('guest')->name('password.update');


Route::group(['middleware' => ['auth', 'checkRole:admin']], function(){


    Route::get('/dashboard/index', [DashboardController::class, 'index'])->name('dashboard.index');

// Kajian Islami
    Route::get('/dashboard/kajian-islami', [KajianIslamiController::class, 'index'])->name('kajianislami');
    Route::post('/dashboard/kajian-islami/store', [KajianIslamiController::class, 'store'])->name('kajianislami.store');
    Route::get('/dashboard/kajian-islami/{id}/edit', [KajianIslamiController::class, 'edit']);
    Route::post('/dashboard/kajian-islami/{id}/update', [KajianIslamiController::class, 'update']);
    Route::get('/dashboard/kajian-islami/{id}/destroy', [KajianIslamiController::class, 'destroy']);
    Route::get('/dashboard/kajian-islami/tambah-rute', [KajianIslamiController::class, 'tambah_rute'])->name("kajian-islami-tambah-rute");
    Route::post('/dashboard/kajian-islami/tambah-rute/store', [KajianIslamiController::class, 'tambah_rute_store'])->name("kajian-islami-tambah-rute-store");

//Algoritma Floyd Warshall
    Route::get('/dashboard/floyd-warshall', [FloydWarshallController::class, 'index'])->name('floydwarshall.index');
    Route::post('/dashboard/floyd-warshall', [FloydWarshallController::class, 'store'])->name('floydwarshall.store');

//Algoritma A Star
    Route::get('/dashboard/a-star', [AStarController::class, 'index'])->name('astar.index');
    Route::post('/dashboard/a-star', [AStarController::class, 'store'])->name('astar.store');

//Pengguna
    Route::get('/dashboard/list-pengguna', [UserController::class, 'index'])->name('user.index');
    Route::get('/dashboard/list-pengguna/destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy');

//Saran dan Masukan
    Route::get('/dashboard/saran', [SaranController::class, 'show'])->name('saran.index');

//Profile
    Route::get('/dashboard/profile', [ProfileController::class, 'index'])->name('profile.index');

//Import Kajian
    Route::post('/dashboard/kajian-islami/import', [ImportKajianController::class, 'index'])->name('importkajian.index');
});

Route::group(['middleware' => ['auth', 'checkRole:admin,masyarakatumum']], function(){


    Route::get('/dashboard/index', [DashboardController::class, 'index'])->name('dashboard.index');
//Algoritma Floyd Warshall
    Route::get('/dashboard/floyd-warshall', [FloydWarshallController::class, 'index'])->name('floydwarshall.index');
    Route::post('/dashboard/floyd-warshall', [FloydWarshallController::class, 'store'])->name('floydwarshall.store');

//Algoritma A Star
    Route::get('/dashboard/a-star', [AStarController::class, 'index'])->name('astar.index');
    Route::post('/dashboard/a-star', [AStarController::class, 'store'])->name('astar.store');

//Pengguna
    Route::get('/dashboard/list-pengguna', [UserController::class, 'index'])->name('user.index');
    Route::get('/dashboard/list-pengguna/destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy');

//Profile
    Route::get('/dashboard/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::post('/dashboard/profile/update', [ProfileController::class, 'update'])->name('profile.update');
});


Route::get('/testing', [TestingController::class, 'index'])->name("testing");
