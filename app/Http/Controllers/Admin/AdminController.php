<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Index page
     */
    public function index()
    {
        $query = Admin::query();

        $admins = $query->paginate();

        return view('admin.admin.index', compact('admins'));
    }
}
