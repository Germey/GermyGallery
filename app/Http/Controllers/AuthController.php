<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\TokenRequest;
use App\Model\Token;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use View, Flash;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    /**
     * Get auth page.
     *
     * @return mixed
     */
    public function getIndex()
    {
        return View::make('auth.index');
    }

    /**
     * Post auth page.
     *
     * @param Request $request
     */
    public function postIndex(TokenRequest $request)
    {
        $token = $request->get('value');
        $user = Token::where('value', $token)->first();
        if ($user) {
            Session::put('user', $user->kind);
            return Redirect::to('/');
        }
        Flash::error('密钥无效');
        return Redirect::back();
    }


    /**
     * Logout website.
     *
     * @return mixed
     */
    public function getLogout()
    {
        Session::forget('user');
        if (! Session::has('auth')) {
            return Redirect::to('/auth');
        } else {
            Flash::error('登出失败');
            return Redirect::back();
        }
    }

}
