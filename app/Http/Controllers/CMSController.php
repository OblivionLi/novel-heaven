<?php

namespace App\Http\Controllers;

use App\Chapter;
use App\Novel;
use App\User;
use DB;
use Illuminate\Http\Request;

class CMSController extends Controller
{
    public function dashboard()
    {

        $novel = Novel::all();

        $user = User::all();

        return view('cms.dashboard', compact('novel','user'));
    }

    public function novels()
    {
        $novel = Novel::all();

        $chapter = Chapter::all();

        return view('cms.novels', compact('novel', 'chapter'));
    }

    public function users()
    {
        $user = User::all();

        return view('cms.users', compact('user'));
    }
}
