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
use Illuminate\Http\Request;

// import the Intervention Image Manager Class
use Intervention\Image\ImageManagerStatic as Image;


Route::get('/', function () {
    return view('welcome');
});

Route::get('upload', function () {
    return view('upload');
});

// Send any updates to the map
Route::post('upload', function (Request $request) {
    $coords = preg_split('/\r\n|\r|\n/', $request->input('map'));
    foreach($coords as $coord) {
      $entry = explode(',', $coord);
      DB::table('map')->where('x', $entry[0])->where('y', $entry[1])
        ->update([
          'image' => substr($entry[2], strrpos($entry[2], '/') + 1)
        ]);
    }
    
    return view('upload')->withSuccess('Map uploaded successfully');
});

// Display the map
Route::get('map', function (Request $request) {
  if(!isset($request->x)) { $request->x = 281; }
  if(!isset($request->y)) { $request->y = 196; }
  if(!isset($request->range)) { $request->range = 10; }
  if($request->range >= 12) { $request->range = 12; }
  $coords = DB::table('map')
    ->whereBetween('x', [$request->y - $request->range, $request->y + $request->range])
    ->whereBetween('y', [$request->x - $request->range, $request->x + $request->range])
    ->orderBy('x')->get();
  return view('map')->with([
      'coords' => $coords,
      'x' => ($request->x + $request->range),
      'range' => $request->range
    ]);
});

Route::get('update-info', function () {
  return view('update');
});

Route::post('update-info', function(Request $request) {
  DB::table('map')->where('x', $request->x)->where('y', $request->y)
    ->update([
      'info' => $request->info
    ]);
  return view('update')->withSuccess('Information has been updated at ' . $request->x . ',' . $request->y);
});

// Get image tiles from the server
Route::get('update-images', function() {
  for($i = 0; $i < 1824; $i++) {    
    $path = 'https://static.agonialands.com/assets/map/' . $i . '.gif';
    $filename = basename($path);
    // Only download if we don't already have the image
    if (!file_exists(public_path('images/' . $filename))) {
      Image::make($path)->save(public_path('images/' . $filename));
    }
    if(filesize(public_path('images/' . $filename)) === 55) {
      \File::delete(public_path('images/' . $filename));
    } 
  }
  echo "Update complete";
});

Route::get('/clear-cache', function() {
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    Artisan::call('cache:clear');

    echo "All Clear";
    // return what you want
});

