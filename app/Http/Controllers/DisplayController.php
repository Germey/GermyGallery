<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use View;
use Illuminate\Http\Request;

class DisplayController extends Controller
{

    public function index()
    {
        return View::make('display.show');
    }

}
