<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Song;
use App\Models\Album;
use App\Models\Artist;
use Illuminate\Http\Request;

class AdminController extends Controller
{
  public function index()
  {
    $users = User::all();
    $Songs = song::all();
    $Albums = album::all();
    $Artists = artist::all();
    return view('admin.index', compact('users', 'Songs', 'Albums', 'Artists') );
  }  
  //
}
