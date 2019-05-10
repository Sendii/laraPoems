<?php

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

Auth::routes();
Route::get('tester', function() {
	$data['users'] = \App\User::where('id', '!=', Auth::id())->get();
	
	return view('tester', $data);
});
Route::get('/', 'PuisiC@index')->name('puisi_index');
Route::get('profile/{name}', 'HomeController@profile')->name('profile_index');
Route::post('profile/{name}/follow', 'HomeController@followuser')->name('profile_follow');
Route::delete('profile/{name}/unfollow', 'HomeController@unfollowuser')->name('profile_unfollow');

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('puisi')->name('puisi_')->group(function (){
	Route::post('save/post', 'PuisiC@savepost')->name('savepost');
	Route::post('edit/post', 'PuisiC@editpost')->name('editpost');
	Route::get('delete/{id}', 'PuisiC@delete')->name('delete');
	Route::get('like/{id}', 'PuisiC@likepuisi')->name('like');
	Route::get('showlike/{id}', 'PuisiC@showlikepuisi')->name('showlike');
	Route::get('/comment/like/{id}', 'PuisiC@commentlikepuisi')->name('commentlike');
	Route::get('unlike/{id}', 'PuisiC@unlikepuisi')->name('unlike');
	Route::post('comment/', 'PuisiC@commentpostpuisi')->name('postcomment');
	Route::get('comment/res/{id?}', 'PuisiC@resComment')->name('getComment');
	Route::get('usercomment/res/{id?}', 'PuisiC@resUserComment')->name('getUserComment');
});


Route::get('haloo', function() {
	$today = date('j M');
	if ($today == '7 Feb') {
		echo "Hopefully, February will be better !";
	}else{
		echo "It's a good day ?";
	}
});