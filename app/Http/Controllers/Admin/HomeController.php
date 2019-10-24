<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Index Page
     */
    public function index()
    {
        return view('admin.home.index');
    }
}
