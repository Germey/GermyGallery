<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
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
    public function postIndex(Request $request)
    {
        $token = $request->get('token');
        $result = Token::where('value', $token)->count();
        if ($result) {
            Session::put('auth', 1);
            return Redirect($this->redirectPath());
        }
    }

    /**
     * Get the post register / login redirect path.
     *
     * @return string
     */
    public function redirectPath()
    {
        if (property_exists($this, 'redirectPath')) {
            return $this->redirectPath;
        }
        return property_exists($this, 'redirectTo') ? $this->redirectTo : '/manage';
    }


    /**
     * Logout website.
     *
     * @return mixed
     */
    public function getLogout() {
        Session::forget('auth');
        if (! Session::has('auth')) {
            return Redirect::to('/auth');
        } else {
            Flash::error('登出失败');
            return Redirect::back();
        }
    }

}
