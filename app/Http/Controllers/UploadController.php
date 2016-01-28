<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Response;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    /**
     * img allowed type
     *
     * @var array
     */
    protected $allowedType = ['image' => ['jpg', 'png', 'jpeg', 'gif']];

    /**
     * The pre name of view
     *
     * @var array
     */
    protected $storagePath = ['image' => 'upload/images/'];


    /**
     * Ajax upload img
     *
     * @param Request $request
     * @return mixed
     */
    public function postImg(Request $request)
    {
        return $this->uploadImg($request);
    }

    /**
     * Ajax upload avatar.
     *
     * @param Request $request
     * @return mixed
     */
    public function postAvatar(Request $request)
    {
        if (! $request->hasFile('__avatar1')) {
            return Response::json(['status' => 404]);
        }
        $file = $request->file('__avatar1');
        if (! $file->isValid()) {
            return Response::json(['status' => 500]);
        }
        $newFileName = md5(time() . rand(0, 10000)) . '.jpg';
        $savePath = $this->getStoragePath('image');
        if ($file->move($savePath, $newFileName)) {
            return Response::json([
                'success' => true,
                'path' => $this->getAssetUri($savePath, $newFileName),
            ]);
        }
    }

    /**
     * Return AllowedType.
     *
     * @return array
     */
    private function getAllowedType($type)
    {
        if ($type == 'all') {
            return $this->allowedType;
        }
        if (array_key_exists($type, $this->allowedType)) {
            return $this->allowedType[$type];
        }
        return [];
    }

    /**
     * Return storagePath by type.
     *
     * @return array
     */
    private function getStoragePath($type)
    {
        if ($type == 'all') {
            return $this->storagePath;
        }
        if (array_key_exists($type, $this->storagePath)) {
            return $this->storagePath[$type];
        }
        return [];
    }


    /**
     * Get the asset absolute path.
     *
     * @param $savePath
     * @param $newFileName
     * @return string
     */
    private function getAssetUri($savePath, $newFileName)
    {
        if (strpos($savePath, '/') === 0) {
            return $savePath . $newFileName;
        } else {
            return '/' . $savePath . $newFileName;
        }
    }

    /**
     * Upload image private method.
     *
     * @param Request $request
     * @return mixed
     */
    private function uploadImg(Request $request)
    {
        if (! $request->hasFile('Filedata')) {
            return Response::json(['status' => 404]);
        }
        $file = $request->file('Filedata');
        if (! in_array($file->getClientOriginalExtension(), $this->getAllowedType('image'))) {
            return Response::json(['status' => 403]);
        }
        if (! $file->isValid()) {
            return Response::json(['status' => 500]);
        }
        $newFileName = md5(time() . rand(0, 10000)) . '.' . $file->getClientOriginalExtension();
        $savePath = $this->getStoragePath('image');
        if ($file->move($savePath, $newFileName)) {
            return Response::json([
                'status' => 200,
                'path' => $this->getAssetUri($savePath, $newFileName),
            ]);
        }
    }


    /**
     * Deal with avatar upload.
     *
     * @param Request $request
     */
    private function uploadAvatar(Request $request)
    {
        dd($request->all());
    }

}
