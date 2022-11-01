<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin;
use Illuminate\Http\Request;

class HomeController extends Controller
{
  

    public function index()
    {
        $datas=admin::all();
        return view('admin.home', compact('datas'));
    }
}
