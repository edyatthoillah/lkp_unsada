<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;

class SuperAdminController extends Controller
{
    public function dashboard()
    {
        return view('super-admin.dashboard');
    }
}
