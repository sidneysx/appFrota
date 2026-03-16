<?php

use App\Http\Controllers\MultaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RevisaoController;
use App\Http\Controllers\SolicitarAcessoController;
use App\Http\Controllers\VeiculoController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*Redirecionamento de Login */
Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('dashboard');
    }
    return redirect()->route('login');
});
// Route::get('/register', function () {
//     if (Auth::check()) {
//         return redirect()->route('dashboard');
//     }
//     return redirect()->route('login');
// });

/*Pagina onde vai escolher pra onde ir*/
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

/*Se tiver permissão vai para a rota clicada, se nao tiver vai usar mid para mandar pra solicitar acesso */
// Route::get('/manutencao', [VeiculoController::class, 'index'])
//     ->middleware('modulo:manutencao')
//     ->name('manutencao');
    
Route::middleware(['auth', 'modulo:manutencao'])
    ->resource('veiculos', VeiculoController::class);


Route::middleware(['auth', 'modulo:multas'])
    ->resource('multas', MultaController::class);


Route::get('solicitar-acesso', [SolicitarAcessoController::class, 'index'])
    ->middleware('auth')
    ->name('solicitar-acesso');

Route::get('/veiculos/{veiculo}/revisoes', [RevisaoController::class, 'index'])->name('revisoes.index');
Route::get('/veiculos/{veiculo}/revisoes/create', [RevisaoController::class, 'create'])->name('revisoes.create');
Route::post('/veiculos/{veiculo}/revisoes', [RevisaoController::class, 'store'])->name('revisoes.store');
Route::get('/revisoes/{revisao}/edit', [RevisaoController::class, 'edit'])->name('revisoes.edit');
Route::put('/revisoes/{revisao}', [RevisaoController::class, 'update'])->name('revisoes.update');
Route::delete('/revisoes/{revisao}', [RevisaoController::class, 'destroy'])->name('revisoes.destroy');


Route::middleware('auth')->group(function () {
    //Editar Perfil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});






require __DIR__.'/auth.php';
