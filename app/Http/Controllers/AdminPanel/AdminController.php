<?php

namespace App\Http\Controllers\AdminPanel;

use Illuminate\Routing\Controller;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin-panel');
    }

    public function index()
    {
        // @TODO
    }
}
