<?php

use App\Models\User;
use App\Livewire\GivePage;
use App\Livewire\Dashboard;
use App\Livewire\FocusForm;
use Illuminate\Http\Request;
use App\Livewire\DashboardFaq;
use App\Livewire\GenerateLink;
use App\Livewire\DashboardProfile;
use App\Livewire\DashboardSettings;
use Illuminate\Support\Facades\Route;
use App\Livewire\IndividualCollection;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\PaystackPaymentController;


Route::get('/', function () {
    // dd(User::where('id', auth()->id())->value('email'));
    return view('welcome')->with('username', auth()->id() ? User::where('id', auth()->id())->value('email') : 'Nobody man');
})->name('home');

// ------------ Registration -----------------
Route::get('login', function() {
    return view('login');
})->name('login');

Route::post('login', [User::class, 'login']);

Route::get('register', function() {
    return view('signup');
})->name('register');

Route::post('register', function(Request $request){
    $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);
   $user = User::firstOrNew($request->except(['_token']));
   $user->name = $request->input('email');
   $user->save();

   if(! auth()->attempt($request->only(['email', 'password']))){
        return redirect()->route('register');
   }
   return redirect()->route('dashboard');
});

// Google Logins
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('auth.google');

Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback'])->name('auth.google.callback');

// ------------ Payment ---------------
Route::get('/pay/{url}', GivePage::class)->name('pay');
Route::get('/payment/callback', [PaystackPaymentController::class, 'handleGatewayCallback']);
// Route::get('https://checkout.paystack.com/{r}', function(){
//     return redirect()->away("https://checkout.paystack.com/xj2w8zi223n6q8r");
// });
// ------------ Admin -----------------
Route::middleware(['auth'])->group(function(){
    Route::get('dashboard', Dashboard::class)->name('dashboard');
    Route::get('faq', DashboardFaq::class)->name('dashboard.faq');
    Route::get('settings', DashboardSettings::class)->name('dashboard.settings');
    Route::get('profile', DashboardProfile::class)->name('dashboard.profile');

    Route::get('me/create', FocusForm::class)->name('me.create');
    Route::get('/me/generate/{url}', GenerateLink::class )->name('me.generate');

    Route::get('/collect/{url}', IndividualCollection::class)->name('collect')->middleware('isCreator');

});

Route::get('/logout', function(){
    auth()->logout();
    return redirect()->route('home');
});

Route::fallback(function(){
    return abort(404); // change this because it indicates laravel
});