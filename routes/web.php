
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

// import the Intervention Image Manager Class

Route::get('/', 'MapController@index');
Route::get('upload', 'MapController@upload');

// Send any updates to the map
Route::post('upload', 'MapController@postUpload');

// Display the map
Route::get('map', 'MapController@show');
Route::get('mines', 'MapController@mines');

Route::prefix('admin')->group(function () {

    Route::get('/', 'AdminController@index');
    Route::get('update-info', 'AdminController@updateInfo');
    Route::post('update-info', 'AdminController@postUpdateInfo');

    // Get image tiles from the server
    Route::get('update-images', 'AdminController@updateImages');
    Route::get('clear-cache', 'AdminController@clearCache');
});
