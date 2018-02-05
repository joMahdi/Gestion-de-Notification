<?php
use App\Notifications\TaskCompleted;
use App\Notifications\EmailCompleted;
use App\User;
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

Route::get('/contact' ,  'ContactController@create');

Route::post('/contact' ,  'ContactController@store')->name('contact.store');

Route::post('/sendmail', 'ContactController@sendMail')->name('contact.send');

Route::get('/send', function () {
	//User::find(1)->notify(new TaskCompleted);
	$user = User::find(1);
	Notification::send($user, new TaskCompleted($user));
    return view('welcome');
});

Route::get('/', function () {
	User::find(1)->notify(new EmailCompleted);
    return view('welcome');
});

Route::get('maskAsRead',function(){
	auth()->user()->unreadNotifications->markAsRead();
	return redirect()->back();
})->name('markRead');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
