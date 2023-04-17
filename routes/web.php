<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    $articles = \App\Models\Article::all();
    return view('pages.mainPage', ['articles'=>$articles]);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::view('/addArticle', 'pages.addArticle');
Route::post('/addArticle', [ArticleController::class, 'addArticle']);
Route::get('/article/{id}', [ArticleController::class, 'showArticleById']);
Route::get('/profile', function (){
    $user = auth()->user();
    return view('pages.profile', ['user'=>$user]);
});
Route::post('/updateUserData', function (\Illuminate\Http\Request $request){
    $name = $request->nameSpan;
    $lastname = $request->lastnameSpan;
    $userID = auth()->user()->getAuthIdentifier();
    $user = \App\Models\User::where('id', $userID)->first();
    if(!empty($name)){
        $user->name = $name;
    }elseif(!empty($lastname)){
        $user->lastname = $lastname;
    }
    $user->save();
    return json_encode(['result'=>'success']);
});
Route::post('/changeUserAvatar', function (\Illuminate\Http\Request $request){
    $path =  $request->file('userAvatar')->store('public/avatars');
    $path = str_replace('public', 'storage', $path);
    // public/avatars/Lb1d7Pj8zQ8aCzbDFAtBr5UUF9dXPtbCsZ82JPa4.jpg
    // storage/avatars/Lb1d7Pj8zQ8aCzbDFAtBr5UUF9dXPtbCsZ82JPa4.jpg
    $userID = auth()->user()->getAuthIdentifier();
    $user = \App\Models\User::where('id', $userID)->first();
    $user->img = $path;
    $user->save();
    return redirect()->intended('/profile');
});

/*Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});*/

require __DIR__.'/auth.php';
