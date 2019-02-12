<?php

namespace App\Http\Controllers;

use App\Models\Map;
use App\Models\Mine;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class AdminController extends BaseController
{

    public function index()
    {
        return view('admin.index');
    }

    public function updateInfo()
    {
        return view('admin.update')
            ->withMines(Mine::get());
    }

    public function postUpdateInfo(Request $request)
    {
        if ($request->mine === 'none') {$request->mine = null;}
        Map::where('x', $request->x)->where('y', $request->y)
            ->update([
                'info' => $request->info,
                'mine_id' => $request->mine,
            ]);
        return view('admin.update')
            ->withSuccess('Information has been updated at ' . $request->y . ',' . $request->x)
            ->withMines(Mine::get());
    }

    public function fullmap()
    {
        $coords = Map::orderBy('x')->get();
        return view('admin.map')->with([
            'coords' => $coords,
            'x' => 400,
            'range' => 200,
        ]);
    }

    public function updateImages()
    {
        for ($i = 0; $i < 1824; $i++) {
            $path = 'https://static.agonialands.com/assets/map/' . $i . '.gif';
            $filename = basename($path);
            // Only download if we don't already have the image
            if (!file_exists(public_path('images/' . $filename))) {
                Image::make($path)->save(public_path('images/' . $filename));
            }
            if (filesize(public_path('images/' . $filename)) === 55) {
                \File::delete(public_path('images/' . $filename));
            }
        }
        echo "Update complete";
    }

    public function clearCache()
    {
        Artisan::call('route:clear');
        Artisan::call('config:clear');
        Artisan::call('cache:clear');

        echo "All Clear";
    }
}
