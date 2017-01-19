<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use Redirect;
use Auth;
class sesioncontroller extends Controller
{
    public function login()
    {
        return view('login');
    }
    public function logout()
    {
        Auth::logout();
        return Redirect::to('/');
    }
}