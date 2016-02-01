<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{

    public function getThumb(Request $request)
    {
        $src = $request->get('src');
        $src = $this->removeStringHead($src);
        $width = $request->get('width', 320);
        $height = $request->get('height', 180);
        $img = Image::make($src);
        if ($img) {
            if ($width > $height) {
                $img->resize($width, null);
            } else {
                $img->resize(null, $height);
            }
            return $img->response('png');
        }
    }

    /**
     * Remove '/' of head.
     *
     * @param $src
     */
    private function removeStringHead($src)
    {
        return strpos($src, '/') === 0 ? substr($src, 1) : $src;
    }

}
