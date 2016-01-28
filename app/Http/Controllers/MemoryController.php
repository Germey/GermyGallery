<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\MemoryRequest;
use Illuminate\Support\Facades\Redirect;
use View, Flash;
use Illuminate\Http\Request;
use App\Model\Memory;

class MemoryController extends Controller {

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
            Flash::success('成功添加了一份记忆');
            Return Redirect::to('/manage/memory');
        } else {
            Flash::error('添加失败');
            Return Redirect::back()->withInput();
        }
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show(Memory $memory)
	{
		Return View::make('memory.show')->withMemory($memory);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
