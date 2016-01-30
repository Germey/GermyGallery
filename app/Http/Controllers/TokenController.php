<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\TokenRequest;
use App\Model\Token;
use Illuminate\Support\Facades\Redirect;
use View, Flash;
use Illuminate\Http\Request;

class TokenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return View::make('token.index')->withTokens(Token::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('token.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(TokenRequest $request)
    {
        if (Token::create($request->all())) {
            Flash::success('添加成功');
            return Redirect::to('/manage/token');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy(Token $token)
    {
        if ($token->delete()) {
            Flash::success('删除成功');
        } else {
            Flash::error('删除失败');
        }
        return Redirect::to('/manage/token');
    }

}
