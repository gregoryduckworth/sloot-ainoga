<?php

namespace App\Http\Controllers;

use App\Models\Map;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class MapController extends BaseController
{

    public function index()
    {
        return view('welcome');
    }

    public function upload()
    {
        return view('upload');
    }

    public function postUpload(Request $request)
    {
        if (empty($request->input('map'))) {
            return view('upload')->withError('No data to upload');
        }
        $coords = preg_split('/\r\n|\r|\n/', $request->input('map'));
        foreach ($coords as $coord) {
            $entry = explode(',', $coord);
            Map::where('x', $entry[0])->where('y', $entry[1])
                ->update([
                    'image' => substr($entry[2], strrpos($entry[2], '/') + 1),
                ]);
        }

        return view('upload')->withSuccess('Map uploaded successfully');
    }

    public function show(Request $request)
    {
        if (!isset($request->x)) {$request->x = 200;}
        if (!isset($request->y)) {$request->y = 200;}
        if (!isset($request->range)) {$request->range = 5;}
        if ($request->range >= 20) {$request->range = 20;}
        $coords = Map::whereBetween('x', [$request->y - $request->range, $request->y + $request->range])
            ->whereBetween('y', [$request->x - $request->range, $request->x + $request->range])
            ->orderBy('x')->get();
        return view('map')->with([
            'coords' => $coords,
            'x' => ($request->x + $request->range),
            'range' => $request->range,
        ]);
    }

    public function mines()
    {
        $mines = Map::whereNotNull('mine_id')->join('mines', 'maps.mine_id', 'mines.id')->orderBy('mines.type', 'ASC')->get();
        return view('mines')->withMines($mines);
    }
}
