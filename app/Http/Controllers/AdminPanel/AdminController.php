<?php

namespace App\Http\Controllers\AdminPanel;

use Illuminate\Routing\Controller;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }
}
