<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// model import
use App\Models\Image;

// intervention/image composer package
use Intervention\Image\ImageManagerStatic as Images;

class CanvasController extends Controller
{
    public function index()
    {
        $images = Image::orderBy('id', 'desc')->paginate(Image::paginate);
        // return view
        return view('welcome', compact('images'));
    }

    public function imageCollector(Request $request)
    {
        if (count($request->images) >= 4) {
            $image1 = $request->file('images')[0];
            $image2 = $request->file('images')[1];
            $image3 = $request->file('images')[2];
            $image4 = $request->file('images')[3];
            $collage = Images::canvas(1200, 800);
            $width = 600;
            $height = 400;
            // make 4 images collage left,right,top,bottom
            $collage->insert(Images::make($image1)->resize($width, $height), 'top-left');
            $collage->insert(Images::make($image2)->resize($width, $height), 'top-right');
            $collage->insert(Images::make($image3)->resize($width, $height), 'bottom-left');
            $collage->insert(Images::make($image4)->resize($width, $height), 'bottom-right');
            $path = 'app/public/' . time() . '.png';
            // here is final result store collage
            $collage->save(storage_path('app/public/' . time() . '.png'));
            $this->storeDB($path);
            return redirect()->route('home')->with('message', 'Create successfully Collage!');

        } else {
            return redirect()->route('home')->withErrors(['msg' => 'minimum or maximum images is 4']);;
        }
    }

    public function storeDB($path)
    {
        //image path store in database
        Image::create(['path' => env('APP_URL') . 'storage/' . $path]);
    }

}
