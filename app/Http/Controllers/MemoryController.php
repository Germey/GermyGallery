<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\MemoryRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use View, Flash;
use Illuminate\Http\Request;
use App\Model\Memory;
use App\Model\Image;

class MemoryController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return View::make('memory.index')->withMemories(Memory::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('memory.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(MemoryRequest $request)
    {
        $memory = Memory::create($request->all());

        if ($memory) {
            $images = $this->formatImages($request);
            $this->saveImages($images, $memory);
            if ($memory->getImages) {
                Flash::success('成功添加了一份记忆');
                Return Redirect::to('/manage/memory');
            }
        }
        Flash::error('添加失败');
        Return Redirect::back()->withInput();

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show(Memory $memory)
    {
        Return View::make('memory.show')->withMemory($memory);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update(Request $request, Memory $memory)
    {
        $this->deleteImages($memory);
        $images = $this->formatImages($request);
        $this->saveImages($images, $memory);
        if ($memory->getImages) {
            Flash::success('更新成功');
            Return Redirect::to('/manage/memory/'.$memory->id);
        }
        Flash::error('保存失败');
        Return Redirect::back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy(Memory $memory)
    {
        if ($memory->delete()) {
            Flash::success('删除成功');
            Return Redirect::to('/manage/memory');
        }
        Flash::error('删除失败');
        Return Redirect::to('/manage/memory');
    }

    /**
     * Assoc to index of images.
     *
     * @param MemoryRequest $request
     * @param $memory
     */
    private function formatImages(Request $request)
    {
        $images = $request->get('images', []);
        if ($images) {
            return assoc_to_index($images);
        }
        return [];
    }

    /**
     * @param $images
     * @param $memory
     */
    private function saveImages($images, $memory)
    {
        foreach ($images as $image) {
            $memory->getImages()->create($image);
        }
    }

    /**
     * @param Memory $memory
     */
    private function deleteImages(Memory $memory)
    {
        foreach ($image = $memory->getImages as $image) {
            $image->delete();
        }
    }

    /**
     * Update info of memory.
     *
     * @param Request $request
     * @return mixed
     */
    public function postUpdateInfo(Request $request)
    {
        $memory = Memory::find($request->get('pk'));
        list($key, $value) = array($request->get('name'), $request->get('value'));
        if ($memory->update([$key => $value])) {
            return Response::json(['success' => 1]);
        }
    }


}
