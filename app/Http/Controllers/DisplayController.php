<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Memory;
use View;
use Illuminate\Http\Request;

class DisplayController extends Controller
{

    public function index()
    {
        return View::make('display.show')->withMemories(Memory::orderBy('date_start', 'desc')->get());
    }

}
