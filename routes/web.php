<?php

use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\ExecutableFinder;
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

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::post('/add', function(\Illuminate\Http\Request $request){

    $request->validate([
        'num1' => 'required|integer',
        'num2' => 'required|integer',
    ]);
    $process = new Process([
        'python3',
        app_path('Scripts-python/add.py'),
        $request->get('num1'),
        $request->get('num2')
    ]);
    $process->run();
    if (!$process->isSuccessful()) {
        throw new ProcessFailedException($process);
    }
    echo $process->getOutput();

})->name("add.post");
